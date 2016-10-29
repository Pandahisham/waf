<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'status','item_id','item_quantity','item_price','item_discount','customer_id',
    ];
    public function batch(){
        return $this->belongsTo('App\Batch');
    }
    public function sale(){
        return $this->belongsTo('App\Sale');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
