<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table='states';
    protected $fillable=[
        'id',
        'city_id',
        'state_name',
        'country_id',

    ];
    public function country_id()
    {
        return $this->hasOne('App\Country','id','country_id');
    }
    public function city_id()
    {
        return $this->hasOne('App\City','id','city_id');
    }
}
