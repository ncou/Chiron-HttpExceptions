<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;

class NotExtendedHttpException extends HttpException
{
    private const STATUS_CODE = 510;
    private const TITLE = 'Not Extended';
    private const DETAIL = 'Further extensions to the request are required for the server to fulfill it. A mandatory extension policy in the request is not accepted by the server for this resource.';
    private const TYPE_URI = 'https://httpstatuses.com/510';

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
