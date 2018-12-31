<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;

use Exception;
use InvalidArgumentException;
use Throwable;

/**
 * An exception that represents a HTTP error response.
 */
// TODO : passer toutes les méthodes en "final" =>https://github.com/mnavarrocarter/problem-details/blob/master/src/ApiException.php
// TODO : changer le getStatusCode() en getStatus() idem pour le setter. Cette méthode sera commune pour les 2 interfaces HttpExceptionInterface et ApiExceptionInterface
// TODO : faire un extends de RuntimeException et non pas de Exception tout cours. non ??????
// TODO : passer la classe en "abstract" non ????
abstract class HttpException extends Exception implements ApiExceptionInterface
{
    /** @var int */
    protected $statusCode;
    /** @var array */
    protected $headers = [];



    /** @var int */
    //TODO : à virer car il y a a déjà une variable protected $statusCode
    protected $status;
    /** @var string */
    protected $title;
    /** @var string */
    //protected $detail = '';
    protected $detail;
    /** @var string */
    //protected $type = 'http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html';
    protected $type;
    /** @var string */
    protected $instance;
    /** @var array */
    protected $additionalDetails = []; // TODO : à renommer en additionalData ???

    /**
     * Get the status
     *
     * @return int The current HTTP status code. If not set, it will return 0.
     */
    public function getStatus(): int
    {
        return $this->status ?: 0;
    }
    /**
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status): ApiExceptionInterface
    {
        $this->status = $status;
        return $this;
    }
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
    public function setTitle(string $title): ApiExceptionInterface
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
    public function setDetail(string $detail): ApiExceptionInterface
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
    public function setType(string $uri): ApiExceptionInterface
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
    public function setInstance(string $uri): ApiExceptionInterface
    {
        $this->instance = $uri;
        return $this;
    }

    /**
     * @param array $additionalDetail
     *
     * @return $this
     */
    public function setAdditional(array $additionalDetail): ApiExceptionInterface
    {
        $this->additionalDetail = $additionalDetail;
        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @return ApiExceptionInterface
     */
    // TODO : renommer en un truc genre addAdditionalData()
    final public function set(string $key, $value): ApiExceptionInterface
    {
        $this->extra[$key] = $value;
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
        $problem = array_merge($this->additionalDetails, $problem);

        // remove empty fields in the array
        return array_filter($problem);
    }

    /**
     * @return array
     */
    final public function jsonSerialize(): array
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
    // TODO : faire un return $this ?????
    public function setHeaders(array $headers): ApiExceptionInterface
    {
        $this->headers = $headers;

        return $this;
    }
}
