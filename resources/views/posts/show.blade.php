@extends('layouts.frontend')

@section('content')


<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{url('/')}}/storage/{{{ $post->image }}}');">
  
   <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10"> 
                <div class="post-entry text-center">
                    {{-- <span class="post-category text-white bg-success mb-3">Nature</span> --}}
                    <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset('images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By  {{ $post->author_name }}</span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at }}</span>
                        <p>Views: {{ $post->views }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="post-content-body">
                    <p>   {!! $post->content !!}</p>
                </div>

                <div class="pt-5">
                    <h3 class="mb-5"> Comments</h3>
                    <ul class="comment-list">


                        @foreach ($comments as $comment)
          
                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3> {{$comment->user->name}}</h3>
                                <div class="meta"> {{ $comment->created_at }}</div>
                                <p> {{ $comment->content }}</p>
                                {{-- <p><a href="#" class="reply rounded">Delete</a></p> --}}
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        @auth
                        {{-- <form method="post" action=""> --}}

                            <form method="POST" action="{{ route('comments.store', ['post' => $post->id]) }}">
                                @csrf <!-- CSRF Protection -->
                                
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                            

                            
                        @else
                        <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
                        @endauth
                        
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
