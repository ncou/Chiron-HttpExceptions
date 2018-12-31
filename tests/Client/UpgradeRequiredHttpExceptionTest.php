<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UpgradeRequiredHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class UpgradeRequiredHttpExceptionTest extends HttpExceptionTestCase
{
    protected $defaultHeaders = ['Upgrade' => 'Upgrade-Value'];

    protected function createException()
    {
        return new UpgradeRequiredHttpException('Upgrade-Value');
    }
}
