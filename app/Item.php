<?php

namespace App;
use App\Batch;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table='items';
    protected $fillable = [
        'tag','name','price',
    ];
    public function batch(){
        return $this->hasMany('App\Batch');
    }
    public function quantity(){
        return $this->hasOne('App\Quantity');
    }
    public function order(){
        return $this->belongsToMany('App\Order');
    }
}
