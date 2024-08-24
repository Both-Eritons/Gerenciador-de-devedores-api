<?php

namespace Api\Controllers\Devedor;

use Api\Actions\Devedor\CreateDevedorAction as DevedorCreateDevedorAction;
use Api\Actions\Devedor\FindDevedorByIdAction;
use Api\Actions\Devedor\FindDevedorByNomeAction;
use Api\Models\Devedor\DevedorModel;
use Api\Repositories\Devedor\DevedorRepository;
use App\Constant\Devedor\Messages as MSG;
use App\Constant\Http\Code;
use App\Exception\Devedor\DevedorException;
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

      return Response::json($res, "Usuario Encontrado", Code::OK, $dev);

    } catch (DevedorNotFound $e) {
      return Response::json($res, $e->getMessage(), $e->getCode());
    }
  }

  function getDevedorByNome(Req $req, Res $res, array $args): Res {
    try {

      $id = (string) $args["nome"];

      $devedor = new FindDevedorByNomeAction($this->repo);
      $dev = $devedor->execute($id)->toArray();

      return Response::json($res, "Usuario Encontrado", Code::OK, $dev);

    } catch (DevedorNotFound $e) {
      return Response::json($res, $e->getMessage(), $e->getCode());
    }
  }


  function createDevedor(Req $req, Res $res): Res {
    try {
      $body = $req->getBody();
      $body = json_decode($body);

      $devedor = new DevedorCreateDevedorAction($this->repo);

      $model = new DevedorModel();
      $model->nome = $body?->nome;
      $model->apelido = $body?->apelido;
      $model->email = $body?->email;
      $model->telefone = $body?->telefone;

      $re = $devedor->execute($model)->toArray();

      return Response::json($res, MSG::CREATE_SUCCESS, Code::CREATED,$re);
    } catch (DevedorException $e) {
      return Response::json($res, $e->getMessage(), $e->getCode());
    }
  }
}
