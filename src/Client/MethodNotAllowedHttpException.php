<?php

declare(strict_types=1);

namespace Chiron\Http\Exception\Client;

use Chiron\Http\Exception\HttpException;

class MethodNotAllowedHttpException extends HttpException
{
    private const STATUS_CODE = 405;
    private const TITLE = 'Method Not Allowed';
    private const DETAIL = 'A request was made of a resource using a request method not supported by that resource.';
    private const TYPE_URI = 'https://httpstatuses.com/405';

    /**
     * @param array  $allow
     * @param string $detail
     * @param string $title
     * @param string $type
     * @param string $instance
     */
    public function __construct(array $allow = [], string $detail = self::DETAIL, string $title = self::TITLE, string $type = self::TYPE_URI, string $instance = '')
    {
        if (! empty($allow)) {
            $this->headers['Allow'] = strtoupper(implode(', ', $allow));
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
