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

    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);


    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }
    public function OrderDetails(){
        return $this->hasMany(orderdetails::class);
    }




}
