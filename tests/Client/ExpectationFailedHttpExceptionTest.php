<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\ExpectationFailedHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class ExpectationFailedHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new ExpectationFailedHttpException();
    }
}
