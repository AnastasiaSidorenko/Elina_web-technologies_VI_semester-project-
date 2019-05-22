<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_feedback extends Model
{
    protected $fillable = [
        'id_feedback',
        'user_id',
    ];
    protected $table = 'user_feedbacks';
}
