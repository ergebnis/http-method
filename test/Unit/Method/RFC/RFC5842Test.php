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

use Localheinz\Http\Method\RFC\RFC5842;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\RFC\RFC5842
 */
final class RFC5842Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BIND', RFC5842::BIND);
        self::assertSame('REBIND', RFC5842::REBIND);
        self::assertSame('UNBIND', RFC5842::UNBIND);
    }
}
