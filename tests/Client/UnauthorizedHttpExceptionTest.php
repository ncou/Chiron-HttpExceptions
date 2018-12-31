<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UnauthorizedHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class UnauthorizedHttpExceptionTest extends HttpExceptionTestCase
{
    protected $defaultHeaders = ['WWW-Authenticate' => 'Challenge'];

    protected function createException()
    {
        return new UnauthorizedHttpException('Challenge');
    }
}
