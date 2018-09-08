<?php

declare(strict_types=1);

namespace Chiron\Http\Exception;


//https://github.com/symfony/http-kernel/blob/master/Exception/HttpException.php
//https://github.com/stratifyphp/http/blob/master/src/Exception/HttpException.php

// TODO : regarder ici comment faire : https://github.com/juliangut/slim-exception/blob/master/src/

// CREER des exceptions dédiées pour l'erreur 404 et 405 : https://github.com/stratifyphp/http/blob/master/src/Exception/HttpMethodNotAllowed.php   /   https://github.com/stratifyphp/http/blob/master/src/Exception/HttpNotFound.php

interface HttpExceptionInterface //extends \RuntimeException //implements \ExceptionInterface
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
     * @return array Response headers
     */
    public function getHeaders(): array;
}
