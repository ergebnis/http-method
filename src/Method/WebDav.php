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

namespace Ergebnis\Http\Method;

/**
 * @see http://www.webdav.org
 */
interface WebDav extends
    Rfc\Rfc3648,
    Rfc\Rfc3744,
    Rfc\Rfc4437,
    Rfc\Rfc4791,
    Rfc\Rfc4918,
    Rfc\Rfc5323,
    Rfc\Rfc5789,
    Rfc\Rfc5842,
    Rfc\Rfc7231
{
}
