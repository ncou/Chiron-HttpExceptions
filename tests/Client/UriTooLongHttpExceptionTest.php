<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UriTooLongHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTest;

class UriTooLongHttpExceptionTest extends HttpExceptionTest
{
    protected function createException()
    {
        return new UriTooLongHttpException();
    }
}
