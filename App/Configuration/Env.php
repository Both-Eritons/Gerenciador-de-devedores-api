<?php

namespace App\Configuration;

use Symfony;


class Env {

  private array $env;
  function initial(): void {
    $this->eenv = array();
  }

  function getEnv(?string $key = null) {
    if(!$key) return $this->env;
  }
}
