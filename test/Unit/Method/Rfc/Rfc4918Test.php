<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2024 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc\Rfc4918::class)]
final class Rfc4918Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('COPY', Rfc\Rfc4918::COPY);
        self::assertSame('LOCK', Rfc\Rfc4918::LOCK);
        self::assertSame('MKCOL', Rfc\Rfc4918::MKCOL);
        self::assertSame('MOVE', Rfc\Rfc4918::MOVE);
        self::assertSame('PROPFIND', Rfc\Rfc4918::PROPFIND);
        self::assertSame('PROPPATCH', Rfc\Rfc4918::PROPPATCH);
        self::assertSame('UNLOCK', Rfc\Rfc4918::UNLOCK);
    }
}
