<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\PreconditionFailedHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class PreconditionFailedHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new PreconditionFailedHttpException();
    }
}
