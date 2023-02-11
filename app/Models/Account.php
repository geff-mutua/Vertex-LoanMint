<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public function chartaccount(){
        return $this->belongsTo(Chartaccount::class);
    }

    public function subaccounts()
    {
        return $this->hasMany(SubAccount::class);
    }

    public function reverse($amount, $propagate = true)
    {
        if ($this->type == 'Debit') {
            $this->amount -= $amount;
        } elseif ($this->type == 'Credit') {
            $this->amount += $amount;
        }
        $this->save();
        // if ($propagate) {
        //     $this->chartaccount->transact($amount);
        // }
    }

    public function transact($amount, $propagate = true)
    {
        if ($this->type == 'Debit') {
            $this->amount += $amount;
        } elseif ($this->type == 'Credit') {
            $this->amount -= $amount;
        }
        $this->save();
        // if ($propagate) {
        //     $this->chartaccount->transact($amount);
        // }
    }

    public function getTypeAttribute()
    {
        if ($this->chartaccount) {
            return $this->chartaccount->type;
        } else {
            return null;
        }
    }

    public function detailsAccount(){
        return $this->belongsTo(DetailAccount::class,'detail_account_id');
    }
}
