<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table='batchs';
    protected $fillable = [
        'batch_tag','manufacture_date','expiry_date','quantity','shrinkage','sell',
    ];
    public function item(){
        return $this->belongsTo('App\Item');
    }
    public function shipment(){
        return $this->belongsTo('App\Shipment');
    }
    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}
