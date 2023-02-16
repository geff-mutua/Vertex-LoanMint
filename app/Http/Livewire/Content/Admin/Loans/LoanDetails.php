<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use App\Models\Branch;
use Livewire\Component;
use App\Models\SubAccount;
use App\Models\LoanProduct;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use App\Models\BorrowerLoanStatement;
use App\Models\LoanRepaymentSchedule;

class LoanDetails extends Component
{
    public $loan;
    public $amountPaid = 0;
    public $balance = 0;
    public $reference_code;
    public $amount;
    public $msisdn;
    public $date;
    public $loan_id;
    public $transaction_type;
    public $payment_method;

    public $schedules = [];
    public $repayments = [];

    public $branches = [];
    public $branch;

    #Selected Product Variables
    public $interest_rate = 0;
    public $interest_type = '--';
    public $processing_fee;
    public $repayment_period = '--';

    #loan details
    public $individual_loan_amount;
    public $loan_purpose;
    public $loanProducts = [];
    public $loan_product;
    public $max_loan = 0;
    public $max_limit;
    public $borrower_id;
    public $disburse_status;

    protected $rules = [
        'reference_code' => 'required',
        'date' => 'required',
        'amount' => 'required',
        'loan' => 'required',
        'transaction_type' => 'required',
        'payment_method' => 'required',
        'msisdn' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $this->loan = Loan::find($id);
        $this->branches = Branch::all();
        $this->loanProducts = LoanProduct::all();
        $this->borrower_id=$this->loan->borrower_id;
    }
    public function render()
    {

        $this->setLoanDetails();
        $this->loan->statement()->get()->each(function ($e) {
            if ($e->action == 'Loan Repayment') {
                $this->amountPaid += (float) $e->amount;
            }
        });
        $this->repayments = Transaction::where('loan_id', $this->loan->id)->get();
        return view('livewire.content.admin.loans.loan-details')->extends('layouts.layoutMaster');
    }
    public function schedules()
    {
        $this->schedules = LoanRepaymentSchedule::where('loan_id', $this->loan->id)->get();
    }


    public function store()
    {
        $this->validate();
        Transaction::create([
            'borrower_id' => $this->loan->borrower->id,
            'posted_by' => auth()->user()->name,
            'reference_code' => $this->reference_code,
            'transaction_type' => $this->transaction_type,
            'amount' => $this->amount,
            'msisdn' => $this->msisdn,
            'date' => $this->date,
            'payment_option' => $this->payment_method,
            'loan_id' => $this->loan_id,
            'branch_id' => $this->branch,
        ]);
        $this->emit('newPayment');

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

    public function editLoan()
    {

        
        $this->editId = $this->loan->id;
        $this->loan_product = $this->loan->loan_product_id;
        $this->individual_loan_amount = $this->loan->amount;
        $this->loan_purpose = $this->loan->loan_purpose;
        $this->setLoanDetails();

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

                $this->loan->loan_product_id = $this->loan_product;
                $this->loan->amount = $this->individual_loan_amount;
                $this->loan->interest = $this->interest;
                $this->loan->total = $this->total;
                $this->loan->processing_fee= $this->processing_fee ? '1' : '2';
                $this->loan->loan_purpose = $this->loan_purpose;
                $this->loan->date = Carbon::now();
                $this->loan->due_date = Carbon::now()->addDays($this->repayment_period);
                $this->loan->save();
  
                $this->emit('loanEdited');
           }
       

    }
    public function approveLoan()
    {
        
            $this->loan->status = 'Approved';
            $this->loan->due_date = Carbon::now()->addDays($this->repayment_period);
            $this->loan->approved_by =auth()->user()->id; # Person Who has approved the loan
            $this->loan->save();

        #Create Statement for the loan
        BorrowerLoanStatement::create([
            'borrower_id' => $this->loan->borrower_id,
            'loan_id' => $this->loan->id,
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

          $this->emit('approveLoan',$this->loan->id);
    }
    public function rejectLoan()
    {

        
        $this->loan->status = 'Rejected';
        $this->loan->save();
        
        $this->emit('approveLoan',$this->loan->id);
    }

    public function deleteLoan()
    {
        
        $this->loan->delete();
        return redirect()->route('loans-list',['domain'=>auth()->user()->domain->name]);
    }
    public function updateDisbursement()
    {
        $this->validate([
            'disburse_status' => 'required',
        ]);

        $this->loan->disbursement_status = $this->disburse_status;
         $this->loan->status = 'Active';
        $this->loan->account_id=1;
        $this->loan->save();
        
        #Create a double enrty record for ledger Accounts (Loans GL A/C (Debit) And Borrower GL A/C (Credit) )
        $sub_account=SubAccount::find(1); #individual Loan Id (Debited on Company)
        $sub_account->transact($this->loan->total);
        $this->emit('disburse');
    }
}
