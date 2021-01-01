<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc\Rfc7231;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc7231
 */
final class Rfc7231Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('CONNECT', Rfc7231::CONNECT);
        self::assertSame('DELETE', Rfc7231::DELETE);
        self::assertSame('GET', Rfc7231::GET);
        self::assertSame('HEAD', Rfc7231::HEAD);
        self::assertSame('OPTIONS', Rfc7231::OPTIONS);
        self::assertSame('POST', Rfc7231::POST);
        self::assertSame('PUT', Rfc7231::PUT);
        self::assertSame('TRACE', Rfc7231::TRACE);
    }
}
