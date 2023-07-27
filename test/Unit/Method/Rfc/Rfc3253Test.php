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

use Ergebnis\Http\Method\Rfc;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc\Rfc3253::class)]
final class Rfc3253Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame(Rfc\Rfc3253::BASELINE_CONTROL, 'BASELINE_CONTROL');
        self::assertSame(Rfc\Rfc3253::CHECKIN, 'CHECKIN');
        self::assertSame(Rfc\Rfc3253::CHECKOUT, 'CHECKOUT');
        self::assertSame(Rfc\Rfc3253::LABEL, 'LABEL');
        self::assertSame(Rfc\Rfc3253::MERGE, 'MERGE');
        self::assertSame(Rfc\Rfc3253::MKACTIVITY, 'MKACTIVITY');
        self::assertSame(Rfc\Rfc3253::MKWORKSPACE, 'MKWORKSPACE');
        self::assertSame(Rfc\Rfc3253::REPORT, 'REPORT');
        self::assertSame(Rfc\Rfc3253::UNCHECKOUT, 'UNCHECKOUT');
        self::assertSame(Rfc\Rfc3253::UPDATE, 'UPDATE');
        self::assertSame(Rfc\Rfc3253::VERSION_CONTROL, 'VERSION-CONTROL');
    }
}
