<?php

namespace Api\Services\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use App\Exception\Devedor\DevedorNotFound;
use DevedorRepository;

class DevedorService {

  private DevedorRepository $repo;
  function __construct(DevedorRepository $devRepo)
  {
    $this->repo = $devRepo;
  }

  function getDevedorById(int $id): DevedorEntity|DevedorNotFound {

    $devedor = $this->repo->getDevedorById($id);

    return $devedor ?? throw new DevedorNotFound;
  }

}
