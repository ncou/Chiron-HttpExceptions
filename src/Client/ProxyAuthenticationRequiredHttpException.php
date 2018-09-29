<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class ProxyAuthenticationRequiredHttpException extends HttpException
{
    public function __construct(string $challenge, string $message = 'Proxy Authentication Required', \Throwable $previous = null, array $headers = [])
    {
        $headers['Proxy-Authenticate'] = $challenge;

        parent::__construct(407, $message, $previous, $headers);
    }
}
