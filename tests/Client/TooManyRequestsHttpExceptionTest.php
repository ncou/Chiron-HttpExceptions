<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\TooManyRequestsHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class TooManyRequestsHttpExceptionTest extends HttpExceptionTestCase
{
    public function testHeadersDefaultRetryAfter()
    {
        $exception = new TooManyRequestsHttpException(10);
        $this->assertSame(['Retry-After' => 10], $exception->getHeaders());
    }

    protected function createException()
    {
        return new TooManyRequestsHttpException();
    }
}
