<?php

namespace App\Http\Controllers;
use App\Models\Comment;

class CommentStatsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function show($id){
 
        return view("comment.show_one")
              ->with("comment", Comment::findOrFail($id));
    }
}
