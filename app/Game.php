<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
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
        'pegi_id',
        'ordering',
        'code',
        'name',
        'slug',
        'introtext',
        'fulltext',
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

    public function pegi()
    {
        return $this->belongsTo(Pegi::class);
    }

    public function tags()
    {
        return $this->belongsToMany(GamesTag::class, 'game_tag', 'tag_id', 'game_id');
    }

    public function addTags($tags = [])
    {
        $tags_slug = [];
        $this->tags()->sync([]);
        if (!is_array($tags)) {
            $tags = explode(',', $tags);
        }
        foreach ($tags as $value) {
            $tags_slug[$value] = Str::slug($value);
        }
        $current_tags = GamesTag::whereIn('slug', $tags_slug)->pluck('slug')->toArray();
        $missing_tags = array_diff($tags_slug, $current_tags);
        foreach ($missing_tags as $m_tag_name => $m_tag_slug) {
            GamesTag::create([
                'name' => $m_tag_name,
                'slug' => $m_tag_slug,
                'description' => ''
            ]);
        }
        $all_tags = GamesTag::whereIn('slug', $tags_slug)->pluck('id');
        $this->tags()->sync($all_tags);
    }

    public function getUrl()
    {
        return route('Front::game', [$this->category, $this]);
    }
}
