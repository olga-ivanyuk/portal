<div class="single-widget">
    <!-- Post Widget -->
    <div class="widget post-widget">
        <h5 class="text-uppercase d-block py-3">Most Viewed Post</h5>
        <!-- Post Widget Content -->
        <div class="widget-content">
            <!-- Post Widget Items -->
            <ul class="widget-items">
                @foreach($posts as $post)

                <li>
                    <a href="{{ route('posts.show', compact(['post'])) }}" class="single-post media py-3">
                        <!-- Post Thumb -->
                        <div class="post-thumb avatar-lg h-100">
                            <img class="align-self-center"
                                 src="{{ $post->image }}"
                                 alt="">
                        </div>
                        <div class="post-content media-body ml-3 py-2">
                            <p class="post-date mb-2">{{ $post->created_at->format('d.m.Y') }}</p>
                            <h6>{{ $post->title }}</h6>
                            <p><b>Views: </b>{{ $post->views }}</p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
