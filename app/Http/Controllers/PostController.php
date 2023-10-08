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
        $posts = Post::latest()->get();
        return view('welcome',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
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
        }else{
        $imagePath = "post_images/img_1.jpeg";

        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author_name = $request->input('author_name');
        $post->image = $imagePath;
        $post->user_id = Auth::id(); 
        $post->save();
        // dd( Auth::id());
        return redirect()->route('home')
        ->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'content' => 'required',
            'image' => 'nullable|image|max:1024', 
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = 'storage/'.$imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
