<?php

declare(strict_types=1);

namespace Chiron\Tests\Http\Exception\Client;

use Chiron\Http\Exception\Client\ConflictHttpException;
use Chiron\Tests\Http\Exception\HttpExceptionTestCase;

class ConflictHttpExceptionTest extends HttpExceptionTestCase
{
    protected function createException()
    {
        return new ConflictHttpException();
    }
}
