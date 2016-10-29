<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','address','phone','email','category','term',
    ];
    public function sale(){
        return $this->hasMany('App\Sale');
    }
    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}
