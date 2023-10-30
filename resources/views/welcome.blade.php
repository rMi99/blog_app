@extends('layouts.frontend')

@section('content')

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('https://img.freepik.com/free-photo/flat-lay-top-view-office-table-desk-workspace-background_1150-6853.jpg?w=900&t=st=1696831498~exp=1696832098~hmac=1c630a15653f7391b8a3fe3d9f77ae2def8950eb0c0a49f99f1b268fe3dddd2a');">

    <div class="container">
         <div class="row same-height justify-content-center">
             <div class="col-md-12 col-lg-10">
                 <div class="post-entry text-center">
                     <img src="{{ asset('images/logo.png') }}"  alt="" srcset="">
                     <div class="post-meta align-items-center text-center">
                         {{-- <figure class="author-figure mb-0 mr-3 d-inline-block"><p>New thoughts from us </p></figure> --}}
                         {{-- <span class="d-inline-block mt-1">By Ramisha Gimhana</span> --}}

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">

        @foreach ($posts as $post)

            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"><img src="storage/{{{ $post->image }}}" alt="Image" style="max-height: 275px;height: 183px;width: 275px" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        {{-- <span class="post-category text-white bg-secondary mb-3">Politics</span> --}}
                        <h2><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}.</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('images/person_1.jpg') }}"  alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">Published by  <a href="#">{{ $post->author_name }}</a></span>
                            {{-- <span>&nbsp;-&nbsp; {{ $post->created_at }}</span>
                         --}}
                         <span>&nbsp;-&nbsp;     {{ $post->created_at->format('F d, Y') }}<br>
                            {{ $post->created_at->format('H:i A') }}</span>

                            <p>Views: {{ $post->views }}</p>
                        </div>
                        <p>{{ Str::limit($post->content, 80) }}</p>
                        <p><a href="{{ route('posts.show', ['post' => $post->id]) }}">Read More...</a></p>
                    </div>
                </div>
            </div>
         @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">

                <div class="custom-pagination">
                    <div class="custom-pagination">
                        @if ($posts->onFirstPage())
                            <span>1</span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}">1</a>
                        @endif

                        @if ($posts->currentPage() > 3)
                            <span>...</span>
                        @endif

                        @foreach ($posts->getUrlRange(2, $posts->lastPage()) as $page => $url)
                            @if ($page == $posts->currentPage())
                                <span>{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($posts->currentPage() < $posts->lastPage() - 2)
                            <span>...</span>
                        @endif

                        @if ($posts->currentPage() === $posts->lastPage())
                            <span>{{ $posts->lastPage() }}</span>
                        @else
                            <a href="{{ $posts->nextPageUrl() }}">{{ $posts->lastPage() }}</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection









