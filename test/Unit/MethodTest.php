<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/http-method
 */

namespace Localheinz\Http\Test\Unit;

use Localheinz\Http\Method;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method
 */
final class MethodTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame(Method::CONNECT, 'CONNECT');
        self::assertSame(Method::DELETE, 'DELETE');
        self::assertSame(Method::GET, 'GET');
        self::assertSame(Method::HEAD, 'HEAD');
        self::assertSame(Method::OPTIONS, 'OPTIONS');
        self::assertSame(Method::PATCH, 'PATCH');
        self::assertSame(Method::POST, 'POST');
        self::assertSame(Method::PUT, 'PUT');
        self::assertSame(Method::TRACE, 'TRACE');
    }
}
