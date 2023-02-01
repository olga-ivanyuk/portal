<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $posts = Post::with('category', 'user')
            ->search($search)
            ->hasCategory($request->category)
            ->hasAuthor($request->author)
            ->hasTag($request->tag)
            ->paginate(8);

        return view('posts.index', compact(['posts', 'search']));
    }

    public function show(Post $post)
    {
        $post = Post::where('id', $post->id)->with('tags', 'comments.user:id,name', 'user.readers')
            ->withCount(['likes as trueLikes' => function ($query) {
                $query->where('reaction', 1);
            },
                'likes as falseLikes' => function ($query) {
                    $query->where('reaction', 0);
                }
            ])->first();
        $post->incrementViews();
        $reaction = $post->getReaction();
//        dd('555');
        return view('posts.show', compact(['post', 'reaction']));
    }

    public function create()
    {
        $tags = Tag::all();
        $post = new Post();
        return view('posts.create', compact(['post']));
    }

    public function store(StorePostRequest $request)
    {
        Log::info('Enter to Post Store');
        $post = Post::create($request->validated());
        $post->uploadImage($request->file('image'));

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $post = Post::where('id', $post->id)->with('tags')->first();
        return view('posts.edit', compact(['post']));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->validated());
        $post->uploadImage($request->file('image'));

        $post->tags()->detach();
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }


        return to_route('posts.show', compact(['post']));
    }

    public function destroy(Post $post)
    {
        $post->deleteImageFolder();
        $post->delete();
        return to_route('posts.index');
    }
}
