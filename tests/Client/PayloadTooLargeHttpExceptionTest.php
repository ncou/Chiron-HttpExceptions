<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\PayloadTooLargeHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class PayloadTooLargeHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new PayloadTooLargeHttpException();
    }
}
