<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RecentStatsRepository {

    public function getLast2DaysStats($start_date,$end_date){
        //yesterday and today stats
       $sqlQuery = Config::get('statistics_queries.GET_LAST2DAYS_COUNTS_QUERY');

       $sqlQuery = str_replace(":start_date", $start_date, $sqlQuery);
       $sqlQuery = str_replace(":end_date", $end_date, $sqlQuery);
       
       $sqlQuery = str_replace("\n", "", $sqlQuery);
       $sqlQuery = str_replace("\r", "", $sqlQuery);
       $sqlQuery = str_replace("\t", "", $sqlQuery);
       $sqlQuery = trim($sqlQuery);

       
       return DB::connection("mysql2")->select($sqlQuery);
    }

}