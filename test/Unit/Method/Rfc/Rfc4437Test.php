<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2020 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc\Rfc4437;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc4437
 */
final class Rfc4437Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('MKREDIRECTREF', Rfc4437::MKREDIRECTREF);
        self::assertSame('UPDATEREDIRECTREF', Rfc4437::UPDATEREDIRECTREF);
    }
}
