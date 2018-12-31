<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class RequestTimeoutHttpException extends HttpException
{
    private const STATUS_CODE = 408;
    private const TITLE = 'Request Timeout';
    private const DETAIL = 'The server did not receive a complete request message in time.';
    private const TYPE_URI = 'https://httpstatuses.com/408';

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
