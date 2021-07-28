<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RecentStatsRepository {

    public function getLast2DaysStats($start_date,$end_date){
        //yesterday and today stats
       $sqlQuery = Config::get('statistics_queries.GET_LAST7DAYS_GROUP1_COUNTS_QUERY');

       $sqlQuery = str_replace(":start_date", $start_date, $sqlQuery);
       $sqlQuery = str_replace(":end_date", $end_date, $sqlQuery);

       $sqlQuery  = \AppHelper::instance()::cleanUpSqlQuery($sqlQuery);

       return DB::connection("mysql2")->select($sqlQuery);
    }

}