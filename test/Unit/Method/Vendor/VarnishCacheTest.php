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

namespace Ergebnis\Http\Test\Unit\Method\Vendor;

use Ergebnis\Http\Method\Vendor;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Vendor\VarnishCache::class)]
final class VarnishCacheTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BAN', Vendor\VarnishCache::BAN);
        self::assertSame('PURGE', Vendor\VarnishCache::PURGE);
    }
}
