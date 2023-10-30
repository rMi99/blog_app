@extends('layouts.app')

@section('content')

<div class="row justify-content-end">
    <div class="col-4">
      <div class="text-end" >
        <button type="button" style="margin-right: 40px;"  class="btn btn-primary end-0" data-bs-toggle="modal" data-bs-target="#myModal">
            <i class="fas fa-plus"></i> Add Post
        </button>
      </div>
    </div>
  </div>


<div class="container">

    <div class="row">

        @if ($posts->isEmpty())

        <div class="col-md-12 text-center">
            <img src="{{ asset('images/notfound.jpeg') }}" alt="No posts found" style="height: 350px; width: auto;">
            <h4>No posts found</h4>
        
        </div>
         @else


        @foreach ($posts as $post)
        <div class="col-md-4" style="margin: 5%">
            <div class="card" style="height: 500px;">
                <img src="storage/{{ $post->image }}" class="card-img-top" style="height: 250px;" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>{{ $post->created_at->format('F j, Y') }}</p>
                    <p class="card-text">{{ Str::limit($post->content, 70) }}</p>
                    <p class="card-text">Published by {{ $post->author_name }}</p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read More</a>

                    <!-- Edit btn -->
                    <button type="button" class="btn btn-success end-0" data-bs-toggle="modal" data-bs-target="#editModall{{ $post->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>

                    <!-- Del btn -->
                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>



        <!-- Edit Modal -->
        <div class="modal fade" id="editModall{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="edit_title" name="title" value="{{ $post->title }}" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="edit_author_name" class="form-label">Author Name</label>
                                <input type="text" class="form-control" id="edit_author_name" name="author_name" value="{{ $post->author_name }}" required>
                            </div> --}}
                            <div class="mb-3">
                                <label for="edit_content" class="form-label">Content</label>
                                <textarea class="form-control" id="edit_content" name="content" rows="4" required>{{ $post->content }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit_image" class="form-label">
                                    <img src="storage/{{ $post->image }}" width="100px" alt="" srcset="">
                                </label>

                                <input type="file" value="" class="form-control" id="edit_image" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif


    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="add_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="add_title" name="title" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="add_author_name" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="add_author_name" name="author_name" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="add_content" class="form-label">Content</label>
                            <textarea class="form-control" id="add_content" name="content" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="add_image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="add_image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags (Separate with Commas)</label>
                            <input type="text" class="form-control" id="tags" name="tags">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </form>
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
    </script>
@endif

@if($errors->any())
    <script>

        Swal.fire({
            title: 'errors!',
            text: '{{ $errors->first()}}',
            icon: 'error',
            timer: 3000,
            timerProgressBar: true,
            onClose: () => {
                window.location.href = '{{ route('home') }}';
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
            }
        });

    </script>
@endif



@endsection
