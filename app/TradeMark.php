<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeMark extends Model
{
    protected $table='trademarks';
    protected $fillable=[
        'id',
        'trademark_name',

        'logo',
    ];
}
