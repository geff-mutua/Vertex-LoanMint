<?php

namespace App\Http\Livewire\Content\Admin\Clients;

use App\Models\Loan;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\SubAccount;
use App\Models\LoanProduct;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use App\Models\BorrowerLoanStatement;
use App\Models\LoanRepaymentSchedule;

class BorrowerProfile extends Component
{
    
        #Selected Product Variables
        public $interest_rate = 0;
        public $interest_type = '--';
        public $processing_fee;
        public $repayment_period = '--';
    
        #loan Calculation variables
        public $interest = 0;
        public $total = 0;
        public $disbursed = 0;
    
        #loan details
        public $individual_loan_amount;
        public $loan_purpose;
        public $loanProducts = [];
        public $domain;
        public $loan_product;
        public $max_loan=0;
        public $max_limit;
    
        #Deleting Loan Values
        public $canDelete = false;
        public $transactionCode;
        public $deleteId;
        public $typedCode;
    
        # load edit id
        public $editId;
        public $disburse_status;
    
        public $borrower;
        public $reconcilliations = [];
    
        # Selected Loan for operations
        public $loan;

        public function mount($id)
        {
            
            $this->borrowerId = $id;
            $this->domain = auth()->user()->domain_id;
            $this->loanProducts = LoanProduct::all();
    
        }
    
        public function topUp($id){
             dd($id);
        }
    
       
        public function deleteLoan()
        {
            
            Loan::find($this->deleteId)->delete();
            $this->deleteId = null;
            return redirect()->away(url('admin/clients/borrower-profile/'.$this->borrower->id));
        }
     
        public function approve()
        {
            $this->borrower->status = "1";
            $this->borrower->save();
            
        }
    
        public function reject()
        {
            $this->borrower->status = "2";
            $this->borrower->save();
        }
    
        public function setLoanDetails()
        {
            if ($this->loan_product != "") {
                $product = LoanProduct::find($this->loan_product);
                $this->interest_rate = $product->interest_rate;
                $this->interest_type = $product->interest_type;
                $this->processing_fee = $product->procesing_fee_rate;
                $this->repayment_period = $product->duration;
                $this->max_loan=$product->max_loan;
    
                if ($this->individual_loan_amount != null) {
    
                    if ($this->individual_loan_amount == 0) {
                        $this->interest = 0;
                        $this->total = 0;
                    } else {
                        $this->interest = $this->individual_loan_amount * $this->interest_rate / 100;
                        if ($this->interest_type == "After") {
    
                            $this->total = $this->individual_loan_amount + $this->interest;
                            $this->disbursed = $this->total;
                        } else {
                            $this->total = $this->individual_loan_amount;
                            $this->disbursed = $this->total - $this->interest;
                        }
                    }
    
                } else {
                    $this->total = 0;
                    $this->interest = 0;
                    $this->disbursed = 0;
                }
    
            } else {
                $this->interest_rate = '--';
                $this->interest_type = '--';
                $this->processing_fee = null;
                $this->repayment_period = '--';
                $this->total = 0;
                $this->interest = 0;
            }
        }
    
        public function editLoan($id)
        {
    
            $this->loan = Loan::find($id);
            $this->editId = $this->loan->id;
            $this->loan_product = $this->loan->loan_product_id;
            $this->individual_loan_amount = $this->loan->amount;
            $this->loan_purpose = $this->loan->loan_purpose;
            $this->setLoanDetails();
    
        }
        public function setDeleteId($id)
        {
    
           $this->deleteId=$id;
    
        }
    
        public function setDelete($id)
        {
            $this->deleteId = $id;
            $this->transactionCode = Loan::find($this->deleteId)->transaction_code;
    
        }
    
        public function updateLoan()
        {
            $this->max_limit=null;
            $this->validate([
                'individual_loan_amount'=>'required|numeric',
                'loan_product'=>'required'
            ]);
            if((int)$this->individual_loan_amount >(int)$this->max_loan){
                $this->max_limit='The borrowed amount should be Ksh '.number_format($this->max_loan).' or less';
               }else{
                $results = Loan::whereId($this->editId)->update([
    
                    'loan_product_id' => $this->loan_product,
                    'amount' => $this->individual_loan_amount,
                    'interest' => $this->interest,
                    'total' => $this->total,
                    'processing_fee' => $this->processing_fee ? '1' : '2',
                    'loan_purpose' => $this->loan_purpose,
                    'date' => Carbon::now(),
                    'due_date' => Carbon::now()->addDays($this->repayment_period),
                ]);
                $this->emit('LoanEdited',$this->editId);
               }
           

        }
    
