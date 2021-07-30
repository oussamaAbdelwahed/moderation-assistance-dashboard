<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\Services\BlogUserService;

class ProfileStatsController extends Controller
{

    protected $blogUserService;

    public function __construct(BlogUserService $blogUserService){
        $this->middleware("auth");
        $this->blogUserService = $blogUserService;
    }

    public function getLast5SignaledProfiles(Request $req){
      return view("profile.signaled_profiles")
      ->with("data",$this->blogUserService->getLastNSignaledBlogUsers()->cursorPaginate(10));
    }

    public function getBlacklistedProfiles(Request $req){
      $threshold = 1;
      $from_date = '1970-01-01';
      $to_date = now()->format('Y-m-d');

      $req->validate([
        'threshold' => 'sometimes|nullable|numeric',
        'from-date' => 'sometimes|nullable|date_format:Y-m-d',
        'to-date' => 'sometimes|nullable|date_format:Y-m-d'
      ]);

      
      if($req->has("threshold") || $req->has("from-date") || $req->has("to-date")) {
           $threshold = $req->query('threshold') ?? 5;
           $from_date = !empty($req->query('from-date')) ? $req->query('from-date') : $from_date;
           $to_date = !empty($req->query('to-date')) ? $req->query('to-date') : $to_date;
      }

      $data = $this->blogUserService->getBlacklistedProfiles($threshold,$from_date,$to_date)->cursorPaginate(10);
      
      return view("profile.blacklisted_profiles")
              ->with("data",$data);
    }
}
