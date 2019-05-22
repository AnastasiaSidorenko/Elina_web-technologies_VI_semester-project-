<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_in_order extends Model
{
    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'price',
    ];
    protected $table = 'product_in_orders';
}
