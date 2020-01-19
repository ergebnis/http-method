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
 * @see https://tools.ietf.org/html/rfc3648
 */
interface Rfc3648 extends Status\ProposedStandard
{
    /**
     * The ORDERPATCH method is used to change the ordering semantics of a
     * collection, to change the order of the collection's members in the
     * ordering, or both.
     *
     * The server MUST apply the changes in the order they appear in the
     * order XML element.  The server MUST either apply all the changes or
     * apply none of them.  If any error occurs during processing, all
     * executed changes MUST be undone and a proper error result returned.
     *
     * If an ORDERPATCH request changes the ordering semantics, but does not
     * completely specify the order of the collection members, the server
     * MUST assign a position in the ordering to each collection member for
     * which a position was not specified.  These server-assigned positions
     * MUST follow the last position specified by the client.  The result is
     * that all members for which the client specified a position are at the
     * beginning of the ordering, followed by any members for which the
     * server assigned positions.  Note that the ordering of the server-
     * assigned positions is not defined by this document, therefore servers
     * can use whatever rule seems reasonable (for instance, alphabetically
     * or by creation date).
     *
     * If an ORDERPATCH request does not change the ordering semantics, any
     * member positions not specified in the request MUST remain unchanged.
     *
     * A request to reposition a collection member to the same place in the
     * ordering is not an error.
     *
     * If an ORDERPATCH request fails, the server state preceding the
     * request MUST be restored.
     *
     * Additional Marshalling:
     *
     * The request body MUST be DAV:orderpatch element.
     *
     * <!ELEMENT orderpatch (ordering-type?, order-member*) >
     *
     * <!ELEMENT order-member (segment, position) >
     * <!ELEMENT position (first | last | before | after)>
     * <!ELEMENT segment (#PCDATA)>
     * <!ELEMENT first EMPTY >
     * <!ELEMENT last EMPTY >
     * <!ELEMENT before segment >
     * <!ELEMENT after segment >
     *
     * PCDATA value: segment, as defined in section 3.3 of [RFC2396].
     *
     * The DAV:ordering-type property is modified according to the
     * DAV:ordering-type element.
     *
     * The ordering of internal member URIs in the collection identified
     * by the Request-URI is changed based on instructions in the order-
     * member XML elements.  Specifically, in the order that they appear
     * in the request.  The order-member XML elements identify the
     * internal member URIs whose positions are to be changed, and
     * describe their new positions in the ordering.  Each new position
     * can be specified as first in the ordering, last in the ordering,
     * immediately before some other internal member URI, or immediately
     * after some other internal member URI.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:orderpatch-response XML element.  Note that this document
     * does not define any elements for the ORDERPATCH response body, but
     * the DAV:orderpatch-response element is defined to ensure
     * interoperability between future extensions that do define elements
     * for the ORDERPATCH response body.
     *
     * <!ELEMENT orderpatch-response ANY>
     *
     * Since multiple changes can be requested in a single ORDERPATCH
     * request, the server MUST return a 207 (Multi-Status) response
     * (defined in [RFC2518]), containing DAV:response elements for
     * either the request-URI (when the DAV:ordering-type could not be
     * modified) or URIs of collection members to be repositioned (when
     * an individual positioning request expressed as DAV:order-member
     * could not be fulfilled) if any problems are encountered.
     *
     * Preconditions:
     *
     * (DAV:collection-must-be-ordered): see Section 6.1.
     *
     * (DAV:segment-must-identify-member): see Section 6.1.
     *
     * Postconditions:
     *
     * (DAV:ordering-type-set): if the request body contained a
     * DAV:ordering-type element, the request MUST have set the
     * DAV:ordering-type property of the collection to the value
     * specified in the request.
     *
     * (DAV:ordering-modified): if the request body contained DAV:order-
     * member elements, the request MUST have set the ordering of
     * internal member URIs in the collection identified by the request-
     * URI based upon the instructions in the DAV:order-member elements.
     *
     * Whitehead, J., & Reschke, J.
     *
     * Safe: no
     * Idempotent: yes.
     *
     * @see https://tools.ietf.org/html/rfc3648#section-7
     */
    public const ORDERPATCH = 'ORDERPATCH';
}
