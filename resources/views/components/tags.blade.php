<div class="widget tags-widget">
    <h5 class="text-uppercase d-block py-3">Popular Tags</h5>
    <!-- Tags Widget Content -->
    <div class="widget-content">
        <!-- Tags Widget Items -->
        <div class="widget-content tags-widget-items pt-2">
            @foreach($tags as $tag)
            <a href="{{ route('posts.index', ['tag' => $tag->id]) }}"
               class="d-inline-block mt-2 mr-1 px-2 py-1">{{ $tag->title }} ({{ $tag->postCount }})</a>
            @endforeach
        </div>
    </div>
</div>
