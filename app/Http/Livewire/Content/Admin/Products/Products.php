<?php

namespace App\Http\Livewire\Content\Admin\Products;

use App\Models\Branch;
use Livewire\Component;
use App\Models\LoanProduct;

class Products extends Component
{
    public $branches=[];
    public $products=[];
    public $product_id;
    public $product_name,$interest_rate,$max_loan,$min_loan,$duration,$branch,$interest_type,$procesing_fee_rate;

    public function store(){
        $this->validate([
            'product_name'=>'required',
            'interest_rate'=>'required',
            'max_loan'=>'required',
            'min_loan'=>'required',
            'duration'=>'required',
            'branch'=>'required',
            'interest_type'=>'required',
            'procesing_fee_rate'=>'required'
            
        ]);

        LoanProduct::updateOrCreate(['id'=>$this->product_id],[
            'product_name'=>$this->product_name,
            'interest_rate'=>$this->interest_rate,
            'min_loan'=>$this->min_loan,
            'max_loan'=>$this->max_loan,
            
            'duration'=>$this->duration,
            'branch_id'=>$this->branch,
            'interest_type'=>$this->interest_type,
            'procesing_fee_rate'=>$this->procesing_fee_rate
        
        ]);

        $this->product_name=null;
        $this->interest_rate=null;
        $this->min_loan=null;
        $this->max_loan=null;
        $this->installments=null;
        $this->duration=null;
        $this->branch=null;
        $this->procesing_fee_rate=null;
        $this->interest_type=null;

    }
    public function editProduct(LoanProduct $product){
        $this->product_id=$product->id;
        $this->product_name=$product->product_name;
        $this->interest_rate=$product->interest_rate;
        $this->min_loan=$product->min_loan;
        $this->max_loan=$product->max_loan;
        $this->installments=$product->installments;
        $this->duration=$product->duration;
        $this->branch=$product->branch_id;
        $this->procesing_fee_rate=$product->procesing_fee_rate;
        $this->interest_type=$product->interest_type;
    }
    public function render()
    {
        $this->branches=Branch::all();
        $this->products=LoanProduct::all();
        return view('livewire.content.admin.products.products')->extends('layouts.layoutMaster');
    }
}
