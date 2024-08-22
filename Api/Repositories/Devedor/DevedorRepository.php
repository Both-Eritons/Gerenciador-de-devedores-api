<?php

namespace Api\Repositories\Devedor;

use Api\Entities\Devedor\DevedorEntity;
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

}
