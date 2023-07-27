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

use Ergebnis\Http\Method\Vendor;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Vendor\SquidCache::class)]
final class SquidCacheTest extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('PURGE', Vendor\SquidCache::PURGE);
    }
}
