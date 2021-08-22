<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\Post;
use App\Models\PostSignal;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Services\PostService;

class PostStatsController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService){
        $this->middleware("auth");
        $this->postService = $postService;
    }

    public function getLast5SignaledPosts(Request $req){
      return view("post.signaled_posts")
      ->with("data",$this->postService->getLastNSignaledPosts()->cursorPaginate(10));
    }

    public function show($id){
      return view("post.show_one")->with("post",Post::with("topics")->findOrFail($id));
    }

    public function getSignalsForPost($id){    
      $signals = PostSignal::where("post_id","=",$id)->orderBy("created_at","desc")->with(["signalerUser"])->cursorPaginate(10);

      return view("post.associated_signals")
      ->with("signals",$signals)
      ->with("id",$id);
    }
}
