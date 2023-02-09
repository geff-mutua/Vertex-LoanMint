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

    public $schedules=[];

    public $repayments=[];
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
}
