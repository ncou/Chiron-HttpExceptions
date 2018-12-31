<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class UpgradeRequiredHttpException extends HttpException
{
    private const STATUS_CODE = 426;
    private const TITLE = 'Upgrade Required';
    private const DETAIL = 'The server cannot process the request using the current protocol.';
    private const TYPE_URI = 'https://httpstatuses.com/426';

    /**
     * @param string $upgrade
     * @param string $detail
     * @param string $title
     * @param string $type
     * @param string $instance
     */
    public function __construct(string $upgrade, string $detail = self::DETAIL, string $title = self::TITLE, string $type = self::TYPE_URI, string $instance = '')
    {
        $this->headers['Upgrade'] = $upgrade;

        // override the protected var presents in the extended abstract classe.
        $this->statusCode = self::STATUS_CODE;
        $this->detail   = $detail;
        $this->title    = $title;
        $this->type     = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
