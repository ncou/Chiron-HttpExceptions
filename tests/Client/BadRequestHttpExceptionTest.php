<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\BadRequestHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class BadRequestHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new BadRequestHttpException();
    }
}
