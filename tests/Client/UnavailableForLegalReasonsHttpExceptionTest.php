<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\UnavailableForLegalReasonsHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class UnavailableForLegalReasonsHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new UnavailableForLegalReasonsHttpException();
    }
}
