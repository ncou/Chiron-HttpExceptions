<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;

class ServiceUnavailableHttpException extends HttpException
{
    /**
     * @param int|string|null $retryAfter The number of seconds or HTTP-date after which the request may be retried.
     */
    public function __construct(int|string|null $retryAfter = null, string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
    {
        if ($retryAfter) {
            $headers['Retry-After'] = (string) $retryAfter;
        }

        parent::__construct(503, $message, $previous, $headers, $code);
    }
}
