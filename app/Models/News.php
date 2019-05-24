<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'id',
        'title_en',
        'title_ru',
        'body_en',
        'body_ru',
        'date',
        'image',
    ];
    protected $table = 'news';
}
