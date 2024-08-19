<?php

namespace App\Database;

use PDO;

class Mysql extends PDO{

  function __construct()
  {
    parent::__construct();
  }

}
