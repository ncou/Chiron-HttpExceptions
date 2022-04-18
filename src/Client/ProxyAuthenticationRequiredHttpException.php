<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class ProxyAuthenticationRequiredHttpException extends HttpException
{
    /**
     * @param string $challenge Proxy-Authenticate challenge string
     *
     * @see https://datatracker.ietf.org/doc/html/rfc7235#section-3.2
     * @see https://datatracker.ietf.org/doc/html/rfc7235#section-4.4
     * @see https://datatracker.ietf.org/doc/html/rfc7235#section-4.3
     */
    public function __construct(string $challenge, string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
    {
        $headers['Proxy-Authenticate'] = $challenge;

        parent::__construct(407, $message, $previous, $headers, $code);
    }
}
