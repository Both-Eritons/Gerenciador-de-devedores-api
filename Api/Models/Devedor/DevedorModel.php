<?php

namespace Api\Models\Devedor;

use DateTime;

class DevedorModel {
  public ?int $id = null;
  public string $nome;
  public ?string $email;
  public ?string $telefone;
  public ?string $apelido;
  public ?DateTime $dataRegistro;
}
