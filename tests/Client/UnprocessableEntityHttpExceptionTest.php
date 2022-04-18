<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UnprocessableEntityHttpException;
use Chiron\Http\Exception\HttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class UnprocessableEntityHttpExceptionTest extends AbstractTestCase
{
    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new UnprocessableEntityHttpException($message, $previous, $code, $headers);
    }
}
