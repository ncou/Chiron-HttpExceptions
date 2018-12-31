<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Server;

use Chiron\Http\Exception\HttpException;

class VariantAlsoNegotiatesHttpException extends HttpException
{
    private const STATUS_CODE = 506;
    private const TITLE = 'Variant Also Negotiates';
    private const DETAIL = 'Transparent content negotiation for the request, results in a circular reference.';
    private const TYPE_URI = 'https://httpstatuses.com/506';

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
