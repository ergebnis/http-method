# http-method

[![Build Status](https://travis-ci.com/localheinz/http-method.svg?branch=master)](https://travis-ci.com/localheinz/http-method)
[![Latest Stable Version](https://poser.pugx.org/localheinz/http-method/v/stable)](https://packagist.org/packages/localheinz/http-method)
[![Total Downloads](https://poser.pugx.org/localheinz/http-method/downloads)](https://packagist.org/packages/localheinz/http-method)

Provides constants for HTTP request methods, inspired by [`teapot/status-code`](https://github.com/teapot-php/status-code).

## Installation

Run

```
$ composer require localheinz/http-method
```

## Usage

The interface `Localheinz\Http\Method` provides constants for all of the HTTP request methods:

* `CONNECT`
* `DELETE`
* `GET`
* `HEAD`
* `OPTIONS`
* `PATCH`
* `POST`
* `PURGE`
* `PUT`
* `TRACE`

Import the interface and use the constants instead of using magic strings:

```php
use Localheinz\Http\Method;
use Psr\Http\Message\RequestFactoryInterface;

/** @var RequestFactoryInterface $requestFactory */
$request = $requestFactory->create(
    Method::GET,
    'https://localheinz.com/blog'
);
```

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
