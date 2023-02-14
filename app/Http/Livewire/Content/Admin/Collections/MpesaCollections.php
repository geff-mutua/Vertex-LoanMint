<?php

namespace App\Http\Livewire\Content\Admin\Collections;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class MpesaCollections extends Component
{
    public $summations=[
        'total'=>0,
    ];
    public $transactions=[];
    public $date_from;
    public $date_to;
    public $branches=[];
    public $branch="All";
    public $status="All";
    public function mount(){
        $this->date_from=Carbon::now()->subDays('7')->toDateString();
        $this->date_to=Carbon::now()->toDateString();
        $this->branches=Branch::all();
    }
    public function render()
    {
        if($this->branch=="All" && $this->status=="All"){
            $this->transactions=Transaction::whereBetween('date',[$this->date_from,$this->date_to])->get();
            $this->summations['total']=Transaction::whereBetween('date',[$this->date_from,$this->date_to])->sum('amount');
        }else{
            $this->transactions=Transaction::whereBetween('date',[$this->date_from,$this->date_to])->where('branch_id',$this->branch)->where('status',$this->status)->get();
            $this->summations['total']=Transaction::whereBetween('date',[$this->date_from,$this->date_to])->where('branch_id',$this->branch)->where('status',$this->status)->sum('amount');
        }

        return view('livewire.content.admin.collections.mpesa-collections')->extends('layouts.layoutMaster');
    }
}
