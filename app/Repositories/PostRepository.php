<?php
namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostRepository  {

  public function getLastNSignaledPosts(int $n = 5) {
     $result = DB::connection("mysql2")->table('posts as p')
               ->select("p.*","tmpTab.last_signal_date","tmpTab.nbr_of_signals","bu.firstname  AS user_firstname",
                        "bu.lastname AS user_lastname")
               ->join(DB::connection("mysql2")->raw(
                   "(SELECT ps.post_id ,MAX(ps.created_at) AS last_signal_date, 
                   COUNT(*) AS nbr_of_signals FROM post_signals ps GROUP BY ps.post_id 
                   ORDER BY last_signal_date DESC) tmpTab "),function($join){
                           $join->on("p.id","=","tmpTab.post_id");
                }
              )->join("blog_users as bu","p.user_id","=","bu.id")
               ->orderBy("last_signal_date","desc");

    return $result;
  }

}
?> 