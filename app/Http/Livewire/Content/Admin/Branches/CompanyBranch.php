<?php

namespace App\Http\Livewire\Content\Admin\Branches;

use App\Models\Branch;
use Livewire\Component;

class CompanyBranch extends Component
{
    public $name, $address, $email,$mobile, $branch_id;
    public $branches = [];

    protected $rules = [
        'name' => 'required|min:1',
        'address' => 'required',
    
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();
        
        Branch::updateOrCreate(['id' => $this->branch_id], [
            'name' => $this->name,
            'address' => $this->address,
            'email'=>$this->email,
            'mobile'=>$this->mobile
        ]);

        if(is_null($this->branch_id)){
            $this->emit('branchCreated');
        }else{
            $this->emit('branchUpdated',$this->branch_id);
        }
        $this->name = null;
        $this->address = null;
        $this->email=null;
        $this->mobile=null;

    }
    public function editBranch(Branch $branch)
    {
        $this->branch_id = $branch->id;
        $this->name = $branch->name;
        $this->address = $branch->address;
        $this->email=$branch->email;
        $this->mobile=$branch->mobile;
    }

    public function render()
    {
        $this->branches = Branch::all();
        return view('livewire.content.admin.branches.company-branch')->extends('layouts.layoutMaster');
    }
}
