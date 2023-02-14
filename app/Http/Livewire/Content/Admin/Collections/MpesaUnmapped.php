<?php

namespace App\Http\Livewire\Content\Admin\Collections;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\UnmappedPayment;

class MpesaUnmapped extends Component
{
    public $summations=[
        'total'=>0,
    ];

    public $date_from;
    public $date_to;
    public $shortcode="All";
    public function mount(){
        $this->date_from=Carbon::now()->subDays('7')->toDateString();
        $this->date_to=Carbon::now()->toDateString();
    }
    public $transactions=[];
    public function render()
    {
       
        $this->transactions=UnmappedPayment::where('mapped',0)->whereBetween('date',[$this->date_from,$this->date_to])->get();
        $this->summations['total']=UnmappedPayment::where('mapped',0)->whereBetween('date',[$this->date_from,$this->date_to])->sum('transaction_amount');
        return view('livewire.content.admin.collections.mpesa-unmapped')->extends('layouts.layoutMaster');
    }
}
