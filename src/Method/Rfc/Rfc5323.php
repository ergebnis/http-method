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

namespace Ergebnis\Http\Method\Rfc;

/**
 * @see https://tools.ietf.org/html/rfc5323
 */
interface Rfc5323 extends Status\ProposedStandard
{
    /**
     * The client invokes the SEARCH method to initiate a server-side
     * search.  The body of the request defines the query.  The server MUST
     * emit an entity matching the WebDAV multistatus format ([RFC4918],
     * Section 13).
     *
     * The SEARCH method plays the role of transport mechanism for the query
     * and the result set.  It does not define the semantics of the query.
     * The type of the query defines the semantics.
     *
     * SEARCH is a safe method; it does not have any significance other than
     * executing a query and returning a query result (see [RFC2616],
     * Section 9.1.1).
     *
     * Reschke, J., et al.
     *
     * Safe: yes
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc5323#section-2
     */
    public const SEARCH = 'SEARCH';
}
