<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class BadRequestHttpException extends HttpException
{
    public function __construct(string $message = '', ?\Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct(400, $message, $previous, $headers, $code);
    }
}
