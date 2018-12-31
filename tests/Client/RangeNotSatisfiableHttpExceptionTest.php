<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\RangeNotSatisfiableHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class RangeNotSatisfiableHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new RangeNotSatisfiableHttpException();
    }
}
