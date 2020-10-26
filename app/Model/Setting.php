<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model{
    protected $table='setting';
    protected $fillable=[
        'id',
        'siteName',
        'logo',
        'icon',
        'email',
        'main_lang',
        'description',
        'keywords',
        'status',
        'message_minten',

    ];


}