<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentSignal extends Model
{
    use HasFactory;

    protected $table = "comment_signals";
    protected $connection="mysql2";


    public function signalerUser(){
        return $this->belongsTo(BlogUser::class,"user_id");
    }

    public function signaledComment() {
        return $this->belongsTo(Comment::class,"comment_id");
    }
}