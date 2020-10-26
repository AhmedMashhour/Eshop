<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $table='products';
    protected $fillable=[
        'id',
        'title',
        'size',
        'photo',
        'content',
        'weight',
        'stock',
        'price',
        'price_offer',
        'status',
        'reason',
        'end_at',
        'start_at',
        'end_offer_at',
        'start_offer_at',
        'other_data',
        'department_id',
        'currency_id',
        'trademark_id',
        'manufact_id',
        'color_id',
        'size_id',
        'weight_id',

    ];
public function files()
{
    return $this->hasMany('App\Files','relation_id','id')->where('file_type','product');
}
    public function department_id()
    {
        return $this->hasOne('App\Department','id','department_id');
    }
    public function currency_id()
    {
        return $this->hasOne('App\Country','id','currency_id');
    }

    public function trademark_id()
    {
        return $this->hasOne('App\Trademark','id','trademark_id');
    }
    public function manufact_id()
    {
        return $this->hasOne('App\Manufact','id','manufact_id');
    }

    public function color_id()
    {
        return $this->hasOne('App\Color','id','color_id');
    }

    public function size_id()
    {
        return $this->hasOne('App\Size','id','size_id');
    }

    public function weight_id()
    {
        return $this->hasOne('App\Weight','id','weight_id');
    }
}
