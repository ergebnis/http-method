<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc\Rfc4918;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc4918
 */
final class Rfc4918Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('COPY', Rfc4918::COPY);
        self::assertSame('LOCK', Rfc4918::LOCK);
        self::assertSame('MKCOL', Rfc4918::MKCOL);
        self::assertSame('MOVE', Rfc4918::MOVE);
        self::assertSame('PROPFIND', Rfc4918::PROPFIND);
        self::assertSame('PROPPATCH', Rfc4918::PROPPATCH);
        self::assertSame('UNLOCK', Rfc4918::UNLOCK);
    }
}
