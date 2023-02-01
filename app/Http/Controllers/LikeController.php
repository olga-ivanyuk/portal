<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LikeController extends Controller
{
    public function reaction(Request $request)
    {
        $reaction = DB::table('likes')
            ->where('post_id', $request->postId)
            ->where('user_id', auth()->id())->first();

        if ($reaction) {
            if ($reaction->reaction==1) {
                if ($request->reaction) {
                    $this->removeReaction($request->postId);
                } else {
                    $this->removeReaction($request->postId);
                    $this->setDisLike($request->postId);
                }
            }

            if ($reaction->reaction==0) {
                if ($request->reaction) {
                    $this->removeReaction($request->postId);
                    $this->setLike($request->postId);
                } else {
                    $this->removeReaction($request->postId);
                }
            }
        } else {
            if ($request->reaction) {
                $this->setLike($request->postId);
            } else {
                $this->setDisLike($request->postId);
            }
        }
//        $objects = DB::table('likes')
//            ->where('post_id', $request->postId)->get();
//        foreach ($objects as $it){
//            if($it->reaction==1){
//                $like++;
//            }elseif ($it->reaction==0){
//                $dislike++;
//            }
        }
//        echo json_encode(['count_like'=>$like, 'count_dislike'=>$dislike]);
//        dump($like);
//        dd($dislike);
//        return [
//            'post_id' => $request->postId,
//            'reaction' => $request->reaction,
//            'count_like' => $like,
//            'count_dislike' => $dislike
//        ];
//    }

    public function setLike($postId)
    {
        DB::table('likes')->insert([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'reaction' => 1
        ]);
    }

    public function setDisLike($postId)
    {
        DB::table('likes')->insert([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'reaction' => 0
        ]);
    }

    private function removeReaction($postId)
    {
        DB::table('likes')
            ->where('post_id', $postId)
            ->where('user_id', auth()->id())->delete();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLikeRequest  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
