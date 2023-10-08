@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary end-0" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fas fa-plus"></i> Add Post
    </button>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4" >
                <div class="card" style="height: 500px;">
                    <img src="{{ $post->image }}" class="card-img-top" style="height: 200px;width: fit-content;" alts="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>{{ $post->created_at->format('F j, Y') }}
                        </p>
                        <p class="card-text">{{ Str::limit($post->content, 200) }}</p>
                        <p class="card-text">Published by {{ $post->author_name }} on </p>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read More</a>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Create a New Post</h1>
                        {{-- {{ route('posts.store') }} --}}
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="author_name" class="form-label">Author Name</label>
                                <input type="text" class="form-control" id="author_name" name="author_name" required>
                            </div>
                    
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                            </div>
                    
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


</div>


@endsection
