<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;

use Exception;
use InvalidArgumentException;
use Throwable;

/**
 * An exception that represents a HTTP error response with the fields for the RFC Api Problem.
 */
// TODO : passer toutes les méthodes en "final" =>https://github.com/mnavarrocarter/problem-details/blob/master/src/ApiException.php
abstract class HttpException extends Exception
{
    /** @var array */
    protected $headers = [];
    /** @var int */
    protected $statusCode;
    /** @var string */
    protected $title;
    /** @var string */
    protected $detail;
    /** @var string */
    protected $type;
    /** @var string */
    protected $instance;
    /** @var array */
    protected $additionalData = [];

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }
    /**
     * @param string $detail
     *
     * @return $this
     */
    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * @param string $uri
     *
     * @return $this
     */
    public function setType(string $uri): self
    {
        $this->type = $uri;
        return $this;
    }
    /**
     * @return string
     */
    public function getInstance(): string
    {
        return $this->instance;
    }
    /**
     * @param string $uri
     *
     * @return $this
     */
    public function setInstance(string $uri): self
    {
        $this->instance = $uri;

        return $this;
    }

    /**
     * @param array $additionalData
     *
     * @return $this
     */
    public function setAdditionalData(array $additionalData): self
    {
        $this->additionalData = $additionalData;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @return ApiExceptionInterface
     */
    final public function addAdditionalData(string $key, $value): self
    {
        $this->additionalData[$key] = $value;

        return $this;
    }


    /**
     * Return the Exception as an array, suitable for serializing.
     *
     * @return array
     */
    public function toArray(): array
    {
        $problem = [
            'status' => $this->getStatusCode(),
            'title' => $this->getTitle(),
            'detail' => $this->getDetail(),
            'type' => $this->getType(),
            'instance' => $this->getInstance(),
        ];

        // Required fields should always overwrite additional fields
        $problem = array_merge($this->additionalData, $problem);

        // remove empty fields in the array
        return array_filter($problem);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }




    //*****************************************************************************************************

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
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }
}
