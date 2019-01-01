[![Build Status](https://travis-ci.org/ncou/Chiron-HttpExceptions.svg?branch=master)](https://travis-ci.org/ncou/Chiron-HttpExceptions)
[![Coverage Status](https://coveralls.io/repos/github/ncou/Chiron-HttpExceptions/badge.svg?branch=master)](https://coveralls.io/github/ncou/Chiron-HttpExceptions?branch=master)
[![CodeCov](https://codecov.io/gh/ncou/Chiron-HttpExceptions/branch/master/graph/badge.svg)](https://codecov.io/gh/ncou/Chiron-HttpExceptions)

[![Total Downloads](https://img.shields.io/packagist/dt/chiron/http-exceptions.svg?style=flat-square)](https://packagist.org/packages/chiron/http-exceptions/stats)
[![Monthly Downloads](https://img.shields.io/packagist/dm/chiron/http-exceptions.svg?style=flat-square)](https://packagist.org/packages/chiron/http-exceptions/stats)

[![StyleCI](https://styleci.io/repos/147929663/shield?style=flat)](https://styleci.io/repos/147929663)
[![PHP-Eye](https://php-eye.com/badge/chiron/http-exceptions/tested.svg?style=flat)](https://php-eye.com/package/chiron/http-exceptions)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)


HttpExceptions
==============

**All HTTP statuses from [RFC 7231](http://tools.ietf.org/html/rfc7231) implemented as separated Exceptions.**

**These Exceptions support a straightforward implementation of the IETF Problem Details for HTTP APIs [RFC 7807](https://tools.ietf.org/html/rfc7807).**

abstract `HttpException` class and its subclasses provide exceptions corresponding to HTTP
error status codes. The most common are included, but you can create exceptions
for other status codes by using (or subclassing) `HttpException` and providing 
the reason phrase as the `$title` and the status code as the `$statusCode`.

This package provides the following exception classes in the 
`Chiron\Http\Exception\Client` namespace for 4xx http errors. 
And `Chiron\Http\Exception\Server` namespace for 5xx http errors. 

4xx: Client Error - The request contains bad syntax or cannot be fulfilled
5xx: Server Error - The server failed to fulfill an apparently valid request

***Client errors :***

| Exception                             | Code | Message                           |
| ------------------------------------- | ---- | --------------------------------- |
| [BadRequestHttpException](src/Client/BadRequestHttpException.php)                   |  400 | "Bad Request"                     |
| [UnauthorizedHttpException](src/Client/UnauthorizedHttpException.php)                   |  401 | "Unauthorized"                     |
| [PaymentRequiredHttpException](src/Client/PaymentRequiredHttpException.php)                   |  402 | "Payment Required"                     |
| [ForbiddenHttpException](src/Client/ForbiddenHttpException.php)                   |  403 | "Forbidden"                     |
| [NotFoundHttpException](src/Client/NotFoundHttpException.php)                   |  404 | "Not Found"                     |
| [MethodNotAllowedHttpException](src/Client/MethodNotAllowedHttpException.php)                   |  405 | "Method Not Allowed"                     |
| [NotAcceptableHttpException](src/Client/NotAcceptableHttpException.php)                   |  406 | "Not Acceptable"                     |
| [ProxyAuthenticationRequiredHttpException](src/Client/ProxyAuthenticationRequiredHttpException.php)                   |  407 | "Proxy Authentication Required"                     |
| [RequestTimeoutHttpException](src/Client/RequestTimeoutHttpException.php)                   |  408 | "Request Timeout"                     |
| [ConflictHttpException](src/Client/ConflictHttpException.php)                   |  409 | "Conflict"                     |
| [GoneHttpException](src/Client/GoneHttpException.php)                   |  410 | "Gone"                     |
| [LengthRequiredHttpException](src/Client/LengthRequiredHttpException.php)                   |  411 | "Length Required"                     |
| [PreconditionFailedHttpException](src/Client/PreconditionFailedHttpException.php)                   |  412 | "Precondition Failed"                     |
| [PayloadTooLargeHttpException](src/Client/PayloadTooLargeHttpException.php)                   |  413 | "Payload Too Large"                     |
| [UriTooLongHttpException](src/Client/UriTooLongHttpException.php)                   |  414 | "URI Too Long"                     |
| [UnsupportedMediaTypeHttpException](src/Client/UnsupportedMediaTypeHttpException.php)                   |  415 | "Unsupported Media Type"                     |
| [RangeNotSatisfiableHttpException](src/Client/RangeNotSatisfiableHttpException.php)                   |  416 | "Range Not Satisfiable"                     |
| [ExpectationFailedHttpException](src/Client/ExpectationFailedHttpException.php)                   |  417 | "Expectation Failed"                     |
| [MisdirectedRequestHttpException](src/Client/MisdirectedRequestHttpException.php)                   |  421 | "Misdirected Request"                     |
| [UnprocessableEntityHttpException](src/Client/UnprocessableEntityHttpException.php)                   |  422 | "Unprocessable Entity"                     |
| [LockedHttpException](src/Client/LockedHttpException.php)                   |  423 | "Locked"                     |
| [FailedDependencyHttpException](src/Client/FailedDependencyHttpException.php)                   |  424 | "Failed Dependency"                     |
| [TooEarlyHttpException](src/Client/TooEarlyHttpException.php)                   |  425 | "Too Early"                     |
| [UpgradeRequiredHttpException](src/Client/UpgradeRequiredHttpException.php)                   |  426 | "Upgrade Required"                     |
| [PreconditionRequiredHttpException](src/Client/PreconditionRequiredHttpException.php)                   |  428 | "Precondition Required"                     |
| [TooManyRequestsHttpException](src/Client/TooManyRequestsHttpException.php)                   |  429 | "Too Many Requests"                     |
| [RequestHeaderFieldsTooLargeHttpException](src/Client/RequestHeaderFieldsTooLargeHttpException.php)                   |  431 | "Request Header Fields Too Large"                     |
| [UnavailableForLegalReasonsHttpException](src/Client/UnavailableForLegalReasonsHttpException.php)                   |  451 | "Unavailable For Legal Reasons"                     |

***Server errors :***

| Exception                             | Code | Message                           |
| ------------------------------------- | ---- | --------------------------------- |
| [InternalServerErrorHttpException](src/Server/InternalServerErrorHttpException.php)                   |  500 | "Internal Server Error"                     |
| [NotImplementedHttpException](src/Server/NotImplementedHttpException.php)                   |  501 | "'Not Implemented"                     |
| [BadGatewayHttpException](src/Server/BadGatewayHttpException.php)                   |  502 | "Bad Gateway"                     |
| [ServiceUnavailableHttpException](src/Server/ServiceUnavailableHttpException.php)                   |  503 | "Service Unavailable"                     |
| [GatewayTimeoutHttpException](src/Server/GatewayTimeoutHttpException.php)                   |  504 | "Gateway Timeout"                     |
| [HttpVersionNotSupportedHttpException](src/Server/HttpVersionNotSupportedHttpException.php)                   |  505 | "HTTP Version Not Supported"                     |
| [VariantAlsoNegotiatesHttpException](src/Server/VariantAlsoNegotiatesHttpException.php)                   |  506 | "Variant Also Negotiates"                     |
| [InsufficientStorageHttpException](src/Server/InsufficientStorageHttpException.php)                   |  507 | "Insufficient Storage"                     |
| [LoopDetectedHttpException](src/Server/LoopDetectedHttpException.php)                   |  508 | "Loop Detected"                     |
| [NotExtendedHttpException](src/Server/NotExtendedHttpException.php)                   |  510 | "Not Extended"                     |
| [NetworkAuthenticationRequiredHttpException](src/Server/NetworkAuthenticationRequiredHttpException.php)                   |  511 | "Network Authentication Required"                     |

*[References for Http status code](https://www.iana.org/assignments/http-status-codes/http-status-codes.xml)*

Basic Usage
-----------

Throw an exception.

```php
throw new \Chiron\Http\Exception\Client\BadRequestHttpException(); 
```

Throw an exception with a custom message.

```php
$e = new \Chiron\Http\Exception\Client\BadRequestHttpException("Invalid syntax !");
throw $e->setHeaders(['X-Custom-Header' => 'foobar']);
```

Catch an exception and output an HTML response.

```php
try {
    // ... 
} catch (\Chiron\Http\Exception\HttpException $e) {
    http_response_code($e->getStatusCode());
    header("Content-type: text/html");
    print "<h1>" . $e->getMessage() . "</h1>";
}
```

Or, if you're using PSR7 response :

```php
try {
    // ... 
} catch (\Chiron\Http\Exception\HttpExceptionInterface $e) {
    $response = $response
        ->withStatus($e->getStatusCode())
        ->withHeader("Content-type", "text/html")
        ->getBody()->write("<h1>" . $e->getMessage() . "</h1>");
}
```

Api Problem
-------
The following properties are available.

```php
$e = new \Chiron\Http\Exception\Client\ForbiddenHttpException();

$e->setTitle('You do not have enough credit.');
$e->setDetail('Your current balance is 30, but that costs 50.');
$e->setType('https://example.com/probs/out-of-credit');
$e->setIntance('https://example.net/account/12345/msgs/abc');
$e->setAdditionalData(['balance' => 30, 'accounts' => ['https://example.net/account/12345', 'https://example.net/account/67890']]);

throw $e;
```

And output the API Problem response like this :

```php
try {
    // ... 
} catch (\Chiron\Http\Exception\HttpException $e) {
    http_response_code($e->getStatusCode());
    header("Content-type: application/problem+json");
    print json_encode($e);
}
```

Install
-------

Add `Chiron/http-exceptions` to your composer.json 

```json
{
    "require": {
        "chiron/http-exceptions": "^2.0"
    }
}
```

License
---------------------
Licensed under the [MIT license](LICENSE.md)

Suggestions
---------------------
Tips : [Usage Suggestion](USAGE_SUGGESTION.md)
