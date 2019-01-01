<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class RequestHeaderFieldsTooLargeHttpException extends HttpException
{
    private const STATUS_CODE = 431;
    private const TITLE = 'Request Header Fields Too Large';
    private const DETAIL = 'The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large.';
    private const TYPE_URI = 'https://httpstatuses.com/431';

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
        $this->detail = $detail;
        $this->title = $title;
        $this->type = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
