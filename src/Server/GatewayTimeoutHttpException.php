<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;

class GatewayTimeoutHttpException extends HttpException
{
    private const STATUS_CODE = 504;
    private const TITLE = 'Gateway Timeout';
    private const DETAIL = 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.';
    private const TYPE_URI = 'https://httpstatuses.com/504';

    /**
     * @param string $detail
     * @param string $title
     * @param string $type
     * @param string $instance
     */
    public function __construct(string $detail = self::DETAIL, string $title = self::TITLE, string $type = self::TYPE_URI, string $instance = '')
    {
        // override the protected var presents in the extended abstract classe.
        $this->statusCode = self::STATUS_CODE;
        $this->detail   = $detail;
        $this->title    = $title;
        $this->type     = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
