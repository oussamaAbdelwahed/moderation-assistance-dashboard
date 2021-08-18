<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Last7DaysStatsRepository {
    
    public function getGroup1Last7DaysStats($start_date,$end_date){
        $sqlQuery = Config::get('statistics_queries.GET_LAST7DAYS_GROUP1_COUNTS_QUERY');

        $sqlQuery = str_replace(":start_date", $start_date, $sqlQuery);
        $sqlQuery = str_replace(":end_date", $end_date, $sqlQuery);
        
        
        $sqlQuery  = \AppHelper::instance()::cleanUpSqlQuery($sqlQuery);
        
        return DB::connection("mysql2")->select($sqlQuery);
    }


    

    public function getGroup2Last7DaysStats($start_date,$end_date){
        $sqlQuery = Config::get('statistics_queries.GET_LAST7DAYS_GROUP2_COUNTS_QUERY');

        $sqlQuery = str_replace(":start_date", $start_date, $sqlQuery);
        $sqlQuery = str_replace(":end_date", $end_date, $sqlQuery);
        
        $sqlQuery  = \AppHelper::instance()::cleanUpSqlQuery($sqlQuery);
        
        return DB::connection("mysql2")->select($sqlQuery);
    }

    public function getGroup2PerDayLast7DaysStats($search_date){
        $sqlQuery = Config::get('statistics_queries.GET_LAST7DAYS_PER_DAY_GROUP2_COUNTS_QUERY');

        $sqlQuery = str_replace(":search_date", $search_date, $sqlQuery);
        
        $sqlQuery  = \AppHelper::instance()::cleanUpSqlQuery($sqlQuery);
        
        return DB::connection("mysql2")->select($sqlQuery);      
    }






    public function getLastNSignaledPostsAndProfiles(int $n) {
        $sqlQuery = Config::get('statistics_queries.GET_LAST_N_SIGNALED_POSTS_AND_PROFILES');
        $sqlQuery = str_replace(":N", $n,$sqlQuery);
        $sqlQuery  = \AppHelper::instance()::cleanUpSqlQuery($sqlQuery);

        return DB::connection("mysql2")->select($sqlQuery);
    }

}