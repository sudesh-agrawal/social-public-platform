<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'short_description', 'description', 'tags', 'created_by'
    ];

    public function get_created_by(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function get_upload_image(){
        return $this->hasMany(Upload::class);
    }
}
