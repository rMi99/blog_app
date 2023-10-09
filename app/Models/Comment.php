<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = ['content', 'user_id', 'post_id'];

    // Define the User relationship (a comment belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the Post relationship (a comment belongs to a post)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
