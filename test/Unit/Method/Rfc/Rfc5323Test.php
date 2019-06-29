<?php

declare(strict_types=1);

/**
 * Copyright (c) 2019 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/http-method
 */

namespace Localheinz\Http\Test\Unit\Method\Rfc;

use Localheinz\Http\Method\Rfc\Rfc5323;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\Rfc\Rfc5323
 */
final class Rfc5323Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('SEARCH', Rfc5323::SEARCH);
    }
}