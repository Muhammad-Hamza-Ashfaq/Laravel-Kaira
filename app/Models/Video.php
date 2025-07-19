<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = [
        'video_link',
        'background_image',
        'on_video_image',
    ];
}
