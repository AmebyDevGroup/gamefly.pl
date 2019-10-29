<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(GamesCategory::class);
    }

    public function getUrl()
    {
        return route('Front::game', [$this->category, $this]);
    }
}
