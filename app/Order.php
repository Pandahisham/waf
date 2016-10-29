<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'item_id','status','cartons','pieces_per_carton','total_price','wasted_cartons','wastage_price',
    ];
    public function shipment(){
        return $this->belongsTo('App\Shipment');
    }
    public function item(){
        return $this->hasOne('App\Item');
    }
}
