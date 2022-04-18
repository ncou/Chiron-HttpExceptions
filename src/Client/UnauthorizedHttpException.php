<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class UnauthorizedHttpException extends HttpException
{
    /**
     * @param string $challenge WWW-Authenticate challenge string
     *
     * @see https://datatracker.ietf.org/doc/html/rfc7235#section-3.1
     * @see https://datatracker.ietf.org/doc/html/rfc7235#section-4.2
     * @see https://datatracker.ietf.org/doc/html/rfc7235#section-4.1
     */
    public function __construct(string $challenge, string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
    {
        $headers['WWW-Authenticate'] = $challenge;

        parent::__construct(401, $message, $previous, $headers, $code);
    }
}
