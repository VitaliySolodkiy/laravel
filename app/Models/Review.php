<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    //public $timestamps = false;
    public function article()
    {
        return $this->belongsTo(Article::class); //позволяет отобразить название статьи на странице списка комментариев
    }
}
