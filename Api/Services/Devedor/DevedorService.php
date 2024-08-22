<?php

namespace Api\Services\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use DevedorRepository;

class DevedorService {

  private DevedorRepository $repo;
  function __construct(DevedorRepository $devRepo)
  {
    $this->repo = $devRepo;
  }

  function getDevedorById(int $id): DevedorEntity|null {

    $devedor = $this->repo->getDevedorById($id);

    return $devedor ?? null;
  }

}
