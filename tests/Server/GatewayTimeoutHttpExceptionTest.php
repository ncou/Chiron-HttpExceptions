<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\GatewayTimeoutHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class GatewayTimeoutHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new GatewayTimeoutHttpException();
    }
}
