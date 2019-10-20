<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'category_id');
    }
}
