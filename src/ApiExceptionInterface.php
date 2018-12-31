<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;

use Exception;
use InvalidArgumentException;
use Throwable;
use JsonSerializable;

// TODO : mettre les getter et les setteur dans l'ordre pour que le fichier de l'interface soit plus facile à lire.
interface ApiExceptionInterface extends JsonSerializable
{
    /**
     * @return string
     */
    public function getType(): string;
    /**
     * @return string
     */
    public function getTitle(): string;
    /**
     * @return int
     */
    //public function getStatusCode(): int;
    /**
     * @return string
     */
    public function getDetail(): string;
    /**
     * @return string
     */
    public function getInstance(): string;
    /**
     * @return array
     */
    //public function getExtra(): array;
    /**
     * @param string $type
     * @return ApiExceptionInterface
     */
    public function setType(string $type): ApiExceptionInterface;
    /**
     * @param string $title
     * @return ApiExceptionInterface
     */
    public function setTitle(string $title): ApiExceptionInterface;
    /**
     * @param int $statusCode
     * @return ApiExceptionInterface
     */
    //public function setStatusCode(int $statusCode): ApiExceptionInterface;
    /**
     * @param string $detail
     * @return ApiExceptionInterface
     */
    public function setDetail(string $detail): ApiExceptionInterface;
    /**
     * @param string $instance
     * @return ApiExceptionInterface
     */
    public function setInstance(string $instance): ApiExceptionInterface;




    /**
     * @param string $key
     * @param mixed  $value
     * @return ApiExceptionInterface
     */
    //public function set(string $key, mixed $value): ApiExceptionInterface;

    /**
     * @return array
     */
    public function toArray(): array;
}
