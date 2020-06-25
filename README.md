# http-method

[![Integrate](https://github.com/ergebnis/http-method/workflows/Integrate/badge.svg?branch=main)](https://github.com/ergebnis/http-method/actions)
[![Prune](https://github.com/ergebnis/http-method/workflows/Prune/badge.svg?branch=main)](https://github.com/ergebnis/http-method/actions)
[![Release](https://github.com/ergebnis/http-method/workflows/Release/badge.svg?branch=main)](https://github.com/ergebnis/http-method/actions)
[![Renew](https://github.com/ergebnis/http-method/workflows/Renew/badge.svg?branch=main)](https://github.com/ergebnis/http-method/actions)

[![Type Coverage](https://shepherd.dev/github/ergebnis/http-method/coverage.svg)](https://shepherd.dev/github/ergebnis/http-method)

[![Latest Stable Version](https://poser.pugx.org/ergebnis/http-method/v/stable)](https://packagist.org/packages/ergebnis/http-method)
[![Total Downloads](https://poser.pugx.org/ergebnis/http-method/downloads)](https://packagist.org/packages/ergebnis/http-method)

Provides constants for HTTP request methods, inspired by [`teapot/status-code`](https://github.com/teapot-php/status-code).

## Motivation

Several PHP frameworks and libraries come with their own abstractions of HTTP request and response objects. Some of them provide constants for

- HTTP request method names
- HTTP response status codes

so that a developer can refer to these by using named constants instead of magic numbers or magic strings.

Here are a few examples of HTTP request abstractions which provide constants for HTTP request methods:

* [`Symfony\Component\HttpFoundation\Request`](https://github.com/symfony/http-foundation/blob/v4.3.2/Request.php#L41-L50)
* [`Zend\Http\Request`](https://github.com/zendframework/zend-http/blob/release-2.10.0/src/Request.php#L26-L35)

Here are a few examples of HTTP response abstractions which provide constants for HTTP response status codes:

* [`Symfony\Component\HttpFoundation\Response`](https://github.com/symfony/http-foundation/blob/v4.3.2/Response.php#L21-L88)
* [`Zend\Http\Response`](https://github.com/zendframework/zend-http/blob/release-2.10.0/src/Response.php#L24-L88)

Here are a few examples of interfaces providing constants for HTTP request methods and HTTP response status codes:

* [`Fig\Http\Message\RequestMethodInterface`](https://github.com/php-fig/http-message-util/blob/1.1.3/src/RequestMethodInterface.php#L24-L33)
* [`Fig\Http\Message\StatusCodeInterface`](https://github.com/php-fig/http-message-util/blob/1.1.3/src/StatusCodeInterface.php#L39-L106)

However, a developer might use an abstraction that either does not provide any constants at all, or only provides a subset of the constants required for the specific case.

The excellent library [`teapot/status-code`](https://github.com/teapot-php/status-code) already provides HTTP status codes that are standardized by RFCs, as well as a range of vendor-specific HTTP status codes.

In a similar fashion, this library here aims to provide a collection of interfaces with constants for HTTP request methods that are standardized by RFCs, as well as additional vendor-specific HTTP request methods.

## Installation

Run

```sh
$ composer require ergebnis/http-method
```

## Usage

The interface [`Ergebnis\Http\Method`](/src/Method.php) provides constants for all of the HTTP request methods that are standardized by

* [RFC 5789](https://tools.ietf.org/html/rfc5789)
* [RFC 7231](https://tools.ietf.org/html/rfc7231)

namely

* `CONNECT`
* `DELETE`
* `GET`
* `HEAD`
* `OPTIONS`
* `PATCH`
* `POST`
* `PUT`
* `TRACE`

The interface [`Ergebnis\Http\Method\WebDav`](/src/Method/WebDav.php) provides constants for all of the HTTP request methods that are standardized by

- [RFC 3648](https://tools.ietf.org/html/rfc3648)
- [RFC 3744](https://tools.ietf.org/html/rfc3744)
- [RFC 4437](https://tools.ietf.org/html/rfc4437)
- [RFC 4791](https://tools.ietf.org/html/rfc4791)
- [RFC 4918](https://tools.ietf.org/html/rfc4918)
- [RFC 5323](https://tools.ietf.org/html/rfc5323)
- [RFC 5789](https://tools.ietf.org/html/rfc5789)
- [RFC 5842](https://tools.ietf.org/html/rfc5842)
- [RFC 7231](https://tools.ietf.org/html/rfc7231)

namely

- `ACL`
- `BIND`
- `CONNECT`
- `COPY`
- `DELETE`
- `GET`
- `HEAD`
- `LOCK`
- `MKCALENDAR`
- `MKCOL`
- `MKREDIRECTREF`
- `MOVE`
- `OPTIONS`
- `ORDERPATCH`
- `PATCH`
- `POST`
- `PROPFIND`
- `PROPPATCH`
- `PUT`
- `REBIND`
- `SEARCH`
- `TRACE`
- `UNBIND`
- `UNLOCK`
- `UPDATEREDIRECTREF`

The interface [`Ergebnis\Http\Method\Vendor\SquidCache`](/src/Method/Vendor/SquidCache.php) provides constants for a suggest HTTP request method used for purging items from the cache,
namely

- `PURGE`

The interface [`Ergebnis\Http\Method\Vendor\VarnishCache`](/src/Method/Vendor/VarnishCache.php) provides constants for a suggest HTTP request method used for invalidating and purging items from the cache, namely

- `BAN`
- `PURGE`

To use these constants, import the interfaces and refer to the constants instead of using magic strings:

```php
<?php

use Ergebnis\Http\Method;
use Psr\Http\Client;
use Psr\Http\Message;

/** @var Message\RequestFactoryInterface $requestFactory */
$request = $requestFactory->create(
    Method::GET,
    'https://localheinz.com/blog'
);

/** @var Client\ClientInterface $httpClient */
$httpClient->sendRequest($request);
```

:bulb: If you are aware of any other - either standardized or vendor-specific - HTTP methods that are used in the wild, please let me know!

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](https://github.com/ergebnis/.github/blob/main/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.

Please have a look at [`LICENSE.md`](LICENSE.md).

## Curious what I am building?

:mailbox_with_mail: [Subscribe to my list](https://localheinz.com/projects/), and I will occasionally send you an email to let you know what I am working on.
