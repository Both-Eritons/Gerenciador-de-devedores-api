<?php

namespace Api\Actions\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use Api\Repositories\Devedor\DevedorRepository;
use App\Exception\Devedor\DevedorNotFound;

class FindDevedorByNomeAction {

  function __construct(protected DevedorRepository $repo){}

  function execute(string $nome): DevedorEntity{
    $devedor = $this->repo->getDevedorById($nome);

    return $devedor ?? throw new DevedorNotFound();
  }
}
