
<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $post->featured_image_url }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 200) }}</p>
                    <p class="card-text">Published by {{ $post->author_name }} on </p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- {{ $post->created_at->format('F j, Y') }} --}}

{{ $posts->links() }}
