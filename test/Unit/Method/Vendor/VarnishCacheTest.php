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

namespace Localheinz\Http\Test\Unit\Method\Vendor;

use Localheinz\Http\Method\Vendor\VarnishCache;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\Vendor\VarnishCache
 */
final class VarnishCacheTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BAN', VarnishCache::BAN);
        self::assertSame('PURGE', VarnishCache::PURGE);
    }
}
