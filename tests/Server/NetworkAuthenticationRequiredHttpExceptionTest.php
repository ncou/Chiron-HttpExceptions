<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\NetworkAuthenticationRequiredHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class NetworkAuthenticationRequiredHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new NetworkAuthenticationRequiredHttpException();
    }
}
