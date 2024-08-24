<?php

namespace Api\Actions\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use Api\Models\Devedor\DevedorModel;
use Api\Repositories\Devedor\DevedorRepository;
use App\Exception\Devedor\DevedorException;

class CreateDevedorAction {

  function __construct(private DevedorRepository $repo)
  {
    
  }

  function execute(DevedorModel $params): DevedorEntity {
    if(!isset($params->nome) || strlen($params->nome) < 3)
      throw new DevedorException("o Nome DEVE ser maior que 3 letras.");

    $devedor = $this->repo->createDevedor($params);

    if(!$devedor) return throw new DevedorException();

    return new DevedorEntity($params);
  }
}
