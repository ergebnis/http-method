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

use Ergebnis\Http;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Http\Method\Rfc\Rfc4437::class)]
final class Rfc4437Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('MKREDIRECTREF', Http\Method\Rfc\Rfc4437::MKREDIRECTREF);
        self::assertSame('UPDATEREDIRECTREF', Http\Method\Rfc\Rfc4437::UPDATEREDIRECTREF);
    }
}
