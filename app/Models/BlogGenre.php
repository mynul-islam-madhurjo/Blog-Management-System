<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogGenre extends Model
{
    use HasFactory;

    protected $table    = 'blog_genres';
    protected $fillable = [
        'catagory',
        'status',
    ];

    public function blog() {
        return $this->hasMany(Blog::class, 'blog_genre_id', 'id');
    }
}


