<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UriTooLongHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class UriTooLongHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new UriTooLongHttpException();
    }
}
