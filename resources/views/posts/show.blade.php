@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p>Author: {{ $post->author_name }}</p>
                <p>Published Date: {{ $post->created_at }}</p>
                <div>
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>

    <hr>


    <div class="container">
        <h2>Comments</h2>
        @foreach ($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    {{ $comment->content }}
                </div>
            </div>
        @endforeach

        {{-- {{ $comments->links() }} --}}

        @auth
            <form method="post" action="">
                {{-- <form method="post" action="{{ route('comments.store', ['post' => $post]) }}"> --}}
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
        @endauth
    </div>
@endsection

{{-- <p>{{ $post->title }}</p>

@foreach ($comments as $comment)
<h1>
    {{ $comment->content }}
</h1>
@endforeach --}}

