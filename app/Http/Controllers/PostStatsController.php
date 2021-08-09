<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\Post;
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
}
