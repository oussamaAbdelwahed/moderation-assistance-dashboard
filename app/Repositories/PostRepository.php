<?php
namespace App\Repositories;
use App\Models\Post;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostRepository  {
   protected $post;

   public function __construct(Post $post){
       $this->post = $post;
   }

   public function test(){
       return "DI WORKS FINE WITH REPO";
   }

   public function getNbrSignaledPostsAndProfiles($start,$end){
       $sqlQuery = Config::get('statistics_queries.GET_COUNTS_QUERY');
       /*
          $bodytag = str_replace(":start", $start, $sqlQuery);
          $bodytag = str_replace(":end", $end, $sqlQuery);
       */
      return DB::connection("mysql2")->select($sqlQuery);
   }
   
}
?> 