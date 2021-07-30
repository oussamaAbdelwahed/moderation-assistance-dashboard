<?php
namespace App\Services;
use App\Repositories\BlogUserRepository;

class BlogUserService  {
    protected $blogUserRepo;

    public function __construct(BlogUserRepository $blogUserRepo){
       $this->blogUserRepo =  $blogUserRepo;
    }

    public function getLastNSignaledBlogUsers(int $n=5) {
       return $this->blogUserRepo->getLastNSignaledBlogUsers();
    }

    public function getBlacklistedProfiles($threshold,$from,$to){
       return $this->blogUserRepo->getBlacklistedProfiles($threshold,$from,$to);
    }
}