<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\ProxyAuthenticationRequiredHttpException;
use Chiron\Http\Exception\HttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class ProxyAuthenticationRequiredHttpExceptionTest extends AbstractTestCase
{
    public function testHeadersDefault(): void
    {
        $exception = new ProxyAuthenticationRequiredHttpException('Challenge');
        $this->assertSame(['Proxy-Authenticate' => 'Challenge'], $exception->getHeaders());
    }

    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new ProxyAuthenticationRequiredHttpException('Challenge', $message, $previous, $code, $headers);
    }
}
