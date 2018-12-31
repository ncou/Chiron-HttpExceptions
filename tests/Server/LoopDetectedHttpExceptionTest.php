<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\LoopDetectedHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class LoopDetectedHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new  LoopDetectedHttpException();
    }
}
