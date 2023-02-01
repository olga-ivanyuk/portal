<div class="col-12 col-md-6">
    <!-- Single Blog -->
    <div class="single-blog res-margin">
        <!-- Blog Thumb -->
        <div class="blog-thumb">
            <a href="{{ route('posts.show', compact (['post'])) }}">
                <img src="{{ $post->image }}" alt=""></a>
        </div>
        <!-- Blog Content -->
        <div class="blog-content">
            <!-- Meta Info -->
            <ul class="meta-info d-flex justify-content-between">
                <li>By <a href="#">{{ $post->user->name }}</a></li>
                <li><a href="#">{{$post->created_at->diffForHumans()}}</a></li>
            </ul>
            <ul class="meta-info d-flex justify-content-between">
                <li><a href="#">{{ $post->category->title }}</a></li>
                <li><b>Views: </b>{{ $post->views }}</li>
            </ul>
            <!-- Blog Title -->
            <h3 class="blog-title my-3"><a href="{{ route('posts.show', compact (['post'])) }}"
                >{{ $post->title }}</a></h3>
            <p>{{ $post->description }}</p>
            <a href="{{ route('posts.show', compact (['post'])) }}" class="blog-btn mt-3">Read More</a>
        </div>
    </div>
</div>
