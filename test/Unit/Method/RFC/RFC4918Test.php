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

use Localheinz\Http\Method\RFC\RFC4918;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\RFC\RFC4918
 */
final class RFC4918Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('COPY', RFC4918::COPY);
        self::assertSame('LOCK', RFC4918::LOCK);
        self::assertSame('MKCOL', RFC4918::MKCOL);
        self::assertSame('MOVE', RFC4918::MOVE);
        self::assertSame('PROPFIND', RFC4918::PROPFIND);
        self::assertSame('PROPPATCH', RFC4918::PROPPATCH);
        self::assertSame('UNLOCK', RFC4918::UNLOCK);
    }
}
