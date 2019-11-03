<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Game extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
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

    public function registerMediaCollections()
    {
        $this->addMediaCollection('poster');
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('info-bg')
            ->fit(Manipulations::FIT_FILL, 150, 150)
            ->background('343a40');
        $this->addMediaConversion('info')
            ->fit(Manipulations::FIT_FILL, 150, 150);
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_STRETCH, 150, 200);
        $this->addMediaConversion('large')
            ->fit(Manipulations::FIT_STRETCH, 356, 474);
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
