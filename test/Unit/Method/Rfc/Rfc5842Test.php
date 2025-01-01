<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2025 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc\Rfc5842::class)]
final class Rfc5842Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('BIND', Rfc\Rfc5842::BIND);
        self::assertSame('REBIND', Rfc\Rfc5842::REBIND);
        self::assertSame('UNBIND', Rfc\Rfc5842::UNBIND);
    }
}
