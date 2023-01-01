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

namespace Ergebnis\Http\Test\Unit\Method\Vendor;

use Ergebnis\Http\Method\Vendor\VarnishCache;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Vendor\VarnishCache
 */
final class VarnishCacheTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BAN', VarnishCache::BAN);
        self::assertSame('PURGE', VarnishCache::PURGE);
    }
}
