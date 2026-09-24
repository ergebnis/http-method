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

namespace Ergebnis\Http\Test\Unit\Method\Vendor;

use Ergebnis\Http\Method;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Method\Vendor\VarnishCache::class)]
final class VarnishCacheTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BAN', Method\Vendor\VarnishCache::BAN);
        self::assertSame('PURGE', Method\Vendor\VarnishCache::PURGE);
    }
}
