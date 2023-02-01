<div class="col-12 col-lg-3">
    <aside class="sidebar mb-5 mb-lg-0">
        <!-- Single Widget -->
        <div class="single-widget">
            <!-- Search Widget -->
            <div class="widget-content search-widget">
                <form action="{{ route('posts.index') }}">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Enter your keywords">
                </form>
            </div>
        </div>
        <!-- Single Widget -->
    <x-categories />
        <!-- Single Widget -->
    <x-most-viewed-posts />
        <!-- Single Widget -->
        <div class="single-widget">
            <!-- Tags Widget -->
            <x-tags />
        </div>
    </aside>
</div>
