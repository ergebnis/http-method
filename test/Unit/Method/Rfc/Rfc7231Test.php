<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc\Rfc7231::class)]
final class Rfc7231Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('CONNECT', Rfc\Rfc7231::CONNECT);
        self::assertSame('DELETE', Rfc\Rfc7231::DELETE);
        self::assertSame('GET', Rfc\Rfc7231::GET);
        self::assertSame('HEAD', Rfc\Rfc7231::HEAD);
        self::assertSame('OPTIONS', Rfc\Rfc7231::OPTIONS);
        self::assertSame('POST', Rfc\Rfc7231::POST);
        self::assertSame('PUT', Rfc\Rfc7231::PUT);
        self::assertSame('TRACE', Rfc\Rfc7231::TRACE);
    }
}
