<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;
use Chiron\Http\Exception\Server\InsufficientStorageHttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class InsufficientStorageHttpExceptionTest extends AbstractTestCase
{
    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new InsufficientStorageHttpException($message, $previous, $code, $headers);
    }
}
