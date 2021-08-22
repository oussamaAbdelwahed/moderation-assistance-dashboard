<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSignal extends Model
{
    use HasFactory;

    protected $table = "post_signals";
    protected $connection="mysql2";

    public function signalerUser(){
        return $this->belongsTo(BlogUser::class,"user_id");
    }

    public function signaledPost() {
        return $this->belongsTo(Post::class,"post_id");
    }
}