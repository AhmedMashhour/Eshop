<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $table='malls';
    protected $fillable=[
        'id',
        'name',
        'facebook',
        'twitter',
        'contact_name',
        'lat',
        'mobile',
        'address',
        'long',
        'icon',
        'country_id',
    ];
    public function country_id()
    {
        return $this->hasOne('App\Country','id','country_id');
    }
}
