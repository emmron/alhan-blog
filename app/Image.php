<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'alt_text', 'sm', 'md', 'lg', 'post_id'
    ];
}
