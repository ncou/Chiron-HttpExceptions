<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\BadGatewayHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class BadGatewayHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new BadGatewayHttpException();
    }
}
