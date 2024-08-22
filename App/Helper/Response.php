<?php

namespace App\Helper;

use DateTime;
use DateTimeZone;
use Psr\Http\Message\ResponseInterface as R;

final class Response
{

  private ?array $arr;
  function __construct(R $res, string $msg = '', int $code = 200, ?array $more = null): R
  {
    $zone = new DateTimeZone('America/Sao_Paulo');
    $zone = new DateTime('now', $zone);
    $this->arr = array(
      "message" => $msg,
      "http_code" => $code,
      "date" => $zone->format('d-m-yy h:i:s')
    );

    if (!is_null($more)) {
      $this->arr["more"] = $more;
    }

    $json = json_encode($this->arr, JSON_PRETTY_PRINT);

    $res->getBody()->write($json);

    return $res->withStatus($code);
  }
}
