<?php

namespace App\Http\Livewire\Content\Admin\Collections;

use Livewire\Component;
use App\Models\Transaction;

class AllCollections extends Component
{

    public $transactions=[];
   
    public $summations=[
        'total_collections'=>0,
        'total_repayments'=>0,
        'total_processing_fee'=>0,
        'total_pending'=>0,
    ];

    public function render()
    {
        $this->transactions();
        $this->totalIncomes();
        // dd($this->summations);
        return view('livewire.content.admin.collections.all-collections')->extends('layouts.layoutMaster');
    }
    public function totalIncomes(){
        $this->summations['total_collections']=Transaction::where('status','1')->sum('amount');
        $this->summations['total_repayments']=Transaction::where('status','1')->where('transaction_type','Loan Repayment')->sum('amount');
        $this->summations['total_processing_fee']=Transaction::where('status','1')->where('transaction_type','Processing Fee')->sum('amount');
        $this->summations['total_pending']=Transaction::where('status','0')->sum('amount');
    }
    public function transactions(){
        $this->transactions=Transaction::orderBy('id','DESC')->get();
    }
   public function transactionDetails($id){
      
        $this->emitTo('content.admin.collections.transactions.transaction-detail','viewDetails',$id);


   }
}
