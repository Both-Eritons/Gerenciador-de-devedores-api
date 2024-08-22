<?php

use Api\Entities\Devedor\DevedorEntity;
use App\Database\Mysql;
use App\Interface\Repository\RepositoryInterface as IRepo;

class DevedorRepository implements IRepo {
  private Mysql $sql;
  function __construct() {
    $this->sql = Mysql::getInstance();
  }

  function getDevedorById(int $id): DevedorEntity {
    $qr = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->sql->prepare($qr);
    $stmt->execute([":id"=> $id]);

    $row = $stmt->fetchObject($this->model);

    return new DevedorEntity($row);
  }

}
