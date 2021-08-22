<?php

namespace App\Http\Controllers;

use App\Services\Last7DaysStatsService;
use Illuminate\Http\Request;

class AjaxDashboardChartStatsController extends Controller
{
    protected $last7DaysStatsService;

    public function __construct(Last7DaysStatsService $last7DaysStatsService){
        $this->last7DaysStatsService = $last7DaysStatsService;
        $this->middleware('auth');
    }

    //initDashboardPageCharts G1
    public function getAllChartsStatsForGroup1(Request $request) {
      //if($request->ajax()){
        return json_encode($this->last7DaysStatsService->getGroup1Last7DaysStats($request->query("offset")));
      //}
    }


    public function getAllChartsStatsForGroup2(Request $request) {
      //if($request->ajax()){
         $tab  = $this->last7DaysStatsService->getGroup2Last7DaysStats($request->query("offset"));
         if(is_array($tab) && !empty($tab)){
            $tab = (array)$tab[0];
            arsort($tab);
         }
      //}
        return json_encode($tab);
    }

    public function getPerDayAllPieChartsStatsForGroup2(Request $request) {
      //if($request->ajax()){
        $tab = $this->last7DaysStatsService->getGroup2PerDayLast7DaysStats($request->query("offset")); 
        if(is_array($tab) && !empty($tab)){
          $tab = (array)$tab[0];
          arsort($tab);
        }
        return json_encode($tab);
      //}
    }

    public function getLastSignaledPostsAndProfilesAndCommentsGroup3Stats(Request $req) {
      //if($request->ajax()){
        return json_encode($this->last7DaysStatsService->getLastNSignaledPostsAndProfilesAndComments($req->query("n") ?? 5));
      //} 
   }
}
