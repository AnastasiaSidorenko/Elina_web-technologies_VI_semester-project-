<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id',
        'name_en',
        'name_ru',
        'discount',
        'start_date',
        'end_date'
    ];
    protected $table = 'sales';
}
