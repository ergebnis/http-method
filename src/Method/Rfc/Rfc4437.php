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
 * @see https://tools.ietf.org/html/rfc4437
 */
interface Rfc4437 extends Status\Experimental
{
    /**
     * The MKREDIRECTREF method requests the creation of a redirect
     * reference resource.
     *
     * If a MKREDIRECTREF request fails, the server state preceding the
     * request MUST be restored.
     *
     * Responses from a MKREDIRECTREF request MUST NOT be cached, as
     * MKREDIRECTREF has non-idempotent and non-safe semantics (see
     * [RFC2616], Section 9.1).
     *
     * Marshalling
     *
     * The request body MUST be a DAV:mkredirectref XML element.
     *
     * <!ELEMENT mkredirectref (reftarget, redirect-lifetime?)>
     * <!ELEMENT reftarget (href)>
     * <!ELEMENT redirect-lifetime (permanent | temporary)>
     * <!ELEMENT permanent EMPTY>
     * <!ELEMENT temporary EMPTY>
     *
     * The DAV:href element is defined in [RFC2518] (Section 12.3) and
     * MUST contain either a URI or a relative-ref (see [RFC3986],
     * Sections 3 and 4.2).
     *
     * If no DAV:redirect-lifetime element is specified, the server MUST
     * behave as if a value of DAV:temporary was specified.
     *
     * If the request succeeds, the server MUST return 201 (Created)
     * status.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:mkredirectref-response XML element.  Note that this
     * document does not define any elements for the MKREDIRECTREF
     * response body, but the DAV:mkredirectref-response element is
     * defined to ensure interoperability between future extensions that
     * do define elements for the response body.
     *
     * <!ELEMENT mkredirectref-response ANY>
     *
     * Preconditions
     *
     * (DAV:resource-must-be-null): A resource MUST NOT exist at the
     * Request-URI.
     *
     * (DAV:parent-resource-must-be-non-null): The Request-URI minus the
     * last past segment MUST identify a collection.
     *
     * (DAV:name-allowed): The last segment of the Request-URI is
     * available for use as a resource name.
     *
     * (DAV:locked-update-allowed): If the collection identified by the
     * Request-URI minus the last path segment is write-locked, then the
     * appropriate token MUST be specified in an If request header.
     *
     * (DAV:redirect-lifetime-supported): If the request body contains a
     * DAV:redirect-lifetime element, the server MUST support the
     * specified lifetime.  Support for DAV:temporary is REQUIRED, while
     * support for DAV:permanent is OPTIONAL.
     *
     * (DAV:legal-reftarget): The specified is a legal URI or relative-
     * ref.
     *
     * Postconditions
     *
     * (DAV:new-redirectref): a new redirect reference resource is
     * created whose DAV:reftarget property has the value specified in
     * the request body.
     *
     * Whitehead, J., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4437#section-6
     */
    public const MKREDIRECTREF = 'MKREDIRECTREF';

    /**
     * The UPDATEREDIRECTREF method requests the update of a redirect
     * reference resource.
     *
     * If a UPDATEREDIRECTREF request fails, the server state preceding the
     * request MUST be restored.
     *
     * Responses from a UPDATEREDIRECTREF request MUST NOT be cached, as
     * UPDATEREDIRECTREF has non-safe semantics (see [RFC2616], Section
     * 9.1).
     *
     * Marshalling
     *
     * The request body MUST be a DAV:updateredirectref XML element.
     *
     * <!ELEMENT updateredirectref (reftarget?, redirect-lifetime?)>
     *
     * See Section 6 for a definition of DAV:reftarget and DAV:redirect-
     * lifetime.
     *
     * If no DAV:reftarget element is specified, the server MUST NOT
     * change the target of the redirect reference.
     *
     * If no DAV:redirect-lifetime element is specified, the server MUST
     * NOT change the lifetime of the redirect reference.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:updateredirectref-response XML element.  Note that this
     * document does not define any elements for the UPDATEREDIRECTREF
     * response body, but the DAV:updateredirectref-response element is
     * defined to ensure interoperability between future extensions that
     * do define elements for the response body.
     *
     * <!ELEMENT updateredirectref-response ANY>
     *
     * Preconditions
     *
     * (DAV:locked-update-allowed): if the resource is write-locked, then
     * the appropriate token MUST be specified in an If request header.
     *
     * (DAV:must-be-redirectref): the resource identified by the
     * Request-URI must be a redirect reference resource as defined by
     * this specification.
     *
     * (DAV:redirect-lifetime-supported): see Section 6.
     *
     * (DAV:redirect-lifetime-update-supported): servers MAY support
     * changing the DAV:redirect-lifetime property; if they don't, this
     * condition code can be used to signal failure.
     *
     * (DAV:legal-reftarget): see Section 6.
     *
     * Postconditions
     *
     * (DAV:redirectref-updated): the DAV:reftarget and DAV:redirect-
     * lifetime properties of the redirect reference have been updated
     * accordingly.
     *
     * Whitehead, J., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4437#section-7
     */
    public const UPDATEREDIRECTREF = 'UPDATEREDIRECTREF';
}
