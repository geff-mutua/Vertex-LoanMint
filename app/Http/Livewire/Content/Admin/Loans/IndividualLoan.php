<?php

namespace App\Http\Livewire\Content\Admin\Loans;

use App\Models\Loan;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\LoanProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\BorrowerLoanStatement;

class IndividualLoan extends Component
{
    public $borrowers=[];
    public $individual_loan_borrower;
    public $individual_loan_amount;
    public $loan_purpose;


    public $loans=[];
    public $unApprovedloans=[];

    public $loanProducts=[];
    public $domain;
    public $loan_product;

    protected $listeners=['approveLoan','rejectLoan'];

    #Selected Product Variables
    public $interest_rate=0;
    public $interest_type='--';
    public $processing_fee;
    public $repayment_period='--';
    public $max_loan=0;
    public $max_limit;

    #loan Calculation variables
    public $interest=0;
    public $total=0;
    public $disbursed=0;

    #error Message
    public $has_existing_loan;

    # Stats Display
    public $total_active=0.00;
    public $total_rejected=0.00;
    public $total_paid=0.00;
    public $total_arrears=0.00;

    #Sumamry
    public $summations=[
        'active'=>0,
        'rejected'=>0,
        'arrears'=>0,
        'paid'=>0,
    ];

    public function mount(){
        $this->loanProducts=LoanProduct::all();
    }

    public function render()
    {
        $this->borrowers=Borrower::whereStatus("1")->get();
        $this->loans=Loan::orderBy('id',"Desc")->get()->each(function ($loan){
            if($loan->status=='Active'){
                $this->total_active+=(float) $loan->total;
            }elseif($loan->status=='Rejected'){
                $this->total_rejected+=(float) $loan->total;
            }elseif(Carbon::parse($loan->due_date) < Carbon::now()){
                if($loan->status !='Paid')
                $this->total_arrears +=(float) $loan->statement()->latest()->first()->balance;
            } elseif($loan->status=='Paid'){
                $this->total_paid+=(float) $loan->total;
            }
        });
        $this->summations['active']=$this->total_active;
        $this->summations['rejected']=$this->total_rejected;
        $this->summations['arrears']=$this->total_arrears;
        $this->summations['paid']=$this->total_paid;
        // $this->unApprovedloans=Loan::whereStatus("Pending")->get();

      
        $this->setLoanDetails();
        return view('livewire.content.admin.loans.individual-loan')->extends('layouts.layoutMaster');
    }
    protected $rules = [
        'individual_loan_borrower' => 'required',
        'individual_loan_amount'=>'required|numeric',
        'loan_purpose'=>'required',
        'loan_product'=>'required',
       
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function applyLoan(){
       
        $this->validate();
       
        if($this->hasActiveLoan($this->individual_loan_borrower)){
          # Borrower has an active loan
          $this->has_existing_loan='The selected Borrower has an active loan.';
            
        }else{
           if((int)$this->individual_loan_amount >(int)$this->max_loan){
            $this->max_limit='The borrowed amount should be Ksh '.number_format($this->max_loan).' or less';
           }else{
            $results=Loan::Create([
                'borrower_id'=>$this->individual_loan_borrower,
              
                'loan_product_id'=>$this->loan_product,
                'amount'=>$this->individual_loan_amount,
                'interest'=>$this->interest,
                'total'=>$this->total,
                'processing_fee'=>$this->processing_fee ? '1':'2',
                'transaction_code'=>'LM'.rand(1000,5000).$this->individual_loan_borrower.strtoupper(Str::random(5)),
                'disbursement_status'=>0,
                'loan_purpose'=>$this->loan_purpose,
                'status'=>'Pending',
                'date'=>Carbon::now(),
                'due_date'=>Carbon::now()->addDays($this->repayment_period),
            ]);
    
            $this->interest_rate='--';
            $this->interest_type='--';
            $this->processing_fee=null;
            $this->repayment_period='--';
            $this->total=0;
            $this->interest=0;
            $this->individual_loan_borrower=null;
            $this->loan_product=null;
            $this->individual_loan_amount=null;
            $this->interest=null;
            $this->total=null;
            $this->processing_fee=null;
            $this->loan_purpose=null;

            $this->emit('LoanCreated');

           }
        }            
    }

    public function hasActiveLoan($id){
        $exists=Loan::where('borrower_id',$id)->whereStatus('Active')->orWhere('status',"Pending")->first();
        
        if($exists==null){
            return false;
        }else{
            return true;
        }
    }

    public function setLoanDetails(){
        if($this->loan_product !=""){
            $product=LoanProduct::find($this->loan_product);
            $this->interest_rate=$product->interest_rate;
            $this->interest_type=$product->interest_type;
            $this->processing_fee=$product->procesing_fee_rate;
            $this->repayment_period=$product->duration;
            $this->max_loan=$product->max_loan;

            if( $this->individual_loan_amount !=null){
                
                if($this->individual_loan_amount==0){
                    $this->interest=0;
                    $this->total=0;
                }else{
                    $this->interest=$this->individual_loan_amount*$this->interest_rate/100;
                    if($this->interest_type=="After"){
                        
                        $this->total=$this->individual_loan_amount+$this->interest;
                        $this->disbursed=$this->total;
                    }else{
                        $this->total=$this->individual_loan_amount;
                        $this->disbursed=$this->total-$this->interest;
                    }
                }    
                
            }else{
                $this->total=0;
                $this->interest=0;
                $this->disbursed=0;
            }

        }else{
            $this->interest_rate='--';
            $this->interest_type='--';
            $this->processing_fee=null;
            $this->repayment_period='--';
            $this->total=0;
            $this->interest=0;
        }
    }

    public function approveLoan(Loan $loan){
        
        $loan->status="Approved";
        $loan->approved_by=auth()->user()->id; # Person Who has approved the loan
        $loan->save();

        #Create Statement for the loan
        BorrowerLoanStatement::create([
            'borrower_id'=>$loan->borrower_id,
            'loan_id'=>$loan->id,
            'action'=>"Loan Application Approved",
            'amount'=>$loan->total,
            'balance'=>$loan->total,
            'date'=>Carbon::now(),
        ]);
       
        # TODO 
        # Hit endpoint to send Money
        # Send SMS confirmation


        $this->dispatchBrowserEvent('swal', ['title' => 'Loan Approved',
            'text' => 'You have successfully Approved loan with transaction code ' . $loan->transaction_code,
            'icon' => 'success',
         ]);
  
        
    }
    public function rejectLoan(Loan $loan){
        $loan->status="Rejected";
        
        $loan->approved_by=auth()->user()->id; # Person Who has approved the loan
        $loan->save();

        $this->dispatchBrowserEvent('swal', ['title' => 'Loan Rejected',
        'text' => 'You have successfully Rejected loan with transaction code ' . $loan->transaction_code,
        'icon' => 'error',
    ]);
    }
}
