<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chartaccount extends Model
{
    protected $guarded=[];

    protected $appends = ['typeName'];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'chartaccount_id');
    }

    public function transact($amount)
    {
        if ($this->type == 'Debit') {
            $this->amount += $amount;
        } elseif ($this->type == 'Credit') {
            $this->amount -= $amount;
        }
        $this->save();
    }

    public function getTypeNameAttribute()
    {
        if ($this->type=='Debit') {
            return  'Debit';
        } elseif ($this->type=='Credit') {
            return  'Credit';
        }
        return '';
    }
}
