<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentStatsController extends Controller
{
    public function show($id){
        return view("comment.show_one")
              ->with("comment",Comment::find($id));
    }
}
