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
      //here just find a way to do pagination or inside repository/service couple
      return view("profile.signaled_profiles")
      ->with("data",$this->blogUserService->getLastNSignaledBlogUsers(5));
    }
}
