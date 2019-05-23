<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name_en',
        'name_ru',
        'description_en',
        'description_ru',
        'suggested_use_en',
        'suggested_use_ru',
        'ingredients',
        'price',
        'expiration_date',
        'quantity',
        'id_manufacturer',
        'id_category',
    ];
    protected $table = 'products';
}
