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

use Localheinz\Http\Method\RFC\RFC3253;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\RFC\RFC3253
 */
final class RFC3253Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame(RFC3253::BASELINE_CONTROL, 'BASELINE_CONTROL');
        self::assertSame(RFC3253::CHECKIN, 'CHECKIN');
        self::assertSame(RFC3253::CHECKOUT, 'CHECKOUT');
        self::assertSame(RFC3253::LABEL, 'LABEL');
        self::assertSame(RFC3253::MERGE, 'MERGE');
        self::assertSame(RFC3253::MKACTIVITY, 'MKACTIVITY');
        self::assertSame(RFC3253::MKWORKSPACE, 'MKWORKSPACE');
        self::assertSame(RFC3253::REPORT, 'REPORT');
        self::assertSame(RFC3253::UNCHECKOUT, 'UNCHECKOUT');
        self::assertSame(RFC3253::UPDATE, 'UPDATE');
        self::assertSame(RFC3253::VERSION_CONTROL, 'VERSION-CONTROL');
    }
}
