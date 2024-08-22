<?php

use App\Configuration\Slim;
use App\Routes\Api;

require "../vendor/autoload.php";

$api = new Api;
Slim::Config($api->api);
$api->run();

