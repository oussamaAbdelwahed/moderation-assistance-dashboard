<?php
namespace App\Services;
use App\Repositories\PostRepository;


class PostService {
   protected $postRepo;

   public function __construct(PostRepository $postRepo){
      $this->postRepo = $postRepo;
   } 

   public function getLastNSignaledPosts(int $n= 5) {
      return $this->postRepo->getLastNSignaledPosts();
   }
}
?>