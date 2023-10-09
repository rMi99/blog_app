<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function index(Request $request, Post $post)  {
     
  
    }
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);
        
        $comment = Comment::create([
            'content' => $request->input('comment'),
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);
        
        return redirect()->route('posts.show', ['post' => $post])
            ->with('success', "Comment added successfully");
    

    }

    public function destroy(Comment $comment)
    {
      
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully');
    }

}