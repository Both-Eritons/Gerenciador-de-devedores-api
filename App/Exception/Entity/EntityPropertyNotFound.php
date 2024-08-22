<?php

namespace App\Exception\Entity;

use Exception;

class EntityPropertyNotFound extends Exception {
  function __construct()
  {
    parent::__construct("esta propriedade nao existe", 404);
  }
}
