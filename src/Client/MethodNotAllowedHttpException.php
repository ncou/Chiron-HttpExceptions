<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class MethodNotAllowedHttpException extends HttpException
{
    /**
     * @param string[] $allow An array of allowed methods
     *
     * @see https://datatracker.ietf.org/doc/html/rfc7231#section-6.5.5
     */
    public function __construct(array $allow, string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
    {
        $headers['Allow'] = strtoupper(implode(', ', $allow));

        parent::__construct(405, $message, $previous, $headers, $code);
    }
}
