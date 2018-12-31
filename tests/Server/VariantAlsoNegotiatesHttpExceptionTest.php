<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Server;

use Chiron\Http\Exception\Server\VariantAlsoNegotiatesHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class VariantAlsoNegotiatesHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new VariantAlsoNegotiatesHttpException();
    }
}
