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

use Ergebnis\Http\Method\Rfc\Rfc4791;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc4791
 */
final class Rfc4791Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('MKCALENDAR', Rfc4791::MKCALENDAR);
    }
}
