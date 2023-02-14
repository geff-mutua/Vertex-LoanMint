<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use Livewire\Component;

class ArrearLoans extends Component
{
    public $loans=[];
    public $summations=['arrears'=>0];
    public function render()
    {
        $this->loans=Loan::where('status','In Arrears')->get();
        $this->summations['arrears']=0;
        return view('livewire.content.admin.loans.arrear-loans')->extends('layouts.layoutMaster');;
    }
}
