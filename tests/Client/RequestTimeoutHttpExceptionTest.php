<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\RequestTimeoutHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class RequestTimeoutHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new RequestTimeoutHttpException();
    }
}
