<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class TooManyRequestsHttpException extends HttpException
{
    private const STATUS_CODE = 429;
    private const TITLE = 'Too Many Requests';
    private const DETAIL = 'The user has sent too many requests in a given amount of time.';
    private const TYPE_URI = 'https://httpstatuses.com/429';

    /**
     * @param mixed  $retryAfter could be an int for a number of seconds, or could be a string for an http date.
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
        $this->detail = $detail;
        $this->title = $title;
        $this->type = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
