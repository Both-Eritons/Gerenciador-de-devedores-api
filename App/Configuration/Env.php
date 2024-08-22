<?php

namespace App\Configuration;

use Symfony;

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__, 2)."/.env");

class Env {

  static private array $env;
  
  static private function initial(): void {
    self::$env = array(
        "DB_USER" => $_ENV["DB_USER"],
        "DB_PASS" => $_ENV["DB_PASS"],
        "DB_NAME" => $_ENV["DB_NAME"],
        "DB_CONN" => "mysql:host=".$_ENV["DB_HOST"].";dbname=" .
          $_ENV["DB_NAME"]
    );
  }

  static function getEnv(?string $key = null) {
    if(!isset(self::$env)) self::initial();
    if(!$key) return self::$env;
    return self::$env[$key];
  }
}
