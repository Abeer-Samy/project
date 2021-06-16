<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

    class Reservations extends Model
{
    public function menu(){
         return $this->belongsTo('App\Menu');
    }

//
    protected $fillable =[
        'name',
        'email',
        'phoneNumber',
        'numOfPerson',
        'tableRes',
        'menu_id'

    ];

}
