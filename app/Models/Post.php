<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'description', 'content', 'image', 'category_id', 'user_id'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withPivot('reaction');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->whereNull('comment_id')->with('comments.user:id,name');
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function uploadImage($image)
    {
        if ($image) {
            $this->deleteImageFolder();
            $folder = "posts/$this->id";
            $ext = $image->getClientOriginalExtension();
            $filename = rand(111111, 999999) . '.' . $ext;
            Storage::disk('public')->putFileAs($folder, $image, $filename);
            $this->update(['image' => asset("storage/$folder/$filename")]);
        }
    }

    public function deleteImageFolder()
    {
        Storage::disk('public')->deleteDirectory("posts/$this->id");
    }

    public function isSubscribe()
    {
        return $this->user->readers->contains(auth()->user());
    }

    public function scopeSearch($query, $search)
    {
        $query->when($search, function ($query, $search) {
            $searchArray = explode(' ', $search);
            foreach ($searchArray as $word) {
                $query->where('title', 'like', "%$word%")
                    ->orWhere('description', 'like', "%$word%");
            }
        });
    }

    public function scopeHasCategory($query, $categoryId)
    {
        $query->when($categoryId, function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        });
    }

    public function scopeHasAuthor($query, $authorId)
    {
        $query->when($authorId, function ($query, $authorId) {
            $query->where('user_id', $authorId);
        });
    }

    public function scopeHasTag($query, $tagId)
    {
        $query->when($tagId, function ($query) use ($tagId) {
            $query->whereHas('tags', function ($query) use ($tagId) {
                $query->where('post_tag.tag_id', $tagId);
            });
        });
    }

    public function getReaction()
    {
        $reaction = DB::table('likes')
            ->where('post_id', $this->id)
            ->where('user_id',auth()->id())
            ->first();
        return $reaction?->reaction;
    }
}
