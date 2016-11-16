<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     protected $fillable = [
        'name','address','phone','email','category','term','identification',
    ];
    public function order(){
        return $this->hasMany('App\Order');
    }
    public function shipment(){
        return $this->hasMany('App\Shipment');
    }
}
