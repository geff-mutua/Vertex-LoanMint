<?php

namespace App\Http\Livewire\Content\Admin\Collections\Transactions;

use Livewire\Component;
use App\Models\SubAccount;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use App\Models\SuspenseAccount;
use App\Models\BorrowerLoanStatement;

class TransactionDetail extends Component
{
 
    protected $listeners=['viewDetails'];
    public $transaction;

    public function viewDetails($id){
      
        $this->transaction=Transaction::find($id);
    }
    public function render()
    {
        return view('livewire.content.admin.collections.transactions.transaction-detail')->extends('layouts.layoutMaster');
    }
    public function approve(Transaction $approve)
    {

        $loan = $approve->loan()->first();

        if ($approve->transaction_type == 'Processing Fee') {
            if ($loan->processing_fee == 1) {
                // Check if the loan is approved or not
                if ($loan->status == "Approved") {
                    # Get the Fee rate from the loan product
                    $processing_fee_rate = $loan->loanproduct()->first()->procesing_fee_rate;
                    $processingFee = (float) $loan->amount * (float) $processing_fee_rate / 100;

                    # Add Account Id of the GL Account
                    $approve->account_id = 2;
                    $approve->save();

                    if ((int) $approve->amount > (int) $processingFee) {
                        // Amount paid is greater that the processing fee { Add suplus to suspense account }
                        $remainder = (int) $approve->amount - (int) $processingFee;
                        SuspenseAccount::create([
                            'description' => 'Overpayment From Processing Fee',
                            'amount' => $remainder,
                            'reference' => $approve->reference_code,
                            'msisdn' => substr($approve->msisdn, 3, 9),
                            'account_number' => '--',
                            'name' => $loan->borrower->fullname(),
                            'borrower_id' => $loan->borrower->id,
                            'loan_id' => $loan->id,
                            'domain_id' => $loan->borrower->domain_id,
                        ]);
                    }

                    $approve->status = 1;
                    $approve->save();
                    $loan->processing_fee = 2;
                    $loan->save();

                    #==================================================================================================
                    # Map the transaction to the account for collecting revenue;
                    $approve->subaccount_id = '4';
                    $approve->save();
                    # Debit the amount to the subaccount Table
                    $account = SubAccount::find(4);
                    $account->transact($processingFee);
                    #==================================================================================================
                    $this->dispatchBrowserEvent('swal', ['title' => 'Success',
                        'text' => 'Transaction has been approved successfully',
                        'icon' => 'success',
                    ]);
                } else {
                    $this->dispatchBrowserEvent('swal', ['title' => 'Failed',
                        'text' => 'This loan number ' . $loan->transaction_code . ' for client ' . $loan->borrower->first_name . ' ' . $loan->borrower->last_name . ' has not been approved yet. kindly approve the loan and come back to approve the transaction.',
                        'icon' => 'error',
                    ]);
                }

            } else {
                $this->dispatchBrowserEvent('swal', ['title' => 'Failed',
                    'text' => 'The selected loan for this transaction doesn`t have a processing fee. Kindly ammend the transaction and try again.',
                    'icon' => 'error',
                ]);
            }

        } else {
            #Loan Repayment Transaction.
            $approve->status = 1;
            $approve->save();

            $statement = BorrowerLoanStatement::where('borrower_id', $approve->borrower_id)->orderBy('id', 'DESC')->first();
            $loanBalance = (int) $statement->balance - (int) $approve->amount;

            BorrowerLoanStatement::create([
                'borrower_id' => $approve->borrower_id,
                'loan_id' => $approve->loan->id,
                'action' => $approve->transaction_type,
                'amount' => $approve->amount,
                'balance' => $loanBalance,
                'date' => Carbon::now(),

            ]);

            if ((int) $loanBalance <= 0) {
                # Update the loan as paid Loan
                $loan->status = 'Paid';
                $loan->save();
                #==================================================================================================
                # Revenue has been earned;
                $approve->subaccount_id = '3';
                $approve->save();
                # Debit the amount to the subaccount Table
                $account = SubAccount::find(3);
                $account->transact($approve->loan->interest);
                #==================================================================================================
            }

            $this->dispatchBrowserEvent('swal', ['title' => 'Transaction Approved',
                'text' => 'Transaction has been approved successfully.',
                'icon' => 'success',
            ]);
        }

    }
}
