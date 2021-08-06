<?php
namespace App\Services;

use App\Repositories\RecentStatsRepository;

class RecentStatsService {
    protected $recentStatsRepo;

    public function __construct(RecentStatsRepository $recentStatsRepo){
      $this->recentStatsRepo = $recentStatsRepo;
    }


    public function getLast2DaysStats() {
        $start_date = now()->subDays(1)->format('Y-m-d');
        $end_date =  now()->format('Y-m-d');
        $res =[
            "NBR_SIGNALED_POSTS" => 0,
            "NBR_SIGNALED_PROFILES" => 0,
            "NBR_CREATED_TOPICS" => 0,
            "NBR_OPENED_SESSIONS" => 0,
            "NBR_SIGNALED_COMMENTS" =>0
        ];
        $tmp = $this->recentStatsRepo->getLast2DaysStats($start_date,$end_date);
        
        if(is_array($tmp) && !empty($tmp) && is_object($tmp[0])) {
          foreach($tmp[0] as $key=>$value){
            $res[$key] = $value;
          }
        }
        return $res;
    }
}