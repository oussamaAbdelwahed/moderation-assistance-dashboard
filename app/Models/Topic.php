<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $connection = "mysql2";
    public $timestamps = false;
    use HasFactory;

    public function posts() {
        return $this->belongsToMany(
            Topic::class,
            "post_topic",
            "topic_id",
            "post_id",
        );
    }
}
