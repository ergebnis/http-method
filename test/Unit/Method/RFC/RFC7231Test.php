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

namespace Localheinz\Http\Test\Unit\Method\RFC;

use Localheinz\Http\Method\RFC\RFC7231;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\RFC\RFC7231
 */
final class RFC7231Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('CONNECT', RFC7231::CONNECT);
        self::assertSame('DELETE', RFC7231::DELETE);
        self::assertSame('GET', RFC7231::GET);
        self::assertSame('HEAD', RFC7231::HEAD);
        self::assertSame('OPTIONS', RFC7231::OPTIONS);
        self::assertSame('POST', RFC7231::POST);
        self::assertSame('PUT', RFC7231::PUT);
        self::assertSame('TRACE', RFC7231::TRACE);
    }
}
