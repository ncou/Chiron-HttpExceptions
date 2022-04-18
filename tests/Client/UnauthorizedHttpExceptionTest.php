<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UnauthorizedHttpException;
use Chiron\Http\Exception\HttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class UnauthorizedHttpExceptionTest extends AbstractTestCase
{
    public function testHeadersDefault(): void
    {
        $exception = new UnauthorizedHttpException('Challenge');
        $this->assertSame(['WWW-Authenticate' => 'Challenge'], $exception->getHeaders());
    }

    public function testWithHeaderConstruct(): void
    {
        $headers = [
            'Cache-Control' => 'public, s-maxage=1200',
        ];

        $exception = new UnauthorizedHttpException('Challenge', '', null, 0, $headers);

        $headers['WWW-Authenticate'] = 'Challenge';

        $this->assertSame($headers, $exception->getHeaders());
    }

    /**
     * @dataProvider headerDataProvider
     *
     * @param array<string, string|string[]> $headers
     */
    public function testHeadersSetter($headers): void
    {
        $exception = new UnauthorizedHttpException('Challenge');
        $exception->setHeaders($headers);
        $this->assertSame($headers, $exception->getHeaders());
    }

    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new UnauthorizedHttpException('Challenge', $message, $previous, $code, $headers);
    }
}
