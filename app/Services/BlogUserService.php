<?php
namespace App\Services;
use App\Repositories\BlogUserRepository;

class BlogUserService  {
    protected $blogUserRepo;

    public function __construct(BlogUserRepository $blogUserRepo){
       $this->blogUserRepo =  $blogUserRepo;
    }

    public function getLastNSignaledBlogUsers(int $n) {
      return $this->blogUserRepo->getLastNSignaledBlogUsers($n);
    }
}