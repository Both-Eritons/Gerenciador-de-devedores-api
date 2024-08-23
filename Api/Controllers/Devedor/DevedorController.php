<?php

namespace Api\Controllers\Devedor;

use Api\Actions\Devedor\FindDevedorByIdAction;
use Api\Repositories\Devedor\DevedorRepository;
use Api\Services\Devedor\DevedorService;
use App\Exception\Devedor\DevedorNotFound;
use App\Helper\Response;
use Psr\Http\Message\ResponseInterface as Res;
use Slim\Psr7\Request as Req;

class DevedorController {

  private DevedorRepository $repo;
  function __construct() {
    $this->repo = new DevedorRepository();
  }

  function getDevedorById(Req $req, Res $res, array $args): Res {
    try {

      $id = (int) $args["id"];

      $devedor = new FindDevedorByIdAction($this->repo);
      $dev = $devedor->execute($id)->toArray();

      return Response::json($res, "Usuario Encontrado", 200, $dev);

    } catch (DevedorNotFound $e) {
      return Response::json($res, $e->getMessage(), $e->getCode());
    }
  }

  function createDevedor(Req $req, Res $res): Res {
    try {
      
    } catch (\Throwable $e) {
      return Response::json($res, $e->getMessage(), $e->getCode());
    }
  }
}
