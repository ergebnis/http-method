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

use Localheinz\Http\Method\Vendor\SquidCache;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\Vendor\SquidCache
 */
final class SquidCacheTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('PURGE', SquidCache::PURGE);
    }
}
