<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = "mysql2";
    public $timestamps = false;
    use HasFactory;

    public function user(){
        return $this->belongsTo(BlogUser::class,"user_id");
    }

    public function post() {
        return $this->belongsTo(Post::class,"post_id");

    }

    public function signalers() {
        return $this->belongsToMany(
            BlogUser::class,
            "comment_signals",
            "comment_id",
            "user_id"
        )->withPivot("created_at");
    }

    //for polymorphic relationship
    public function getSignalsWhenIamAContextOfAUserSignal(){
        return $this->morphMany(BlogUserSignal::class, 'context');
    }

}
