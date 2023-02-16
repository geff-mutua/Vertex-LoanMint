<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function loan(){
        return $this->belongsTo(Loan::class);
    }
    public function borrower(){
        return $this->belongsTo(Borrower::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
