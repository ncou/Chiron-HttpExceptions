<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;

class InsufficientStorageHttpException extends HttpException
{
    private const STATUS_CODE = 507;
    private const TITLE = 'Insufficient Storage';
    private const DETAIL = 'The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request. There is insufficient free space left in your storage allocation.';
    private const TYPE_URI = 'https://httpstatuses.com/507';

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
