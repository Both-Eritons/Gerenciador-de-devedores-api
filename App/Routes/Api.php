<?php

namespace App\Routes;

use App\Routes\DevedorRoutes;
use Slim\Factory\AppFactory;

class Api extends AppFactory {
 private $devedor;
  public $api;
  function __construct() {
    $this->api = self::create();
    $this->devedor = new DevedorRoutes();
  }

  private function routes() {
    $this->devedor->init($this->api);
  }

  function run() {
    $this->routes($this->api);

    return $this->api->run();
  }
}
