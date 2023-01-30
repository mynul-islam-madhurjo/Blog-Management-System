<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogGenre extends Model
{
    use HasFactory;

    protected $table    = 'blog_genres';
    public $timestamps  = false;
    protected $fillable = [
        'catagory',
        'status',
    ];
}
