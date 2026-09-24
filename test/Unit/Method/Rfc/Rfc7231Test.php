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

use Ergebnis\Http\Method;
use PHPUnit\Framework;

#[Framework\Attributes\CoversClass(Method\Rfc\Rfc7231::class)]
final class Rfc7231Test extends Framework\TestCase
{
    public function testConstants(): void
    {
        self::assertSame('CONNECT', Method\Rfc\Rfc7231::CONNECT);
        self::assertSame('DELETE', Method\Rfc\Rfc7231::DELETE);
        self::assertSame('GET', Method\Rfc\Rfc7231::GET);
        self::assertSame('HEAD', Method\Rfc\Rfc7231::HEAD);
        self::assertSame('OPTIONS', Method\Rfc\Rfc7231::OPTIONS);
        self::assertSame('POST', Method\Rfc\Rfc7231::POST);
        self::assertSame('PUT', Method\Rfc\Rfc7231::PUT);
        self::assertSame('TRACE', Method\Rfc\Rfc7231::TRACE);
    }
}
