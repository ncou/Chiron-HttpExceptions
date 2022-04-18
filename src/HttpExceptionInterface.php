<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;

/**
 * Interface for HTTP error exceptions.
 */
interface HttpExceptionInterface extends \Throwable
{
    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode(): int;

    /**
     * Returns response headers.
     *
     * @return array<string, string|string[]> Response headers
     */
    public function getHeaders(): array;
}
