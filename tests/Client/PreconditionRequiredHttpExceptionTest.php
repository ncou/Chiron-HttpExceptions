<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\PreconditionRequiredHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class PreconditionRequiredHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new PreconditionRequiredHttpException();
    }
}
