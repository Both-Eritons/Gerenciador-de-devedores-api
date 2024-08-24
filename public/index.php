<?php
header('Content-Type: application/json; charset=utf-8');
use App\Configuration\Slim;
use App\Routes\Api;

require "../vendor/autoload.php";

$api = new Api;
Slim::Config($api->api);
$api->run();

