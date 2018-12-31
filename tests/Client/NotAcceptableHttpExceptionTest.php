<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\NotAcceptableHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class NotAcceptableHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new NotAcceptableHttpException();
    }
}
