<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('welcome', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $post->increment('views');
        $comments = Comment::where('post_id', $post->id)
        ->with('user')
        ->get();
    // return $comments;
        return view('posts.show', compact('post','comments'));

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
       {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|max:1024',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('post_images', 'public');
            } else {
                $imagePath = "post_images/img_1.jpeg";
            }

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->author_name = Auth::user()->name;
            $post->image = $imagePath;
            $post->user_id = Auth::id();
            $post->save();


            if ($post) {
                return redirect()->route('home')
                    ->with('success', 'Post created successfully');
            } else {
                return redirect()->back()
                    ->with('error', 'Error creating the post');
            }
        }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'content' => 'required',
            'image' => 'nullable|image|max:1024',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author_name = $request->input('author_name');

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }
        $post->save();

        return redirect()->route('home')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('home')
            ->with('success', 'Post deleted successfully');
    }

}