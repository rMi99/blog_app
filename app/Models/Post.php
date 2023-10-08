<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_name',
        'content',
        'image',
        'user_id'
    ];

    // Define the relationship between a post and its comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
