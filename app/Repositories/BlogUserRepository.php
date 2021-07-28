<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class BlogUserRepository {

  public function getLastNSignaledBlogUsers(int $n) {
     $sqlQuery = Config::get('statistics_queries.GET_LAST_N_SIGNALED_PROFILES');
     $sqlQuery = str_replace(":N", $n, $sqlQuery);

     $sqlQuery  = \AppHelper::instance()::cleanUpSqlQuery($sqlQuery);
     return DB::connection("mysql2")->select($sqlQuery); 
  }
}