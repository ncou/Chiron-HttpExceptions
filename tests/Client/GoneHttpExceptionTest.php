<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\GoneHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class GoneHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new GoneHttpException();
    }
}
