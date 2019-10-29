<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GamesCategory extends Model
{
    use SoftDeletes;
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
