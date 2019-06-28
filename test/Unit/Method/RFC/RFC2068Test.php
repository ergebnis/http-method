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

use Localheinz\Http\Method\RFC\RFC2068;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\RFC\RFC2068
 */
final class RFC2068Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame(RFC2068::LINK, 'LINK');
        self::assertSame(RFC2068::UNLINK, 'UNLINK');
    }
}
