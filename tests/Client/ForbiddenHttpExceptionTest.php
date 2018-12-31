<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\ForbiddenHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class ForbiddenHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new ForbiddenHttpException();
    }
}
