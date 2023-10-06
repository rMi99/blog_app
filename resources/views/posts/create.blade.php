@extends('layouts.app')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image (Optional)</label>
        <input type="file" name="image" id="image" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>



