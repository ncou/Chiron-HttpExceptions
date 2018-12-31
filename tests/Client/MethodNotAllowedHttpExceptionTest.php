<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\MethodNotAllowedHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class MethodNotAllowedHttpExceptionTest extends HttpExceptionTestCase
{
    public function testHeadersDefaultAllow()
    {
        $exception = new MethodNotAllowedHttpException(['GET', 'PUT']);
        $this->assertSame(['Allow' => 'GET, PUT'], $exception->getHeaders());
    }

    protected function createException()
    {
        return new MethodNotAllowedHttpException();
    }
}
