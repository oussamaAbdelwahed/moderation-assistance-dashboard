<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $connection = "mysql2";

    public $timestamps = false;

    use HasFactory;

    public function postedBy() {
      return $this->belongsTo(BlogUser::class,"user_id");
    }

    public function comments() {
        return $this->hasMany(
            Comment::class,
            "post_id",
            "id"
        );
    }

    public function votes() {
        return $this->hasMany(
            WeightVote::class,
            "post_id",
            "id"
        ); 
    }

    public function topics() {
        return $this->belongsToMany(
            Topic::class,
            "post_topic",
            "post_id",
            "topic_id"
        );
    }

    public function signalers() {
        return $this->belongsToMany(
            BlogUser::class,
            "post_signals",
            "post_id",
            "user_id"
        )->withPivot("created_at");
    }




    // public function usersSignals(){
    //     return $this->belongsToMany(
    //         Post::class,
    //         "post_signals",
    //         "post_id",
    //         "user_id"
    //     );
    // }
}
