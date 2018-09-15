<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug', 'title', 'body', 'published'
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
