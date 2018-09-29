<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class UpgradeRequiredHttpException extends HttpException
{
    public function __construct(string $upgrade, string $message = 'Upgrade Required', \Throwable $previous = null, array $headers = [])
    {
        $headers['Upgrade'] = $upgrade;

        parent::__construct(426, $message, $previous, $headers);
    }
}
