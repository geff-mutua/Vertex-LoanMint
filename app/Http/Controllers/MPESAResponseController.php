<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Borrower;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\SuspenseAccount;
use App\Models\UnmappedPayment;
use Illuminate\Support\Facades\Log;
use App\Models\BorrowerLoanStatement;

class MPESAResponseController extends Controller
{
    public function validation(Request $request){

        Log::info('validation endpoint has been hit');
     
        return [
            "ResultCode"=> "0",
            "ResultDesc"=> "Accepted"
        ];
        
    }
    public function confirmation(Request $request){
       
        Log::info('confirmation endpoint has been hit');

        $middleName='-';
        $firstName='-';
        $lastName='-';

        # Save the transaction
        $result=$request->all();
        if(array_key_exists('FirstName',$result)){
            $firstName=$result['FirstName'];
        }
        if(array_key_exists('MiddleName',$result)){
            $middleName=$result['MiddleName'];
        }
        if(array_key_exists('LastName',$result)){
            $middleName=$result['LastName'];
        }

        Log::info($result);

        #Safe the payload to Unmapped Table
        $data=UnmappedPayment::create([
            'transaction_type'=>$result['TransactionType'],
            'transaction_id'=>$result['TransID'],
            'transaction_time'=>$result['TransTime'],
            'transaction_amount'=>$result['TransAmount'],
            'business_shortcode'=>$result['BusinessShortCode'],
            'bill_ref_number'=>$result['BillRefNumber'],
            'invoice_number'=>$result['InvoiceNumber'],
            'third_party_transid'=>$result['ThirdPartyTransID'],
            'msisdn'=>$result['MSISDN'],
            'first_name'=>$firstName,
            'middle_name'=>$middleName,
            'last_name'=>$lastName,
            'org_account_bal'=>$result['OrgAccountBalance']
        ]);

        #Map the transactions
        if($data){
            // For Frontier, Base on Id number or Mobile Number
            $client=null;
            if(strlen($data->bill_ref_number)==10){
                // The account number is mobile number
                $client=Borrower::whereMobile(substr($data->msisdn,3,9))->first();// Base on the company Settings on account numbers
            }else{
                $client=Borrower::where('id_number',$data->bill_ref_number)->first();// Base on the company Settings on account numbers
            }

            if($client !=null){
                #Get the associated Loan from the client {Assuption, One Loan At A time}
                $loan=$client->loan()->latest()->first();
                # Check if theres loan infomation found
                if($loan !=null){
                    # Check if its payment for Processing Fee
                    if($loan->processing_fee==1){
                        # Calculate the processing fee.
                        $processing_fee_rate=$loan->loanproduct()->first()->procesing_fee_rate;
                        $processingFee=(float) $loan->amount * (float) $processing_fee_rate /100;

                        if((int) $data->transaction_amount > (int) $processingFee){
                            # Paid - Extra Amount to loan Repayment
                            if($loan->status=="Approved"){
                                Transaction::create([
                                    'borrower_id'=>$client->id,
                                    'reference_code'=>$data->transaction_id,
                                    'transaction_type'=>'Processing Fee',
                                    'amount'=>$data->transaction_amount,
                                    'msisdn'=>$data->msisdn,
                                    'date'=>Carbon::now(),
                                    'payment_option'=>'Mpesa',
                                    'loan_id'=>$loan->id,
                                    'status'=>1,
                                    'business_balance'=>$data->org_account_bal
                                ]);
                                # Update the loan Status
                                $loan->processing_fee=2;
                                $loan->save();
                                #Mark the transaction as mapped
                                $data->mapped=1;    
                                $data->save();
                                BorrowerLoanStatement::create([
                                    'borrower_id'=>$client->id,
                                    'loan_id'=>$loan->id,
                                    'action'=>'Processing Fee',
                                    'amount'=>$processingFee,
                                    'balance'=>$loan->total,
                                    'date'=>Carbon::now(),
                        
                                ]);
                                # Get the overpaid to suspense Account
                                $remainder=(int) $data->transaction_amount - (int)$processingFee;
                                SuspenseAccount::create([
                                    'description'=>'Overpayment From Processing Fee',
                                    'amount'=>$remainder,
                                    'reference'=>$data->transaction_id,
                                    'msisdn'=>substr($data->msisdn,3,9),
                                    'account_number'=>$data->bill_ref_number,
                                    'name'=>$firstName.' '.$middleName.' '.$lastName,
                                    'borrower_id'=>$client->id,
                                    'loan_id'=>$loan->id,
                                    'domain_id'=>$client->domain_id,
                                ]);

                             }else{
                                // payment has been received but the loan has not been approved.
                                # Put the transaction to Pending Transaction
                                Transaction::create([
                                    'domain_id'=>$client->domain_id,
                                    'borrower_id'=>$client->id,
                                    'reference_code'=>$data->transaction_id,
                                    'transaction_type'=>'Processing Fee',
                                    'amount'=>$data->transaction_amount,
                                    'msisdn'=>$data->msisdn,
                                    'date'=>Carbon::now(),
                                    'payment_option'=>'Mpesa',
                                    'loan_id'=>$loan->id,
                                    'business_balance'=>$data->org_account_bal
                                ]);
                             }
                        }elseif((int) $data->transaction_amount == (int) $processingFee){
                           if($loan->status=="Approved"){
                                Transaction::create([
                                    
                                    'borrower_id'=>$client->id,
                                    'reference_code'=>$data->transaction_id,
                                    'transaction_type'=>'Processing Fee',
                                    'amount'=>$processingFee,
                                    'msisdn'=>$data->msisdn,
                                    'date'=>Carbon::now(),
                                    'payment_option'=>'Mpesa',
                                    'loan_id'=>$loan->id,
                                    'status'=>1,
                                    'business_balance'=>$data->org_account_bal
                                ]);
                                # Update the loan Status
                                $loan->processing_fee=2;
                                $loan->save();
                                #Mark the transaction as mapped
                                $data->mapped=1;
                                $data->save();
                                # Update Client Statement
                                BorrowerLoanStatement::create([
                                    'borrower_id'=>$client->id,
                                    'loan_id'=>$loan->id,
                                    'action'=>'Processing Fee',
                                    'amount'=>$data->transaction_amount,
                                    'balance'=>$loan->total,
                                    'date'=>Carbon::now(),
                        
                                ]);

                                //Todo {Notify clients with sms}
                           }
                        }else{
                            # TODO
                            # The Guy Paid Less amount for Processing Fee
                            # Check If there was another Transaction made for the repayment to compare the prices
                        }
                      
                    }else{
                        #Loan Repayment
                        $statement=BorrowerLoanStatement::where('borrower_id',$client->id)->orderBy('id','DESC')->first();
                        $loanBalance=(int)$statement->balance - (int) $data->transaction_amount;
                        Transaction::create([
                            
                            'borrower_id'=>$client->id,
                            'reference_code'=>$data->transaction_id,
                            'transaction_type'=>'Loan Repayment',
                            'amount'=>$data->transaction_amount,
                            'msisdn'=>$data->msisdn,
                            'date'=>Carbon::now(),
                            'payment_option'=>'Mpesa',
                            'loan_id'=>$loan->id,
                            'status'=>1,
                            'business_balance'=>$data->org_account_bal
                        ]);
                        if($loanBalance < 0){
                            # Overpayment
                            BorrowerLoanStatement::create([
                                'borrower_id'=>$client->id,
                                'loan_id'=>$loan->id,
                                'action'=>'Loan Repayment',
                                'amount'=>$data->transaction_amount,
                                'balance'=>$loanBalance,
                                'date'=>Carbon::now(),
                    
                            ]);
                            // create suspense account record
                            SuspenseAccount::create([
                                'description'=>'Loan Overpayment',
                                'amount'=>$loanBalance,
                                'reference'=>$data->transaction_id,
                                'msisdn'=>substr($data->msisdn,3,9),
                                'account_number'=>$data->bill_ref_number,
                                'name'=>$firstName.' '.$middleName.' '.$lastName,
                                'borrower_id'=>$client->id,
                                'loan_id'=>$loan->id,
                               
                            ]);

                            
                            $loan->status="Paid";
                            $loan->save();
                            $data->mapped=1;
                            $data->save();

                        }else{
                            // Client Statement from the payment
                            BorrowerLoanStatement::create([
                                'borrower_id'=>$client->id,
                                'loan_id'=>$loan->id,
                                'action'=>'Loan Repayment',
                                'amount'=>$data->transaction_amount,
                                'balance'=>$loanBalance,
                                'date'=>Carbon::now(),
                    
                            ]);
                            
                            $data->mapped=1;
                            $data->save();
                        }
                    }
                }

            }else{
                // The transaction Remains Unmapped
            }
        }
      
    }
}
