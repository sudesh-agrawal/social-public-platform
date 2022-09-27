<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploades';

    protected $fillable = [
        'article_id', 'image_name'
    ];
}
