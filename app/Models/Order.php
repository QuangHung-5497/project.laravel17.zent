<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_detail(){
        return $this->hasMany(Order_detail::class);
    }
}
