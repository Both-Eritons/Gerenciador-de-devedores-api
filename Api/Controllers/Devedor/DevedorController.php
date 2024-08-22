<?php

namespace Api\Controllers\Devedor;

use Api\Repositories\Devedor\DevedorRepository;
use Api\Services\Devedor\DevedorService;
use App\Exception\Devedor\DevedorNotFound;
use App\Helper\Response;
use Psr\Http\Message\ResponseInterface as Res;
use Slim\Psr7\Request as Req;

class DevedorController {

  private DevedorService $devedor;
  function __construct() {
    $this->devedor = new DevedorService(new DevedorRepository());
  }

  function getDevedorById(Req $req, Res $res, array $args): Res {
    try {

      $id = (int) $args["id"];
      $devedor = $this->devedor->getDevedorById($id);
      return Response::json($res, "Usuario Encontrado", 200);

    } catch (DevedorNotFound $e) {
      return Response::json($res, $e->getMessage(), $e->getCode());
    }
  }
}
