<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;

class ServiceUnavailableHttpException extends HttpException
{
    private const STATUS_CODE = 503;
    private const TITLE = 'Service Unavailable';
    private const DETAIL = 'The server is currently unavailable. It may be overloaded or down for maintenance.';
    private const TYPE_URI = 'https://httpstatuses.com/503';

    /**
     * @param mixed $retryAfter could be an int for a number of seconds, or could be a string for an http date.
     * @param string $detail
     * @param string $title
     * @param string $type
     * @param string $instance
     */
    public function __construct($retryAfter = null, string $detail = self::DETAIL, string $title = self::TITLE, string $type = self::TYPE_URI, string $instance = '')
    {
        if ($retryAfter) {
            $this->headers['Retry-After'] = $retryAfter;
        }

        // override the protected var presents in the extended abstract classe.
        $this->statusCode = self::STATUS_CODE;
        $this->detail   = $detail;
        $this->title    = $title;
        $this->type     = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
