<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2026 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Http\Method\Rfc\Rfc7231::class)]
final class Rfc7231Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('CONNECT', Http\Method\Rfc\Rfc7231::CONNECT);
        self::assertSame('DELETE', Http\Method\Rfc\Rfc7231::DELETE);
        self::assertSame('GET', Http\Method\Rfc\Rfc7231::GET);
        self::assertSame('HEAD', Http\Method\Rfc\Rfc7231::HEAD);
        self::assertSame('OPTIONS', Http\Method\Rfc\Rfc7231::OPTIONS);
        self::assertSame('POST', Http\Method\Rfc\Rfc7231::POST);
        self::assertSame('PUT', Http\Method\Rfc\Rfc7231::PUT);
        self::assertSame('TRACE', Http\Method\Rfc\Rfc7231::TRACE);
    }
}
