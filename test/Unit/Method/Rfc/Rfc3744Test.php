<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/http-method
 */

namespace Ergebnis\Http\Test\Unit\Method\Rfc;

use Ergebnis\Http\Method\Rfc\Rfc3744;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method\Rfc\Rfc3744
 */
final class Rfc3744Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('ACL', Rfc3744::ACL);
    }
}
