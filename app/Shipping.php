<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table='shippings';
    protected $fillable=[
        'id',
        'name',
        'user_id',
        'lat',
        'address',
        'long',
        'icon',
    ];
    public function user_id()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
