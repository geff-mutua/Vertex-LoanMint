<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model
{
    use HasFactory;
    protected $fillable=['name','amount','account_id'];

    public function mainaccount()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function transact($amount)
    {
        if ($this->type == 'Debit') {
            $this->amount += $amount;
        } elseif ($this->type == 'Credit') {
            $this->amount -= $amount;
        }
        $this->save();
        $this->mainaccount->transact($amount);
    }

    public function reverse($amount)
    {
        if ($this->type == 'Debit') {
            $this->amount -= $amount;
        } elseif ($this->type == 'Credit') {
            $this->amount += $amount;
        }
        $this->save();
        $this->mainaccount->reverse($amount);
    }

    public function getTypeAttribute()
    {
        if ($this->mainaccount && $this->mainaccount->chartaccount) {
            return $this->mainaccount->chartaccount->type;
        } else {
            return null;
        }
    }
}
