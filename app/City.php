<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='cities';
    protected $fillable=[
        'id',
        'state_name',
        'city_name',
        'country_id',

    ];
    public function country_id()
    {
        return $this->hasOne('App\Country','id','country_id');
    }

}
