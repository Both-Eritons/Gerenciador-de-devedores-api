<?php

namespace Api\Actions\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use Api\Repositories\Devedor\DevedorRepository;
use App\Exception\Devedor\DevedorNotFound;

class FindDevedorByIdAction {

  function __construct(protected DevedorRepository $repo){}

  function execute(int $id): DevedorEntity{
    $devedor = $this->repo->getDevedorById($id);

    return $devedor ?? throw new DevedorNotFound();
  }
}
