@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary end-0" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fas fa-plus"></i> Add Post
    </button>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4" style="margin: 5%">
            <div class="card" style="height: 500px;">
                <img src="storage/{{ $post->image }}" class="card-img-top" style="height: 375px;width:350px ;" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>{{ $post->created_at->format('F j, Y') }}</p>
                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                    <p class="card-text">Published by {{ $post->author_name }}</p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read More</a>
        
                    {{-- Edit Button --}}
                    {{-- {{ route('posts.edit', ['post' => $post->id]) }} --}}
                    <a href="" class="btn btn-success">
                        <i class="fas fa-edit"></i> Edit
                    </a>
        
                    {{-- <form action="{{ route('home.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline-block;"> --}}
                        <form action="" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(this)">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
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
                 
                        {{-- {{ route('posts.store') }} --}}
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
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
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 3000, 
            timerProgressBar: true, 
            onClose: () => {
               
                window.location.href = '{{ route('home') }}';
            }
        }).then((result) => {
           
            if (result.dismiss === Swal.DismissReason.timer) {
               
            }
        });
    
@endif

<script>
    function confirmDelete(button) {
        Swal.fire({
            title: 'Delete Post',
            text: 'Are you sure you want to delete this post?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit(); 
            }
        });
    }
</script>

@endsection
