<?php

namespace App\Database;

use App\Configuration\Env;
use PDO;
use PDOException;

class Mysql extends PDO{

  static private PDO $sql;
  function __construct()
  {
    try {
      self::$sql = parent::__construct(
        Env::getEnv("DB_CONN"),
        Env::getEnv("DB_USER"),
        Env::getEnv("DB_PASS"),
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
      ); 
    } catch(PDOException $e) {
     echo "PDO ERROR: ".$e->getMessage();
    }
  }

  static function getInstance(): PDO {
    if(!isset(self::$sql)) {
      self::$sql =  new self();
    }

    return self::$sql;
  }

}
