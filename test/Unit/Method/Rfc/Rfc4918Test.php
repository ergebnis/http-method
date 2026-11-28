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

#[Framework\Attributes\CoversClass(Http\Method\Rfc\Rfc4918::class)]
final class Rfc4918Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('COPY', Http\Method\Rfc\Rfc4918::COPY);
        self::assertSame('LOCK', Http\Method\Rfc\Rfc4918::LOCK);
        self::assertSame('MKCOL', Http\Method\Rfc\Rfc4918::MKCOL);
        self::assertSame('MOVE', Http\Method\Rfc\Rfc4918::MOVE);
        self::assertSame('PROPFIND', Http\Method\Rfc\Rfc4918::PROPFIND);
        self::assertSame('PROPPATCH', Http\Method\Rfc\Rfc4918::PROPPATCH);
        self::assertSame('UNLOCK', Http\Method\Rfc\Rfc4918::UNLOCK);
    }
}
