<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index()
    {
        // $posts = Post::latest()->paginate(10);
        // return view('home');

    }

    // Method to display a specific blog post
    public function show($id)
    {

        $post = Post::find($id);
        $comments = $post->comments;


        return view('posts.show', compact('post','comments'));
    }

    // Method to create a new blog post
    public function create()
    {
        return view('posts.create');
    }

    // Method to store a new blog post
    public function store(Request $request)
    {
        // Validate the post input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:1024', // 1MB maximum size limit for the image
        ]);

        // Upload and store the image (if provided)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
        }

        // Create a new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = $imagePath;
        $post->user_id = Auth::id(); // Assuming you have user authentication
        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully');
    }

    // Method to edit a blog post
    public function edit(Post $post)
    {
        // Ensure that the user is authorized to edit this post
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    // Method to update a blog post
    public function update(Request $request, Post $post)
    {
        // Ensure that the user is authorized to update this post
        $this->authorize('update', $post);

        // Validate the post input
        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'content' => 'required',
            'image' => 'nullable|image|max:1024', // 1MB maximum size limit for the image
        ]);

        // Update the post
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        // Upload and update the image (if provided)
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    // Method to delete a blog post
    public function destroy(Post $post)
    {
        // Ensure that the user is authorized to delete this post
        $this->authorize('delete', $post);

        // Delete the post's image (if it exists)
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
