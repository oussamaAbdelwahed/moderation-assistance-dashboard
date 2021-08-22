<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\CommentSignal;
use App\Services\CommentService;

class CommentStatsController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService){
        $this->commentService = $commentService;
        $this->middleware("auth");
    }

    public function show($id){
 
        return view("comment.show_one")
              ->with("comment", Comment::findOrFail($id));
    }

    public function getLast5SignaledComments(){
        return view("comment.signaled_comments")
        ->with("data",$this->commentService->getLastNSignaledComments()->cursorPaginate(10));
    }

    public function getSignalsForComment($id){    
        $signals = CommentSignal::where("comment_id","=",$id)->orderBy("created_at","desc")->with(["signalerUser"])->cursorPaginate(10);
  
        return view("comment.associated_signals")
        ->with("signals",$signals)
        ->with("id",$id);
    }
}
