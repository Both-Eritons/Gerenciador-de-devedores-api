<?php

namespace App\Exception\Devedor;

use Exception;

class DevedorException extends Exception
{

  function __construct(string $msg = 'Ocorreu Algum Erro na criação do Devedor', int $code = 400, mixed $prev = null)
  {
    parent::__construct($msg, $code, $prev);
  }
}
