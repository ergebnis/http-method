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
 * @see https://tools.ietf.org/html/rfc2068
 */
interface Rfc2068 extends Status\ProposedStandard
{
    /**
     * The LINK method establishes one or more Link relationships between
     * the existing resource identified by the Request-URI and other
     * existing resources. The difference between LINK and other methods
     * allowing links to be established between resources is that the LINK
     * method does not allow any message-body to be sent in the request and
     * does not directly result in the creation of new resources.
     *
     * If the request passes through a cache and the Request-URI identifies
     * a currently cached entity, that entity MUST be removed from the
     * cache.  Responses to this method are not cachable.
     *
     * Caches that implement LINK should invalidate cached responses as
     * defined in section 13.10 for PUT.
     *
     * (Fielding, Roy, et al.)
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc2068#section-19.6.1.2
     * @see https://tools.ietf.org/html/rfc2068#section-13.10
     */
    public const LINK = 'LINK';

    /**
     * The UNLINK method removes one or more Link relationships from the
     * existing resource identified by the Request-URI. These relationships
     * may have been established using the LINK method or by any other
     * method supporting the Link header. The removal of a link to a
     * resource does not imply that the resource ceases to exist or becomes
     * inaccessible for future references.
     *
     * If the request passes through a cache and the Request-URI identifies
     * a currently cached entity, that entity MUST be removed from the
     * cache.  Responses to this method are not cachable.
     *
     * Caches that implement UNLINK should invalidate cached responses as
     * defined in section 13.10 for PUT.
     *
     * (Fielding, Roy, et al.)
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc2068#section-19.6.1.3
     * @see https://tools.ietf.org/html/rfc2068#section-13.10
     */
    public const UNLINK = 'UNLINK';
}
