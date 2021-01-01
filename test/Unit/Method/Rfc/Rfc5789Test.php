<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc\Rfc5789;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc5789
 */
final class Rfc5789Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('PATCH', Rfc5789::PATCH);
    }
}
