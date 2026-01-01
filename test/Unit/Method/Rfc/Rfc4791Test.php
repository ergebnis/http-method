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

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc\Rfc4791::class)]
final class Rfc4791Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('MKCALENDAR', Rfc\Rfc4791::MKCALENDAR);
    }
}
