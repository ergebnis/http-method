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

use Ergebnis\Http\Method\Rfc\Rfc2068;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc2068::class)]
final class Rfc2068Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame(Rfc2068::LINK, 'LINK');
        self::assertSame(Rfc2068::UNLINK, 'UNLINK');
    }
}
