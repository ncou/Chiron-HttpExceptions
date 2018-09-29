<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\RangeNotSatisfiableHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTest;

class RangeNotSatisfiableHttpExceptionTest extends HttpExceptionTest
{
    protected function createException()
    {
        return new RangeNotSatisfiableHttpException();
    }
}
