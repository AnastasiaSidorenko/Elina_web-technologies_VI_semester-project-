<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback_on_product extends Model
{
    protected $fillable = [
        'id_order',
        'id_feedback',
    ];
    protected $table = 'feedback_on_products';
}
