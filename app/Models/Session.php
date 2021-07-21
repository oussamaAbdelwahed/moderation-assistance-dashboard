<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $connection = "mysql2";
    public $timestamps = false;
    use HasFactory;


    public function user() {
        return $this->belongsTo(BlogUser::class,"user_id");
    }
}
