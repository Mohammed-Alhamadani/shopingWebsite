<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function OrderDetails(){
        return $this->hasMany(orderdetails::class);
    }
}
