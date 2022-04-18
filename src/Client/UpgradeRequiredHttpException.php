<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class UpgradeRequiredHttpException extends HttpException
{
    /**
     * @param array<string> $upgrade An array of required protocol(s)
     *
     * @see https://datatracker.ietf.org/doc/html/rfc7231#section-6.5.15
     * @see https://datatracker.ietf.org/doc/html/rfc7230#section-6.7
     */
    public function __construct(array $upgrade, string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
    {
        $headers['Upgrade'] = implode(', ', $upgrade);

        parent::__construct(426, $message, $previous, $headers, $code);
    }
}
