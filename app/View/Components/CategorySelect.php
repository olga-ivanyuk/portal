<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategorySelect extends Component
{
    public $post;
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->categories = Category::all();
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-select');
    }
}
