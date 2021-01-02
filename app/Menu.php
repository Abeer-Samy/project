<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    public function reservations(){
        return $this->hasMany('App\Reservations');
    }
    protected $fillable=[
        'nameOfMeal',
        'price',
        'ingredients',
        'description'
    ];
}
