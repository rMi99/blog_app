<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Validate the comment input
        $request->validate([
            'content' => 'required|string|max:1000', // Adjust the max length as needed
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->user()->id; // Assuming you have user authentication
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', ['post' => $post])
            ->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        // Authorize the deletion (you can create a policy or gate for this)
        $this->authorize('delete', $comment);

        // Delete the comment
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }
}
