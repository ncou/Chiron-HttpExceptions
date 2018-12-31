<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\NotImplementedHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class NotImplementedHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new NotImplementedHttpException();
    }
}
