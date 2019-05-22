<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $fillable = [
        'id',
        'name',
        'id_product',
    ];
    protected $table = 'product_images';
}
