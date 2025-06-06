<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','name','email','product_id','amount','esewa_status'];
}
