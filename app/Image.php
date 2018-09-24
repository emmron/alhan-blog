<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'alt_text', 'file_basename', 'post_id'
    ];
}
