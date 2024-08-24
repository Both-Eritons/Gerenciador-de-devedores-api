<?php

namespace Api\Models\Devedor;

use DateTime;

class DevedorModel
{
  public ?int $id = null;
  public ?string $nome;
  public ?string $email = null;
  public ?string $telefone = null;
  public ?string $apelido = null;
  public ?DateTime $dataRegistro = null;
}
