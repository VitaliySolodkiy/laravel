<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'content', 'important', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getCreatedAtAttribute($date) //меняем формат выводимой даты создания статьи. теперь при обращении к $article->created_at будет выводить только дата без часов
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
