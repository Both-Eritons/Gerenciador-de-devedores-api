<?php

namespace Api\Controllers\Devedor;

use App\Helper\Response;
use Psr\Http\Message\ResponseInterface as Res;
use Slim\Psr7\Request as Req;

class DevedorController {

  function getDevedorById(Req $req, Res $res) {
    new Response($res, "teste");
  }
}
