<?php

namespace App\Exception\Devedor;

use Exception;

class DevedorNotFound extends Exception{

  function __construct()
  {
    parent::__construct("Devedor não foi Encontrado!", 404);
  }
}
