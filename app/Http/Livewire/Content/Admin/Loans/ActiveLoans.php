<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use Livewire\Component;

class ActiveLoans extends Component
{
    public $loans=[];
    public $summations=['active'=>0];
    public function render()
    {

        $this->loans=Loan::where('status','Active')->get();
        $this->summations['active']=Loan::where('status','Active')->sum('total');
        return view('livewire.content.admin.loans.active-loans')->extends('layouts.layoutMaster');
    }
}
