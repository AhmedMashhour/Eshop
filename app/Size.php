<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table='sizes';
    protected $fillable=[
        'id',
        'name',
        'department_id',
        'is_public',

    ];
    public function department_id()
    {
        return $this->hasOne('App\Department','id','department_id');
    }
}
