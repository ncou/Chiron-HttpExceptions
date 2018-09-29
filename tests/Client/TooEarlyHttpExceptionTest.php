<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\TooEarlyHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTest;

class TooEarlyHttpExceptionTest extends HttpExceptionTest
{
    protected function createException()
    {
        return new TooEarlyHttpException();
    }
}
