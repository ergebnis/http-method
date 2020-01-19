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
 * @see https://wiki.squid-cache.org/FrontPage
 */
interface SquidCache
{
    /**
     * Safe: no
     * Idempotent: ?
     *
     * @see https://wiki.squid-cache.org/SquidFaq/OperatingSquid#How_can_I_purge_an_object_from_my_cache.3F
     * @see https://wiki.squid-cache.org/SquidFaq/OperatingSquid#How_can_I_purge_multiple_objects_from_my_cache.3F
     */
    public const PURGE = 'PURGE';
}
