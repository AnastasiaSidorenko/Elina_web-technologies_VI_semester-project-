<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'id',
        'name_en',
        'name_ru'
    ];
    protected $table = 'sections';
}
