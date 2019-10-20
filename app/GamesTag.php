<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesTag extends Model
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

    public function games()
    {
        $this->belongsToMany(Game::class, 'game_tag', 'tag_id', 'game_id');
    }
}
