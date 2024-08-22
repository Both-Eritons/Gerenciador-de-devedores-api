<?php

namespace Api\Services\Devedor;

use DevedorRepository;

class DevedorService {

  private DevedorRepository $repo;
  function __construct(DevedorRepository $devRepo)
  {
    $this->repo = $devRepo;
  }



}
