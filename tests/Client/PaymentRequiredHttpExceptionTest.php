<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\PaymentRequiredHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class PaymentRequiredHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new PaymentRequiredHttpException();
    }
}
