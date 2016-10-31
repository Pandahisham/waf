<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
     protected $fillable = [
        'type','transaction_id','status','vat','discount','total','customer_id',
    ];
    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
