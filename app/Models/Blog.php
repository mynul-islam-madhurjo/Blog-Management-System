<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * The attributes that are mass assignable.
 *
 * @var array
 */

class Blog extends Model
{
    use HasFactory;

    protected $table    = 'blog';

    protected $fillable = [
        'user_id',
        'blog_genre_id',
        'description',
        'title',
        'status',
    ];

    public function tags() :BelongsToMany
    {
        return $this->belongsToMany(tag::class)->withTimeStamps();
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function genre() {
        return $this->belongsTo(BlogGenre::class,'blog_genre_id','id');
    }
}
