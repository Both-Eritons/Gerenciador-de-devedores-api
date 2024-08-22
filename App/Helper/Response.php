<?php

namespace App\Helper;

use DateTime;
use DateTimeZone;
use Psr\Http\Message\ResponseInterface as R;

final class Response
{

  static private ?array $arr;
  private function __construct() {}

  static function json(R $res, string $msg = '', int $code = 200, ?array $more = null): R
  {

    $zone = new DateTimeZone('America/Sao_Paulo');
    $zone = new DateTime('now', $zone);
    self::$arr = array(
      "message" => $msg,
      "http_code" => $code,
      "date" => $zone->format('d-m-yy h:i:s')
    );

    if (!is_null($more)) {
      self::$arr["more"] = $more;
    }

    $json = json_encode(self::$arr, JSON_PRETTY_PRINT);

    $res->getBody()->write($json);

    return $res->withStatus($code);
  }
}
