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

    //initDashboardPageCharts
    public function getAllChartsStatsForGroup1(Request $request) {
      if($request->ajax()){
         return json_encode($this->last7DaysStatsService->getGroup1Last7DaysStats());
      }else{
         return dd(json_encode($this->last7DaysStatsService->getGroup1Last7DaysStats()));
      }
    }
}
