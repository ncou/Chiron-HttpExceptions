<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;
use Chiron\Http\Exception\Server\NotExtendedHttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class NotExtendedHttpExceptionTest extends AbstractTestCase
{
    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new NotExtendedHttpException($message, $previous, $code, $headers);
    }
}
