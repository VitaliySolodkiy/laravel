<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $value : '/images/no-image.jpg', //стрелочная функция
        );
    }

    public function important(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ?? 0, //стрелочная функция
        );
    }

    public function shortContent(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::words(strip_tags($attributes['content']), 30, '...'),
        );
    }
}
