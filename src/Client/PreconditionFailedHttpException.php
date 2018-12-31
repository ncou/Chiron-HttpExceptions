<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class PreconditionFailedHttpException extends HttpException
{
    private const STATUS_CODE = 412;
    private const TITLE = 'Precondition Failed';
    private const DETAIL = 'The server does not meet one of the preconditions that the requester put on the request.';
    private const TYPE_URI = 'https://httpstatuses.com/412';

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
