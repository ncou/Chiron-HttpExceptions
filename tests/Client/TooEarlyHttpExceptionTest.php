<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\TooEarlyHttpException;
use Chiron\Http\Exception\HttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class TooEarlyHttpExceptionTest extends AbstractTestCase
{
    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new TooEarlyHttpException($message, $previous, $code, $headers);
    }
}
