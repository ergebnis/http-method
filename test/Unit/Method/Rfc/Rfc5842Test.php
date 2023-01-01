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

use Ergebnis\Http\Method\Rfc\Rfc5842;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc5842
 */
final class Rfc5842Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BIND', Rfc5842::BIND);
        self::assertSame('REBIND', Rfc5842::REBIND);
        self::assertSame('UNBIND', Rfc5842::UNBIND);
    }
}
