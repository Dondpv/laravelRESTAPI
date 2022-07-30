<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table= "order_models";
    public $timestamps = false;
    protected $fillable=[
        'id',
        'ordernum',
        'name',
        'address',
        'price',
         'date'
        ];
}
