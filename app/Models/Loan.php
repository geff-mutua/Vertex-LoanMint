<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }

    public function loanproduct(){
        return $this->belongsTo(LoanProduct::class,'loan_product_id');
    }

    public function statement(){
        return $this->hasMany(BorrowerLoanStatement::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
