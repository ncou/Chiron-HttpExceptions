<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\LengthRequiredHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class LengthRequiredHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new LengthRequiredHttpException();
    }
}
