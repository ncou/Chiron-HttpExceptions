<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception;

use Chiron\Http\Exception\HttpException;

class HttpExceptionTest extends AbstractTestCase
{
    /**
     * @dataProvider headerDataProvider
     *
     * @param array<string, string|string[]> $headers
     */
    public function testHeadersConstructor($headers): void
    {
        $exception = new HttpException(200, '', null, $headers);

        $this->assertSame($headers, $exception->getHeaders());
        $this->assertSame(200, $exception->getStatusCode());
    }

    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new HttpException(200, $message, $previous, $headers, $code);
    }
}
