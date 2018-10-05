<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;

use Exception;
use InvalidArgumentException;
use Throwable;

/**
 * An exception that represents a HTTP error response.
 */
class HttpException extends Exception
{
    protected $statusCode;

    protected $headers;

    public function __construct(int $statusCode, string $message = null, Throwable $previous = null, array $headers = [])
    {
        if ($statusCode < 400 || $statusCode > 599) {
            throw new InvalidArgumentException("Invalid status code '$statusCode'; must be an integer between 400 and 599, inclusive.");
        }

        $this->statusCode = $statusCode;
        $this->headers = $headers;

        parent::__construct($message ?: '', 0, $previous);
    }

    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Returns response headers.
     *
     * @return array Response headers
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Set response headers.
     *
     * @param array $headers Response headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }
}
