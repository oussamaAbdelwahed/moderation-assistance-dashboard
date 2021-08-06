<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
   
    use HasFactory;

    protected $connection = "mysql2";
    
    protected $fillable = [
        'firstname',
        "lastname",
        'email',
        'birthdate',
        "created_at"
    ];

    public function myPosts(){
        return $this->hasMany(
            Post::class,
            "user_id",
            "id"
        );
    }

    public function mySessions() {

        return $this->hasMany(
            Session::class,
            "user_id",
            "id"
        );   
    }

    public function myComments() {
        return $this->hasMany(
            Comment::class,
            "user_id",
            "id"
        );   
    }

    public function myTopics(){
        return $this->hasMany(
            Topic::class,
            "created_by",
            "id"
        );   
    }

    public function myWeightVotes() {
        return $this->hasMany(
            WeightVote::class,
            "user_id",
            "id"
        );   
    }



    public function signaledPosts() {
        return $this->belongsToMany(
            Post::class,
            "post_signals",
            "user_id",
            "post_id"
        )->withPivot("created_at");;
    }

    public function signaledComments() {
        return $this->belongsToMany(
            Comment::class,
            "comment_signals",
            "user_id",
            "comment_id"
        )->withPivot("created_at");
    }

    public function lastSignaledPosts() {
        return $this->belongsToMany(
            Post::class,
            "post_signals",
            "user_id",
            "post_id"
        )->orderByPivot("id","desc");
    }



    public function usersThatISignaled() {
       return $this->belongsToMany(
           BlogUser::class,
           "user_signals",
           "user_id",
           "signaled_id"
       )->withPivot("created_at");;
    }

    public function usersThatSignaledMe() {
        return $this->belongsToMany(
            BlogUser::class,
            "user_signals",
            "signaled_id",
            "user_id"
        )->withPivot("created_at");;      
    }
}
