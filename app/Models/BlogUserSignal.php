<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUserSignal extends Model
{
    use HasFactory;

    protected $table = "user_signals";
    protected $connection="mysql2";

    public function signaledUser(){
        return $this->belongsTo(BlogUser::class,"signaled_id");
    }

    public function signalerUser() {
        return $this->belongsTo(BlogUser::class,"user_id");
    }

    public function context(){
      return $this->morphTo();
    }    

}
