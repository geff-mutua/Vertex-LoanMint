<?php

namespace App\Http\Livewire\Content\Admin\Clients;

use App\Models\User;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Borrower;

class Borrowers extends Component
{
    public $borrowers=[];
    public $unapprovedBorrowers=[];
    public $borrowerStats=[
        'active'=>0,
        'rejected'=>0,
        'pending'=>0,
        'inactive'=>0
    ];

    public $branch;
    public $branches=[];
    public $officers=[];


    public function filter(){
        $this->branches=Branch::all();
        $this->officers=User::where('role','Officer')->get();
        $this->borrowers=Borrower::all()->each(function($e){
            if($e->status=='0'){
               (int) $this->borrowerStats['pending']+=1;
            }elseif($e->status==1){
                (int) $this->borrowerStats['active']+=1;
            }else{
                (int) $this->borrowerStats['rejected']+=1;
            }
        });
    }
    
    public function render()
    {
        $this->filter();
        return view('livewire.content.admin.clients.borrowers')->extends('layouts.layoutMaster');
    }
}
