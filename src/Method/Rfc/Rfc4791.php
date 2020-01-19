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
 * @see https://tools.ietf.org/html/rfc4791
 */
interface Rfc4791 extends Status\ProposedStandard
{
    /**
     * An HTTP request using the MKCALENDAR method creates a new calendar
     * collection resource.  A server MAY restrict calendar collection
     * creation to particular collections.
     *
     * Support for MKCALENDAR on the server is only RECOMMENDED and not
     * REQUIRED because some calendar stores only support one calendar per
     * user (or principal), and those are typically pre-created for each
     * account.  However, servers and clients are strongly encouraged to
     * support MKCALENDAR whenever possible to allow users to create
     * multiple calendar collections to help organize their data better.
     *
     * Clients SHOULD use the DAV:displayname property for a human-readable
     * name of the calendar.  Clients can either specify the value of the
     * DAV:displayname property in the request body of the MKCALENDAR
     * request, or alternatively issue a PROPPATCH request to change the
     * DAV:displayname property to the appropriate value immediately after
     * issuing the MKCALENDAR request.  Clients SHOULD NOT set the DAV:
     * displayname property to be the same as any other calendar collection
     * at the same URI "level".  When displaying calendar collections to
     * users, clients SHOULD check the DAV:displayname property and use that
     * value as the name of the calendar.  In the event that the DAV:
     * displayname property is empty, the client MAY use the last part of
     * the calendar collection URI as the name; however, that path segment
     * may be "opaque" and not represent any meaningful human-readable text.
     *
     * If a MKCALENDAR request fails, the server state preceding the request
     * MUST be restored.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a CALDAV:mkcalendar XML
     * element.  Instruction processing MUST occur in the order
     * instructions are received (i.e., from top to bottom).
     * Instructions MUST either all be executed or none executed.  Thus,
     * if any error occurs during processing, all executed instructions
     * MUST be undone and a proper error result returned.  Instruction
     * processing details can be found in the definition of the DAV:set
     * instruction in Section 12.13.2 of [RFC2518].
     *
     * <!ELEMENT mkcalendar (DAV:set)>
     *
     * If a response body for a successful request is included, it MUST
     * be a CALDAV:mkcalendar-response XML element.
     *
     * <!ELEMENT mkcalendar-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:resource-must-be-null): A resource MUST NOT exist at the
     * Request-URI;
     *
     * (CALDAV:calendar-collection-location-ok): The Request-URI MUST
     * identify a location where a calendar collection can be created;
     *
     * (CALDAV:valid-calendar-data): The time zone specified in the
     * CALDAV:calendar-timezone property MUST be a valid iCalendar object
     * containing a single valid VTIMEZONE component;
     *
     * (DAV:needs-privilege): The DAV:bind privilege MUST be granted to
     * the current user on the parent collection of the Request-URI.
     *
     * Postconditions:
     *
     * (CALDAV:initialize-calendar-collection): A new calendar collection
     * exists at the Request-URI.  The DAV:resourcetype of the calendar
     * collection MUST contain both DAV:collection and CALDAV:calendar
     * XML elements.
     *
     * Daboo, C., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4791#section-5.3.1
     */
    public const MKCALENDAR = 'MKCALENDAR';
}
