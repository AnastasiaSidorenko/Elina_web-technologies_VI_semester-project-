<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name_en',
        'name_ru',
        'id_section',
    ];
    protected $table = 'categories';
}
