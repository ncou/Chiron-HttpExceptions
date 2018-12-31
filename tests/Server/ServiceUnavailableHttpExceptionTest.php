<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\ServiceUnavailableHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class ServiceUnavailableHttpExceptionTest extends HttpExceptionTestCase
{
    public function testHeadersDefaultRetryAfter()
    {
        $exception = new ServiceUnavailableHttpException(10);
        $this->assertSame(['Retry-After' => 10], $exception->getHeaders());
    }

    protected function createException()
    {
        return new ServiceUnavailableHttpException();
    }
}
