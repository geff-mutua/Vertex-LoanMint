<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Borrower extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function officer(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function loan(){
        return $this->hasMany(Loan::class);
    }
    // public function message(){
    //     return $this->hasMany(Message::class);
    // }
    public function loanstatement(){
        return $this->hasMany(BorrowerLoanStatement::class);
    }
    // # Define relationship of borrower and Guarantor
    // public function guarantor(){
    //     return $this->hasOne(Guarantor::class);
    // }
    public function fullname(){
        return $this->first_name . ' ' . $this->last_name;
    }
}