<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_in_sale extends Model
{
    protected $fillable = [
        'id_category',
        'id_promotion',
    ];
    protected $table = 'Category_in_sales';
}
