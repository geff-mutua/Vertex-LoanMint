<?php

namespace App\Http\Livewire\Content\Admin\Clients;

use Livewire\Component;
use App\Models\Borrower;

class Borrowers extends Component
{
    public $borrowers=[];
    public $unapprovedBorrowers=[];
    public function render()
    {
        $this->borrowers=Borrower::all();// Approved Borrowers Profiles
        $this->unapprovedBorrowers=Borrower::where('status','!=','1')->get();
        return view('livewire.content.admin.clients.borrowers')->extends('layouts.layoutMaster');
    }
}
