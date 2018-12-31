<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UnsupportedMediaTypeHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class UnsupportedMediaTypeHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new UnsupportedMediaTypeHttpException();
    }
}
