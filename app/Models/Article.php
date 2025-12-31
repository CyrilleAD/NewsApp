<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlugOptions;
use Illuminate\Support\Facades\Storage;
class Article extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'isActive',
        'isCommentable',
        'isShareable',

        'category_id',
        'author_id',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function imageurl()
    {
        return Storage::url($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
