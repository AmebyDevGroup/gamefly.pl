<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'game_id',
        'front_user_id',
        'rate'
    ];
}
