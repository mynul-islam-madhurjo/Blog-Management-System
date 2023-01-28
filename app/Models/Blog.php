<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * The attributes that are mass assignable.
 *
 * @var array
 */

class Blog extends Model
{
    use HasFactory;

    protected $table    = 'blog';
    public $timestamps  = false;
    protected $fillable = [
        'user_id',
        'description',
        'title',
        'status',
    ];
}
