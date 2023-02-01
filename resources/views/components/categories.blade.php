<div class="single-widget">
    <!-- Category Widget -->
    <div class="widget catagory-widget">
        <h5 class="text-uppercase d-block py-3">Categories</h5>
        <!-- Category Widget Content -->
        <div class="widget-content">
            <!-- Category Widget Items -->
            <ul class="widget-items">
                @foreach($categories as $cat)
                <li><a href="{{ route('posts.index', ['category' => $cat->id]) }}" class="d-flex py-3">
                        <span>{{ $cat->title }}</span><span
                            class="ml-auto">({{$cat->count}})</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
