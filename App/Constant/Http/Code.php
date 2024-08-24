<?php

namespace App\Constant\Http;

class Code {
  const int OK = 200,
    CREATED = 201,
    ACCEPTED = 202,
    BAD = 400,
    UNAUTHORIZED = 401,
    PAYMENT_REQUIRED= 402,
    FORBIDDEN = 403,
    NOT_FOUND = 404,
    SERVER_ERROR = 500,
    SERVICE_UNAVAILABLE = 503;
}
