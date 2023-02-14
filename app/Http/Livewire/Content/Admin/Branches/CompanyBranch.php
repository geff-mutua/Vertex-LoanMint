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

        $this->emit('branchCreated');
        $this->name = null;
        $this->address = null;

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
