<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class BlogUserRepository {

  public function getLastNSignaledBlogUsers(int $n= 5) {
    $result = DB::connection("mysql2")->table("blog_users as bu")   
              ->select("bu.*","tmpTab.last_signal_date","tmpTab.nbr_of_signals")
              ->join(DB::connection("mysql2")->raw("
                        (SELECT us.signaled_id ,MAX(us.created_at) AS last_signal_date , 
                        COUNT(*) AS nbr_of_signals FROM user_signals us GROUP BY us.signaled_id 
                        ORDER BY last_signal_date DESC) tmpTab 
             "),function($join){
                  $join->on("bu.id","=","tmpTab.signaled_id");
              }
             )->orderBy("last_signal_date","desc");
    return $result;         
  }

  public function getBlacklistedProfiles($threshold,$from,$to){
     return DB::connection("mysql2")->table("blog_users as bu")
            ->select("bu.*",DB::connection("mysql2")->raw("COUNT(*) as nbr_of_signals"))
            ->join("user_signals as us",function($join) use($to,$from){ 
               $join->on("bu.id","=","us.signaled_id");
            })->whereDate("us.created_at",">=",$from)
              ->whereDate("us.created_at","<=",$to)
              ->groupBy("bu.id")
              ->having("nbr_of_signals",">=",$threshold)
              ->orderBy("nbr_of_signals","desc");       
  }


}