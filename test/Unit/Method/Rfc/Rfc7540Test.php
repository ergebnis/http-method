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

use Ergebnis\Http\Method\Rfc\Rfc7540;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Rfc7540::class)]
final class Rfc7540Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('PRI', Rfc7540::PRI);
    }
}
