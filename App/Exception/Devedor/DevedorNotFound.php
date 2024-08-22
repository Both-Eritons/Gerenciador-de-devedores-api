<?php

namespace App\Exception\Devedor;

use Exception;

class DevedorNotFound extends Exception{

  function __construct()
  {
    parent::__construct("devedor nao foi encontrado!!!", 404);
  }
}
