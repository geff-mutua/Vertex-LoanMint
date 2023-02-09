<?php

namespace App\Http\Livewire\Content\Admin\Clients;

use Livewire\Component;
use App\Models\Borrower;
use App\Models\Guarantor;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class AddBorrower extends Component
{
    use WithFileUploads;
    public $marital_status,$spouse_phone;
    public $first_name,$spouse,$spouse_naid;
    public $last_name,$id_number,$address,$mobile;
    public $middle_name,$date_of_birth;
    public $code,$town,$residence_address;
    public $education_level,$residence_type;
    public $borrower_spouse_id_photo;
    public $borrower_spouse_passport;
    public $borrower_passport;
    public $borrower_id_photo;

    #Stage 2
    public $business_type;
    public $business_location;
    public $monthly_income;
    public $net_income;
    public $monthly_expenses;
    public $monthly_household_expenses;
    public $business_type_trade;
    public $business_type_others;
    
    public $borrower;
    
    # Stage 3
    public $full_name;
    public $occupation;
    public $phone;
    public $naid;
    public $relationship;
    public $residence_location;
    public $gbusiness_location;
    public $years_known;

    #last stage $loan
    public $loan_officer;
    
    public $stage=0;
    protected $rules = [
        'marital_status' => 'required',
        'first_name'=>'required|min:2',
        'last_name'=>'required',
        'id_number'=>'required|unique:borrowers,id_number',
        'date_of_birth'=>'required',
        'mobile'=>'required|unique:borrowers,mobile',
        'address'=>'required',
      
        'code'=>'required',
        'town'=>'required',
        'residence_address'=>'required',
        'education_level'=>'required',
        'residence_type'=>'required',
        'borrower_passport'=>'required',
        'borrower_id_photo'=>'required',
        

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function stageOne(){
        $this->validate(); 
        
        if($this->marital_status=="Married"){
            $this->validate([
                'borrower_spouse_id_photo'=>'required|image|max:1024',
                'borrower_spouse_passport'=>'required|image|max:1024',
            ]);

            $this->baccountDetailorrower_spouse_id_photo=$this->borrower_spouse_id_photo->store('documents');
            $this->borrower_spouse_passport=$this->borrower_spouse_passport->store('documents');
        }
      
        // Save the file Uploads
        $this->borrower_passport=$this->borrower_passport->store('documents');
        $this->borrower_id_photo=$this->borrower_id_photo->store('documents');

        
       $this->borrower= Borrower::create([
            'user_id'=>auth()->user()->id,
            'marital_status'=>$this->marital_status,
            'first_name'=>$this->first_name,
            'spouse_phone'=>$this->spouse_phone,
            'spouse'=>$this->spouse,
            'spouse_naid'=>$this->spouse_naid,
            'last_name'=>$this->last_name,
            'id_number'=>$this->id_number,
            'address'=>$this->address,
            'mobile'=>$this->mobile,
            'middle_name'=>$this->middle_name,
            'date_of_birth'=>$this->date_of_birth,
            'code'=>$this->code,
            'town'=>$this->town,
            'residence_address'=>$this->residence_address,
            'education_level'=>$this->education_level,
            'residence_type'=>$this->residence_type,
           
            'borrower_spouse_id_photo'=>$this->borrower_spouse_id_photo,
            'borrower_spouse_passport'=>$this->borrower_spouse_passport,
            'borrower_passport'=>$this->borrower_passport,
            'borrower_id_photo'=>$this->borrower_id_photo,
            
        ]);
        Alert::success('Client had been Updated. Fill in the next stage', 'Success Message');
       
        $this->stage=1;

    }

    public function stageTwo(){
        $this->validate([
            'business_type'=>'required',
            'business_location'=>'required',
            'monthly_income'=>'required',
            'net_income'=>'required',
            'monthly_expenses'=>'required',
            'monthly_household_expenses'=>'required'
        ]);
        if($this->business_type=="Trade"){
            $this->business_type_others=null;
            $this->validate([
                'business_type_trade'=>'required',
            ]);
        }
        if($this->business_type=="Other"){
            $this->business_type_trade=null;
            $this->validate([
                'business_type_others'=>'required',
            ]);
        }


        $this->borrower->business_type=$this->business_type;
        $this->borrower->business_location=$this->business_location;
        $this->borrower->monthly_income=$this->monthly_income;
        $this->borrower->net_income=$this->net_income;
        $this->borrower->monthly_expenses=$this->monthly_expenses;
        $this->borrower->monthly_household_expenses=$this->monthly_household_expenses;
        $this->borrower->business_type_trade=$this->business_type_trade;
        $this->borrower->business_type_others=$this->business_type_others;
        $this->borrower->save();

        $this->stage=2;
    }
    public function stageThree(){
        $this->validate([
        'full_name'=>'required',
        'occupation'=>'required',
        'phone'=>'required',
        'naid'=>'required',
        'relationship'=>'required',
        'residence_location'=>'required',
        'gbusiness_location'=>'required',
        'years_known'=>'required',
        
    ]);
     Guarantor::create([
        'borrower_id'=>$this->borrower->id,
        'full_name'=>$this->full_name,
        'occupation'=>$this->occupation,
        'phone'=>$this->phone,
        'naid'=>$this->naid,
        'relationship'=>$this->relationship,
        'residence_location'=>$this->residence_location,
        'business_location'=>$this->gbusiness_location,
        'years_known'=>$this->years_known,
        // 'description'=>$this->description,
     ]);


    $this->stage=3;
}

public function stageFour(){
    if($this->loan_officer==null){
        
       Alert('success','Borrower has been onboarded successfully');
        $this->borrower=null;
        $this->stage=0;
    }else{
        $this->borrower->user_id=$this->loan_officer;
        $this->borrower->save();
        Alert('success','Borrower has been onboarded successfully');
        $this->borrower=null;
        $this->stage=0;
    }
}


    public function render()
    {
       
        return view('livewire.content.admin.clients.add-borrower')->extends('layouts.layoutMaster');
    }
}