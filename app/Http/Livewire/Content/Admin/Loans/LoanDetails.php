<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\LoanRepaymentSchedule;

class LoanDetails extends Component
{
    public $loan;
    public $amountPaid=0;
    public $balance=0;
    public $reference_code;
    public $amount;
    public $msisdn;
    public $date;
    public $loan_id;
    public $transaction_type;
    public $payment_method;

    public $schedules=[];
    public $repayments=[];

    protected $rules = [
    'reference_code' => 'required',
    'date'=>'required',
    'amount'=>'required',
    'loan'=>'required',
    'transaction_type'=>'required',
    'payment_method'=>'required',
    'msisdn'=>'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id){
        $this->loan=Loan::find($id);
    }
    public function render()
    {
       
        $this->loan->statement()->get()->each(function ($e){
            if($e->action=='Loan Repayment'){
                $this->amountPaid+=(float)$e->amount;
            }
        });
        $this->repayments=Transaction::where('loan_id',$this->loan->id)->get();
        return view('livewire.content.admin.loans.loan-details')->extends('layouts.layoutMaster');
    }
    public function schedules(){
        $this->schedules=LoanRepaymentSchedule::where('loan_id',$this->loan->id)->get();
    }

    #loan Editting
    public function editLoan(){
        if($this->loan->status=='Active' || $this->loan->status=="Paid"){
            $this->dispatchBrowserEvent('swal', ['title' => 'Loan Edtting Failed',
            'text' => 'This loan cannot be editted ',
            'icon' => 'error',
        ]);
        }
    }
        public function store(){
        $this->validate();
        Transaction::create([
            'borrower_id'=>$this->loan->borrower->id,
            'posted_by'=>auth()->user()->name,
            'reference_code'=>$this->reference_code,
            'transaction_type'=>$this->transaction_type,
            'amount'=>$this->amount,
            'msisdn'=>$this->msisdn,
            'date'=>$this->date,
            'payment_option'=>$this->payment_method,
            'loan_id'=>$this->loan_id
        ]);
        $this->emit('newPayment');

}
}
