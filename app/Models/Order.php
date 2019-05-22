<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'id',
    'date',
    'total_price',
    'address',
    'user_id',
    'status',
    ];
    protected $table = 'orders';
}
