<?php
namespace App\Services;
use App\Repositories\PostRepository;


class PostService {
   protected $postRepository;

   public function __construct(PostRepository $postRepository){
      $this->postRepository = $postRepository;
   } 

   public function test(){
       return $this->postRepository->test()." | DI WORKS FINE WITH SERVICE";
   }


   public function getNbrSignaledPostsAndProfiles($start,$end){
        if(isset($start) && isset($end))
          return $this->postRepository->getNbrSignaledPostsAndProfiles($start,$end);
   }
   
}
?>