<?php

namespace App\Http\Livewire\Content\Admin\Collections;

use Livewire\Component;

class MpesaCollections extends Component
{
    public $summations=[
        'total'=>0,
    ];
    public $transactions=[];
    public function render()
    {
        return view('livewire.content.admin.collections.mpesa-collections')->extends('layouts.layoutMaster');
    }
}
