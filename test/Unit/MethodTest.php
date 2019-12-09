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

namespace Ergebnis\Http\Test\Unit;

use Ergebnis\Http\Method;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Ergebnis\Http\Method
 */
final class MethodTest extends Framework\TestCase
{
    use Helper;

    /**
     * @dataProvider providerParentInterfaceName
     *
     * @param string $parentInterfaceName
     */
    public function testExtendsInterface(string $parentInterfaceName): void
    {
        self::assertInterfaceExtends($parentInterfaceName, Method::class);
    }

    public function providerParentInterfaceName(): array
    {
        return [
            [Method\Rfc\Rfc5789::class],
            [Method\Rfc\Rfc7231::class],
        ];
    }
}
