<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posttag extends Model
{
    use HasFactory;

    protected $table    = 'posttags';
    protected $fillable = [
        'tag_id',
        'blog_id',
    ];
}
