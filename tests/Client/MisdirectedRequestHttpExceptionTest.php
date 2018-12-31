<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\MisdirectedRequestHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class MisdirectedRequestHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new MisdirectedRequestHttpException();
    }
}
