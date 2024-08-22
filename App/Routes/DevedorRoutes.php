<?php

namespace App\Routes;

use Api\Controllers\Devedor\DevedorController;
use Slim\App;

class DevedorRoutes{

  private DevedorController $devedor;
  function __construct()
  {
    $this->devedor = new DevedorController();
  }

  function init(App $app) {
    $app->get("/api/devedor/find/id/{id}", function ($rq, $rs, $as) {
      return $this->devedor->getDevedorById($rq, $rs, $as);
    });
  }
}
