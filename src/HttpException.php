<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;

/**
 * An exception that represents a HTTP error response.
 */
class HttpException extends \RuntimeException implements HttpExceptionInterface
{
    private int $statusCode;
    /** @var array<string, string|string[]> */
    private array $headers;

    /**
     * @param array<string, string|string[]> $headers
     */
    public function __construct(int $statusCode, string $message = '', ?\Throwable $previous = null, array $headers = [], int $code = 0)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;

        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array<string, string|string[]> $headers
     */
    public function setHeaders(array $headers): void
    {
        // TODO : améliorer le code en utilisant cet exemple : https://github.com/guzzle/psr7/blob/8f199b15f06c5b2b101aa87a073f652fca506ba0/src/MessageTrait.php#L144
        $this->headers = $headers;
    }
}
