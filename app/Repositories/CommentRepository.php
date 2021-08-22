<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class CommentRepository {
   public function getLastNSignaledComments(int $n= 5) {
      $result = DB::connection("mysql2")->table('comments as c')
        ->select("c.*","tmpTab.last_signal_date","tmpTab.nbr_of_signals","bu.firstname  AS user_firstname",
                "bu.lastname AS user_lastname")
        ->join(DB::connection("mysql2")->raw(
            "(SELECT cs.comment_id ,MAX(cs.created_at) AS last_signal_date, 
            COUNT(*) AS nbr_of_signals FROM comment_signals cs GROUP BY cs.comment_id 
            ORDER BY last_signal_date DESC) tmpTab "),function($join){
                    $join->on("c.id","=","tmpTab.comment_id");
        }
    )->join("blog_users as bu","c.user_id","=","bu.id")
        ->orderBy("last_signal_date","desc");
    
     return $result;    
   }
}

