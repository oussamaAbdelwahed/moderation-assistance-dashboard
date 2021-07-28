<?php

namespace App\Services;
use App\Repositories\Last7DaysStatsRepository;

class Last7DaysStatsService {

    protected $last7DaysStatsRepo;
    
    public function __construct(Last7DaysStatsRepository $last7DaysStatsRepo){
      $this->last7DaysStatsRepo = $last7DaysStatsRepo;
    }

    public function getGroup1Last7DaysStats() {
         $start_date = now()->subDays(6)->format('Y-m-d');
         $end_date = now()->format('Y-m-d');

         $results = [
            "SIGNALED_POSTS" => [],
            "SIGNALED_PROFILES" => [],
            "POSTS_WEIGHTED_OVER_THAN_100" => []
         ];
         
         foreach($results as $key=>$value){
           for($i=0;$i<7;$i++)
               $value[now()->subDays(6)->addDays($i)->format("Y-m-d")] = 0;
           
           $results[$key] = $value;
         }

        $tmp = $this->last7DaysStatsRepo->getGroup1Last7DaysStats($start_date,$end_date);

        foreach($tmp as $value){
           if($value->SET_ORDER==1){
             $results["SIGNALED_POSTS"][$value->DAY] = $value->NBR_IN_THE_DAY;
           }else if($value->SET_ORDER==2){
             $results["SIGNALED_PROFILES"][$value->DAY] = $value->NBR_IN_THE_DAY;
           }else if($value->SET_ORDER==3){
             $results["POSTS_WEIGHTED_OVER_THAN_100"][$value->DAY] +=1;
           }
        }
        return $results;
    } 

    public function getGroup2Last7DaysStats() {
      //it should be $start_date = now()->subDays(6)->format('Y-m-d'); but for testing purposes we use 9 instead of 6
      $start_date = now()->subDays(8)->format('Y-m-d');
      $end_date = now()->format('Y-m-d');

      return $this->last7DaysStatsRepo->getGroup2Last7DaysStats($start_date,$end_date);
    }

    public function getLastNSignaledPostsAndProfiles(int $n) {
       return $this->last7DaysStatsRepo->getLastNSignaledPostsAndProfiles($n);
    }

}