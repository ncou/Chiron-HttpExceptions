<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UnprocessableEntityHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class UnprocessableEntityHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new UnprocessableEntityHttpException();
    }
}
