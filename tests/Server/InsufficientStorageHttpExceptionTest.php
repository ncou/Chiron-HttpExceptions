<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\InsufficientStorageHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class InsufficientStorageHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new InsufficientStorageHttpException();
    }
}
