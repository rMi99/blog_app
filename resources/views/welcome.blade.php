@extends('layouts.frontend')

@section('content')


    
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset('images/img_1.jpg') }}');">
                    <div class="text">
                        <h2>The AI magically removes moving objects from videos.</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
                <a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{ asset('images/img_2.jpg') }}');">
                    <div class="text">
                        <h2>The AI magically removes moving objects from videos.</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="single.html" class="h-entry img-5 h-100 gradient" style="background-image: url('{{ asset('images/img_v_1.jpg') }}');">
                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-danger">Travel</span>
                            <span class="post-category bg-primary">Food</span>
                        </div>
                        <h2>The AI magically removes moving objects from videos.</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset('images/img_3.jpg') }}');">
                    <div class="text">
                        <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
                <a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{ asset('images/img_4.jpg') }}');">
                    <div class="text">
                        <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                        <span class="date">July 19, 2019</span>
                    </div>
                </a>
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
                    <a href="single.html"><img src="storage/{{{ $post->image }}}" alt="Image" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">Politics</span>
                        <h2><a href="single.html">{{ $post->title }}.</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">Published by  <a href="#">{{ $post->author_name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at }}</span>
                        </div>
                        <p>{{ Str::limit($post->content, 80) }}</p>
                        <p><a href="#">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                <div class="custom-pagination">
                    <span>1</span>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <span>...</span>
                    <a href="#">15</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
    

