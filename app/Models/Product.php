<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable=[
        'name',
        'price',
        'quantity',
        'description',
        'category_id',
        'imagepath'
    ];
}
