<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'img',
        'gallery',
        'slug'
    ];


    public function news()
    {
        return $this->hasMany(Gallery::class);
    }

    public function sluggable($title)
    {
        return Str::slug($title, $separator = '-', $language = 'en');
    }
}
