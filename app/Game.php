<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'ordering',
        'code',
        'name',
        'slug',
        'description',
        'price',
        'active',
        'preorder',
        'sale',
    ];
}
