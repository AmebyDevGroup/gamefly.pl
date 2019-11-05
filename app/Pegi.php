<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Pegi extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'name',
        'slug',
        'age',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image');
    }
}
