<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufact extends Model
{


    protected $table='manufacts';
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
    ];
}
