<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class UnprocessableEntityHttpException extends HttpException
{
    private const STATUS_CODE = 422;
    private const TITLE = 'Unprocessable Entity';
    private const DETAIL = 'The request was well-formed but was unable to be followed due to semantic errors.';
    private const TYPE_URI = 'https://httpstatuses.com/422';

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
