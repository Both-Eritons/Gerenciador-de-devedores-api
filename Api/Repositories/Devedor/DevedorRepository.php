<?php

namespace Api\Repositories\Devedor;

use Api\Entities\Devedor\DevedorEntity;
use Api\Models\Devedor\DevedorModel;
use App\Database\Mysql;
use App\Interface\Repository\RepositoryInterface as IRepo;

class DevedorRepository implements IRepo {
  private string $table = " devedores ";
  private string $model = "Api\Models\Devedor\DevedorModel";
  private Mysql $sql;

  function __construct() {
    $this->sql = Mysql::getInstance();
  }

  function getDevedorById(int $id): ?DevedorEntity {
    $qr = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->sql->prepare($qr);
    $stmt->execute([":id"=> $id]);

    $row = $stmt->fetchObject($this->model);

    if($row) return new DevedorEntity($row);
    return null;
  }

  function getDevedorByNome(string $nome) {
    $qr = "SELECT * FROM $this->table WHERE nome = :nome";
    $stmt = $this->sql->prepare($qr);
    $stmt->execute([":nome"=> $nome]);

    $row = $stmt->fetchObject($this->model);

    if($row) return new DevedorEntity($row);
    return null;

  }

  function createDevedor(DevedorModel $devedor): ?DevedorEntity{
    $qr = "INSERT INTO $this->table(nome, email,telefone, apelido) VALUES(:nome, :email,:telefone, :apelido)";
    $stmt = $this->sql->prepare($qr);
    $stmt->bindParam(":nome", $devedor->nome);
    $stmt->bindParam(":email", $devedor->email);
    $stmt->bindParam(":telefone", $devedor->telefone);
    $stmt->bindParam(":apelido", $devedor->apelido);
    
    if($stmt->execute()) {
      $row = $this->getDevedorById($this->sql->lastInsertId())->toModel();
    }
    if($row) return new DevedorEntity($row);
    return null;
  }

}
