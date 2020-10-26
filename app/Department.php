<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    protected $fillable=[
        'id',
        'department_name',
        'icon',
        'description',
        'keyword',
        'parent_id',


    ];
    public function parent()
    {
        return $this->hasMany('App\Department','id','parent_id');
    }
}
