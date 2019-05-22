<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_in_cart extends Model
{
    protected $fillable = [
        'id_product',
        'user_id',
    ];
    protected $table = 'product_in_carts';
}
