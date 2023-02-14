<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use Livewire\Component;

class RejectedLoans extends Component
{
    public $loans=[];
    public $summations=['active'=>0];
    public function render()
    {
        $this->loans=Loan::where('status','Rejected')->get();
        $this->summations['rejected']=Loan::where('status','Rejected')->sum('total');
        return view('livewire.content.admin.loans.rejected-loans')->extends('layouts.layoutMaster');
    }
}
