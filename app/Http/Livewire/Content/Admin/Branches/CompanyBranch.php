<?php

namespace App\Http\Livewire\Content\Admin\Branches;

use App\Models\Branch;
use Livewire\Component;

class CompanyBranch extends Component
{
    public $name, $location, $branch_id;
    public $branches = [];

    protected $rules = [
        'name' => 'required|min:3',
        'location' => 'required',
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
            'location' => $this->location,
        ]);

        $this->emit('branchCreated');
        $this->name = null;
        $this->location = null;

    }
    public function editBranch(Branch $branch)
    {
        $this->branch_id = $branch->id;
        $this->name = $branch->name;
        $this->location = $branch->location;
    }

    public function render()
    {
        $this->branches = Branch::all();
        return view('livewire.content.admin.branches.company-branch')->extends('layouts.layoutMaster');
    }
}
