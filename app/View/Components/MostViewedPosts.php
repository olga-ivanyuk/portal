<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class MostViewedPosts extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = Post::orderBy('views', 'desc')->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.most-viewed-posts');
    }
}
