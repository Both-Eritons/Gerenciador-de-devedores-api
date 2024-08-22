<?php

namespace Api\Entities\Devedor;

use Api\Models\Devedor\DevedorModel;
use App\Exception\Entity\EntityPropertyNotFound;
use DateTime;

class DevedorEntity {

  private ?int $id;
  private string $nome;
  private string $email;
  private string $telefone;
  private string $apelido;
  private ?DateTime $dataRegistro;

  public function __construct(DevedorModel $devedor) {
    $this->id = $devedor->id;
    $this->nome = $devedor->nome;
    $this->email = $devedor->email;
    $this->telefone = $devedor->telefone;
    $this->apelido = $devedor->apelido;
    $this->dataRegistro = $devedor->dataRegistro;
  }

  function __get(string $name)
  {
    if(!isset($this->$name)) {
     throw new EntityPropertyNotFound();
    }
  }

  
}
