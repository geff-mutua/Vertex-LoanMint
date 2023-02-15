<?php

namespace App\Http\Livewire\Content\Admin\Collections\Sheets;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class DailyCollectionSheet extends Component
{
    public $date_from,$date_to;
    public $recordId;
    public $branches=[];
    public $total,$branch="1",$status="All";
    public $collections=[];
    public function mount(){
        $this->date_from=Carbon::now()->subDays(7)->format('Y-m-d');
        $this->date_to=Carbon::now()->format('Y-m-d');
        $this->branches=Branch::all();
        $this->recordId=rand(1,5000);
    }
    public function render()
    {
        if($this->branch=="All" && $this->status=="All"){
            $this->collections=Transaction::whereBetween('date',[$this->date_from,$this->date_to])->get();
        }
        return view('livewire.content.admin.collections.sheets.daily-collection-sheet')->extends('layouts.layoutMaster');
    }
}
