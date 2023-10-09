<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function index(Request $request, Post $post)  {
     
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        
        // Create and save the comment using the create method
        $comment = Comment::create([
            'content' => $request->input('comment'),
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);
        
        return redirect()->route('posts.show', ['post' => $post])
            ->with('success', 'Comment added successfully');

    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255', 
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->user()->id; // Assuming you're storing the user who created the comment
        $comment->post_id = $request->input('post_id'); // Assuming you have a 'post_id' field in your form

        $comment->save();

        // Redirect back or to a specific page after comment creation
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
      
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully');
    }
}
