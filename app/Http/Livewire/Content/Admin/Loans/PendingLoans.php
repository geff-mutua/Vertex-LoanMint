<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use Livewire\Component;

class PendingLoans extends Component
{
    public $loans=[];
    public $summations=['pending'=>0];
    public function render()
    {
        $this->loans=Loan::where('status','Pending')->get();
        $this->summations['pending']=Loan::where('status','Pending')->sum('total');
        return view('livewire.content.admin.loans.pending-loans')->extends('layouts.layoutMaster');;
    }
}
