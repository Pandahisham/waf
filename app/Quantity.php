<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $table='quantitys';
    protected $fillable = [
        'item_quantity',
    ];
    public function item(){
        return $this->belongsTo('App\Item');
    }
}
