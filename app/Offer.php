<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'validity','price','quantity',
    ];
    public function item(){
        return $this->belongsTo('App\Item');
    }
}
