<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception;

use Chiron\Http\Exception\HttpException;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /**
     * @return  array<int, array<int, array<int|string, array<string, string>|string>>>
     */
    public function headerDataProvider(): array
    {
        return [
            [['X-Test' => 'Test']],
            [['X-Test' => '1']],
            [
                [
                    ['X-Test' => 'Test'],
                    ['X-Test-2' => 'Test-2'],
                ],
            ],
        ];
    }

    public function testHeadersDefault(): void
    {
        $exception = $this->createException();

        $this->assertSame([], $exception->getHeaders());
    }

    /**
     * @dataProvider headerDataProvider
     *
     * @param array<string, string|string[]> $headers
     */
    public function testHeadersSetter($headers): void
    {
        $exception = $this->createException();
        $exception->setHeaders($headers);

        $this->assertSame($headers, $exception->getHeaders());
    }

    public function testThrowableIsAllowedForPrevious(): void
    {
        $previous = new class ('Error of PHP 7+') extends \Error {
        };
        $exception = $this->createException('', $previous);

        $this->assertSame($previous, $exception->getPrevious());
    }

    /**
     * @param array<string, string|string[]> $headers
     */
    abstract protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException;
}
