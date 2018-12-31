<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class ProxyAuthenticationRequiredHttpException extends HttpException
{
    private const STATUS_CODE = 407;
    private const TITLE = 'Proxy Authentication Required';
    private const DETAIL = 'Proxy authentication is required to access the requested resource.';
    private const TYPE_URI = 'https://httpstatuses.com/407';

    /**
     * @param string $challenge
     * @param string $detail
     * @param string $title
     * @param string $type
     * @param string $instance
     */
    public function __construct(string $challenge, string $detail = self::DETAIL, string $title = self::TITLE, string $type = self::TYPE_URI, string $instance = '')
    {
        $this->headers['Proxy-Authenticate'] = $challenge;

        // override the protected var presents in the extended abstract classe.
        $this->statusCode = self::STATUS_CODE;
        $this->detail   = $detail;
        $this->title    = $title;
        $this->type     = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
