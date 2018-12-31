<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\NotFoundHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class NotFoundHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new NotFoundHttpException();
    }
}
