<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'wastage_price','total_price',
    ];
    public function order(){
        return $this->hasMany('App\Order');
    }
}
