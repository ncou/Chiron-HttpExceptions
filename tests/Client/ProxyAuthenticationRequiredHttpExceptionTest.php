<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\ProxyAuthenticationRequiredHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class ProxyAuthenticationRequiredHttpExceptionTest extends HttpExceptionTestCase
{
    protected $defaultHeaders = ['Proxy-Authenticate' => 'Challenge'];

    protected function createException()
    {
        return new ProxyAuthenticationRequiredHttpException('Challenge');
    }
}