        public function updateDisbursement()
        {
            $this->validate([
                'disburse_status' => 'required',
            ]);
    
            $results = Loan::whereId($this->editId)->update([
                'disbursement_status' => $this->disburse_status,
                'status' => 'Active',
                'account_id'=>1
            ]);
    
            #Create a double enrty record for ledger Accounts (Loans GL A/C (Debit) And Borrower GL A/C (Credit) )
            $sub_account=SubAccount::find(1); #individual Loan Id (Debited on Company)
            $sub_account->transact($this->loan->total);
          
            
            $this->dispatchBrowserEvent('swal', ['title' => 'Success',
                'text' => 'Loan has been updated successfully',
                'icon' => 'success',
            ]);
        }
        public function approveLoan()
        {
            
            $results = Loan::whereId($this->editId)->update([
                'status' => 'Approved',
                'due_date' => Carbon::now()->addDays($this->repayment_period),
                'approved_by' => auth()->user()->id, # Person Who has approved the loan
            ]);
    
            #Create Statement for the loan
            BorrowerLoanStatement::create([
                'borrower_id' => $this->borrower->id,
                'loan_id' => $this->editId,
                'action' => "Loan Application Approved",
                'amount' => $this->loan->total,
                'balance' => $this->loan->total,
                'date' => Carbon::now(),
    
            ]);
    
    
            // Create Loan Schedules
            $periods=$this->repayment_period/7; // Total Loan Installments Repayment Periods
            $payableAmount=$this->loan->total/$periods;
            
            for ($x = 1; $x < $periods+1; $x++) {
                $date=Carbon::now();
                $date->addDays($x*7);
                LoanRepaymentSchedule::create([
                    'loan_id'=>$this->loan->id,
                    'borrower_id'=>$this->loan->borrower->id,
                    'amount'=>$payableAmount,
                    'repayment_date'=>$date,
                    'status'=>'Due',
                    'loan_officer'=>$this->loan->borrower->user_id
                ]);
              }
    
              $this->emit('approveLoan',$this->editId);
        }
        public function rejectLoan()
        {
    
            $results = Loan::whereId($this->editId)->update([
                'status' => 'Rejected',
            ]);
            $this->emit('approveLoan',$this->editId);
        }
        public function reschedule($id)
        {
            $this->loan = Loan::find($id);
            $this->editId = $this->loan->id;
            $this->loan_product = $this->loan->loan_product_id;
            $this->individual_loan_amount = $this->loan->statement()->latest()->first()->balance;
            $this->loan_purpose = $this->loan->loan_purpose;
            $this->setLoanDetails();
        }
        public function rescheduleLoan()
        {
            $results = Loan::Create([
                'borrower_id' => $this->borrower->id,
                'domain_id' => $this->domain,
                'loan_product_id' => $this->loan->loan_product_id,
                'amount' => $this->individual_loan_amount,
                'interest' => $this->interest,
                'total' => $this->total,
                'processing_fee' => $this->processing_fee ? '1' : '2',
                'transaction_code' => 'VTL' . rand(1000, 5000) . $this->borrower->id . strtoupper(Str::random(5)),
                'disbursement_status' => 0,
                'loan_purpose' => $this->loan_purpose,
                'status' => 'Pending',
                'date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays($this->repayment_period),
            ]);
    
            # Clear the Previous Loan
            $this->loan->status = 'Paid';
            $this->loan->save();
    
            $this->dispatchBrowserEvent('swal', ['title' => 'Success',
                'text' => 'Loan has been rescheduled Successfully',
                'icon' => 'success',
            ]);
        }
    public function render()
    {
        $this->borrower = Borrower::find($this->borrowerId);
        // dd(count($this->borrower->loan) );
        $this->reconcilliations = Transaction::where('borrower_id', $this->borrower->id)->get();
        $this->setLoanDetails();
        #Set Delete Realtime Validation
        if ($this->transactionCode != null) {
            if ($this->transactionCode === $this->typedCode) {
                $this->canDelete = true;
            } else {
                $this->canDelete = false;
            }
        }
        return view('livewire.content.admin.clients.borrower-profile')->extends('layouts.layoutMaster');
    }
}
