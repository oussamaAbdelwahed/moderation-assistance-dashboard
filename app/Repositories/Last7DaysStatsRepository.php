<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Last7DaysStatsRepository {
    
    public function getGroup1Last7DaysStats($start_date,$end_date){
        $sqlQuery = Config::get('statistics_queries.GET_LAST7DAYS_COUNTS_QUERY');

        $sqlQuery = str_replace(":start_date", $start_date, $sqlQuery);
        $sqlQuery = str_replace(":end_date", $end_date, $sqlQuery);
        
        $sqlQuery = str_replace("\n", "", $sqlQuery);
        $sqlQuery = str_replace("\r", "", $sqlQuery);
        $sqlQuery = str_replace("\t", "", $sqlQuery);
        $sqlQuery = trim($sqlQuery);
        
        return DB::connection("mysql2")->select($sqlQuery);
    }

}