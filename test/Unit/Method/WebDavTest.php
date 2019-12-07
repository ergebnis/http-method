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

namespace Localheinz\Http\Test\Unit\Method;

use Ergebnis\Test\Util\Helper;
use Localheinz\Http\Method;
use Localheinz\Http\Method\WebDav;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\Http\Method\WebDav
 */
final class WebDavTest extends Framework\TestCase
{
    use Helper;

    /**
     * @dataProvider providerParentInterfaceName
     *
     * @param string $parentInterfaceName
     */
    public function testExtendsInterface(string $parentInterfaceName): void
    {
        self::assertInterfaceExtends($parentInterfaceName, WebDav::class);
    }

    public function providerParentInterfaceName(): array
    {
        return [
            [Method\Rfc\Rfc3648::class],
            [Method\Rfc\Rfc3744::class],
            [Method\Rfc\Rfc4437::class],
            [Method\Rfc\Rfc4791::class],
            [Method\Rfc\Rfc4918::class],
            [Method\Rfc\Rfc5323::class],
            [Method\Rfc\Rfc5789::class],
            [Method\Rfc\Rfc5842::class],
            [Method\Rfc\Rfc7231::class],
        ];
    }
}
