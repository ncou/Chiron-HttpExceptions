<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\InternalServerErrorHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class InternalServerErrorHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new InternalServerErrorHttpException();
    }
}
