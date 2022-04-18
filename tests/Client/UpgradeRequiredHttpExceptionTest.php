<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UpgradeRequiredHttpException;
use Chiron\Http\Exception\HttpException;
use Chiron\Tests\Http\Exception\AbstractTestCase;

class UpgradeRequiredHttpExceptionTest extends AbstractTestCase
{
    public function testHeadersDefault(): void
    {
        $exception = new UpgradeRequiredHttpException(['Upgrade/Value']);
        $this->assertSame(['Upgrade' => 'Upgrade/Value'], $exception->getHeaders());
    }

    protected function createException(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = []): HttpException
    {
        return new UpgradeRequiredHttpException(['Upgrade/Value'], $message, $previous, $code, $headers);
    }
}
