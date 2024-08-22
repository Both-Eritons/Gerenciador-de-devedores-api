<?php

namespace Api\Services\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use Api\Repositories\Devedor\DevedorRepository;
use App\Exception\Devedor\DevedorNotFound;

class DevedorService {

  private DevedorRepository $repo;
  function __construct(DevedorRepository $devRepo)
  {
    $this->repo = $devRepo;
  }

  function getDevedorById(int $id): DevedorEntity {

    $devedor = $this->repo->getDevedorById($id);

    return $devedor ?? throw new DevedorNotFound;
  }

}
