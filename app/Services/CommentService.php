<?php
namespace App\Services;

use App\Repositories\CommentRepository;


class CommentService {
  protected $commentRepo;
  public function __construct(CommentRepository $commentRepo){
    $this->commentRepo = $commentRepo;
  } 

  public function getLastNSignaledComments(int $n= 5) {
    return $this->commentRepo->getLastNSignaledComments();
  }
  
}