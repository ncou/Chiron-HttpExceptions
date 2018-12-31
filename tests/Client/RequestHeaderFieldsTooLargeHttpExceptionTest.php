<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\RequestHeaderFieldsTooLargeHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class RequestHeaderFieldsTooLargeHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new RequestHeaderFieldsTooLargeHttpException();
    }
}
