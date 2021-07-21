<?php

namespace App\Http\Controllers;

use App\Services\RecentStatsService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     protected $recentStatsService;

    public function __construct(RecentStatsService $recentStatsService){
        $this->recentStatsService = $recentStatsService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard')
          ->with("stats",$this->recentStatsService->getLast2DaysStats());
    }
}
