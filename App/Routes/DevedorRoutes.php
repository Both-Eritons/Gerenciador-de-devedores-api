<?php

namespace App\Routes;

use Api\Controllers\Devedor\DevedorController;
use Slim\App;

class DevedorRoutes
{

  private DevedorController $devedor;
  function __construct()
  {
    $this->devedor = new DevedorController();
  }

  function init(App $app)
  {

    $app->post("/api/devedor/create", function ($rq, $rs) {
      return $this->devedor->createDevedor($rq, $rs);
    });


    $app->get("/api/devedor/find/id/{id}", function ($rq, $rs, $as) {
      return $this->devedor->getDevedorById($rq, $rs, $as);
    });

    $app->get("/api/devedor/find/nome/{nome}", function ($rq, $rs, $as) {
      return $this->devedor->getDevedorByNome($rq, $rs, $as);
    });
  }
}
