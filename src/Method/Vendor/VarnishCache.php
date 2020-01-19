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

namespace Ergebnis\Http\Method\Vendor;

/**
 * @see https://varnish-cache.org/docs/index.html
 */
interface VarnishCache
{
    /**
     * Safe: ?
     * Idempotent: ?
     *
     * @see https://varnish-cache.org/docs/3.0/tutorial/purging.html#bans
     */
    public const BAN = 'BAN';

    /**
     * Safe: no
     * Idempotent: ?
     *
     * @see https://varnish-cache.org/docs/3.0/tutorial/purging.html#http-purges
     */
    public const PURGE = 'PURGE';
}
