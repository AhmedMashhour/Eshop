<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
      'id','customer_id','checked','product_id','qty','price','product_name'
    ];

}
