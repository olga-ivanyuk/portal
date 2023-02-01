<?php

namespace App\View\Components;

use App\Models\Tag;
use Illuminate\View\Component;

class TagCheckboxes extends Component
{
    public $tags;
    public $currentTags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentTags)
    {
        $this->tags = Tag::all();
        $this->currentTags = $currentTags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tag-checkboxes');
    }
}

