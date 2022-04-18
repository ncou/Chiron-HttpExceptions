<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\TooManyRequestsHttpException;
use Chiron\Http\Exception\HttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class TooManyRequestsHttpExceptionTest extends AbstractTestCase
{
    public function testHeadersDefaultRetryAfter(): void
    {
        $exception = new TooManyRequestsHttpException(10);
        $this->assertSame(['Retry-After' => '10'], $exception->getHeaders());
    }

    public function testWithHeaderConstruct(): void
    {
        $headers = [
            'Cache-Control' => 'public, s-maxage=69',
        ];

        $exception = new TooManyRequestsHttpException(69, '', null, 0, $headers);

        $headers['Retry-After'] = '69';

        $this->assertSame($headers, $exception->getHeaders());
    }

    /**
     * @dataProvider headerDataProvider
     *
     * @param array<string, string|string[]> $headers
     */
    public function testHeadersSetter($headers): void
    {
        $exception = new TooManyRequestsHttpException(10);
        $exception->setHeaders($headers);
        $this->assertSame($headers, $exception->getHeaders());
    }

    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new TooManyRequestsHttpException(null, $message, $previous, $code, $headers);
    }
}
