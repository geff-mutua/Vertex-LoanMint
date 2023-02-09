<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepaymentSchedule extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['loan_id','borrower_id','amount','repayment_date','status','loan_officer'];

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
}
