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
 * @see https://tools.ietf.org/html/rfc4918
 */
interface Rfc4918 extends Status\ProposedStandard
{
    /**
     * The COPY method creates a duplicate of the source resource identified
     * by the Request-URI, in the destination resource identified by the URI
     * in the Destination header.  The Destination header MUST be present.
     * The exact behavior of the COPY method depends on the type of the
     * source resource.
     *
     * All WebDAV-compliant resources MUST support the COPY method.
     * However, support for the COPY method does not guarantee the ability
     * to copy a resource.  For example, separate programs may control
     * resources on the same server.  As a result, it may not be possible to
     * copy a resource to a location that appears to be on the same server.
     *
     * This method is idempotent, but not safe (see Section 9.1 of
     * [RFC2616]).  Responses to this method MUST NOT be cached.
     *
     * Dusseault, L.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.8
     */
    public const COPY = 'COPY';

    /**
     * The following sections describe the LOCK method, which is used to
     * take out a lock of any access type and to refresh an existing lock.
     * These sections on the LOCK method describe only those semantics that
     * are specific to the LOCK method and are independent of the access
     * type of the lock being requested.
     *
     * Any resource that supports the LOCK method MUST, at minimum, support
     * the XML request and response formats defined herein.
     *
     * This method is neither idempotent nor safe (see Section 9.1 of
     * [RFC2616]).  Responses to this method MUST NOT be cached.
     *
     * Dusseault, L.
     *
     * Safe: no
     * Idempotent: no
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.10
     */
    public const LOCK = 'LOCK';

    /**
     * MKCOL creates a new collection resource at the location specified by
     * the Request-URI.  If the Request-URI is already mapped to a resource,
     * then the MKCOL MUST fail.  During MKCOL processing, a server MUST
     * make the Request-URI an internal member of its parent collection,
     * unless the Request-URI is "/".  If no such ancestor exists, the
     * method MUST fail.  When the MKCOL operation creates a new collection
     * resource, all ancestors MUST already exist, or the method MUST fail
     * with a 409 (Conflict) status code.  For example, if a request to
     * create collection /a/b/c/d/ is made, and /a/b/c/ does not exist, the
     * request must fail.
     *
     * When MKCOL is invoked without a request body, the newly created
     * collection SHOULD have no members.
     *
     * A MKCOL request message may contain a message body.  The precise
     * behavior of a MKCOL request when the body is present is undefined,
     * but limited to creating collections, members of a collection, bodies
     * of members, and properties on the collections or members.  If the
     * server receives a MKCOL request entity type it does not support or
     * understand, it MUST respond with a 415 (Unsupported Media Type)
     * status code.  If the server decides to reject the request based on
     * the presence of an entity or the type of an entity, it should use the
     * 415 (Unsupported Media Type) status code.
     *
     * This method is idempotent, but not safe (see Section 9.1 of
     * [RFC2616]).  Responses to this method MUST NOT be cached.
     *
     * Dusseault, L.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.3
     */
    public const MKCOL = 'MKCOL';

    /**
     * The MOVE operation on a non-collection resource is the logical
     * equivalent of a copy (COPY), followed by consistency maintenance
     * processing, followed by a delete of the source, where all three
     * actions are performed in a single operation.  The consistency
     * maintenance step allows the server to perform updates caused by the
     * move, such as updating all URLs, other than the Request-URI that
     * identifies the source resource, to point to the new destination
     * resource.
     *
     * The Destination header MUST be present on all MOVE methods and MUST
     * follow all COPY requirements for the COPY part of the MOVE method.
     * All WebDAV-compliant resources MUST support the MOVE method.
     *
     * Support for the MOVE method does not guarantee the ability to move a
     * resource to a particular destination.  For example, separate programs
     * may actually control different sets of resources on the same server.
     * Therefore, it may not be possible to move a resource within a
     * namespace that appears to belong to the same server.
     *
     * If a resource exists at the destination, the destination resource
     * will be deleted as a side-effect of the MOVE operation, subject to
     * the restrictions of the Overwrite header.
     *
     * This method is idempotent, but not safe (see Section 9.1 of
     * [RFC2616]).  Responses to this method MUST NOT be cached.
     *
     * Dusseault, L.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.9
     */
    public const MOVE = 'MOVE';

    /**
     * The PROPFIND method retrieves properties defined on the resource
     * identified by the Request-URI, if the resource does not have any
     * internal members, or on the resource identified by the Request-URI
     * and potentially its member resources, if the resource is a collection
     * that has internal member URLs.  All DAV-compliant resources MUST
     * support the PROPFIND method and the propfind XML element
     * (Section 14.20) along with all XML elements defined for use with that
     * element.
     *
     * A client MUST submit a Depth header with a value of "0", "1", or
     * "infinity" with a PROPFIND request.  Servers MUST support "0" and "1"
     * depth requests on WebDAV-compliant resources and SHOULD support
     * "infinity" requests.  In practice, support for infinite-depth
     * requests MAY be disabled, due to the performance and security
     * concerns associated with this behavior.  Servers SHOULD treat a
     * request without a Depth header as if a "Depth: infinity" header was
     * included.
     *
     * A client may submit a 'propfind' XML element in the body of the
     * request method describing what information is being requested.  It is
     * possible to:
     *
     * - Request particular property values, by naming the properties
     *   desired within the 'prop' element (the ordering of properties in
     *   here MAY be ignored by the server),
     *
     * - Request property values for those properties defined in this
     *   specification (at a minimum) plus dead properties, by using the
     *   'allprop' element (the 'include' element can be used with
     *   'allprop' to instruct the server to also include additional live
     *   properties that may not have been returned otherwise),
     *
     * - Request a list of names of all the properties defined on the
     *   resource, by using the 'propname' element.
     *
     * A client may choose not to submit a request body.  An empty PROPFIND
     * request body MUST be treated as if it were an 'allprop' request.
     *
     * Note that 'allprop' does not return values for all live properties.
     * WebDAV servers increasingly have expensively-calculated or lengthy
     * properties (see [RFC3253] and [RFC3744]) and do not return all
     * properties already.  Instead, WebDAV clients can use propname
     * requests to discover what live properties exist, and request named
     * properties when retrieving values.  For a live property defined
     * elsewhere, that definition can specify whether or not that live
     * property would be returned in 'allprop' requests.
     *
     * All servers MUST support returning a response of content type text/
     * xml or application/xml that contains a multistatus XML element that
     * describes the results of the attempts to retrieve the various
     * properties.
     *
     * If there is an error retrieving a property, then a proper error
     * result MUST be included in the response.  A request to retrieve the
     * value of a property that does not exist is an error and MUST be noted
     * with a 'response' XML element that contains a 404 (Not Found) status
     * value.
     *
     * Consequently, the 'multistatus' XML element for a collection resource
     * MUST include a 'response' XML element for each member URL of the
     * collection, to whatever depth was requested.  It SHOULD NOT include
     * any 'response' elements for resources that are not WebDAV-compliant.
     * Each 'response' element MUST contain an 'href' element that contains
     * the URL of the resource on which the properties in the prop XML
     * element are defined.  Results for a PROPFIND on a collection resource
     * are returned as a flat list whose order of entries is not
     * significant.  Note that a resource may have only one value for a
     * property of a given name, so the property may only show up once in
     * PROPFIND responses.
     *
     * Properties may be subject to access control.  In the case of
     * 'allprop' and 'propname' requests, if a principal does not have the
     * right to know whether a particular property exists, then the property
     * MAY be silently excluded from the response.
     *
     * Some PROPFIND results MAY be cached, with care, as there is no cache
     * validation mechanism for most properties.  This method is both safe
     * and idempotent (see Section 9.1 of [RFC2616]).
     *
     * Dusseault, L.
     *
     * Safe: yes
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.1
     */
    public const PROPFIND = 'PROPFIND';

    /**
     * The PROPPATCH method processes instructions specified in the request
     * body to set and/or remove properties defined on the resource
     * identified by the Request-URI.
     *
     * All DAV-compliant resources MUST support the PROPPATCH method and
     * MUST process instructions that are specified using the
     * propertyupdate, set, and remove XML elements.  Execution of the
     * directives in this method is, of course, subject to access control
     * constraints.  DAV-compliant resources SHOULD support the setting of
     * arbitrary dead properties.
     *
     * The request message body of a PROPPATCH method MUST contain the
     * propertyupdate XML element.
     *
     * Servers MUST process PROPPATCH instructions in document order (an
     * exception to the normal rule that ordering is irrelevant).
     * Instructions MUST either all be executed or none executed.  Thus, if
     * any error occurs during processing, all executed instructions MUST be
     * undone and a proper error result returned.  Instruction processing
     * details can be found in the definition of the set and remove
     * instructions in Sections 14.23 and 14.26.
     *
     * If a server attempts to make any of the property changes in a
     * PROPPATCH request (i.e., the request is not rejected for high-level
     * errors before processing the body), the response MUST be a Multi-
     * Status response as described in Section 9.2.1.
     *
     * This method is idempotent, but not safe (see Section 9.1 of
     * [RFC2616]).  Responses to this method MUST NOT be cached.
     *
     * Dusseault, L.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.2
     */
    public const PROPPATCH = 'PROPPATCH';

    /**
     * The UNLOCK method removes the lock identified by the lock token in
     * the Lock-Token request header.  The Request-URI MUST identify a
     * resource within the scope of the lock.
     *
     * Note that use of the Lock-Token header to provide the lock token is
     * not consistent with other state-changing methods, which all require
     * an If header with the lock token.  Thus, the If header is not needed
     * to provide the lock token.  Naturally, when the If header is present,
     * it has its normal meaning as a conditional header.
     *
     * For a successful response to this method, the server MUST delete the
     * lock entirely.
     *
     * If all resources that have been locked under the submitted lock token
     * cannot be unlocked, then the UNLOCK request MUST fail.
     *
     * A successful response to an UNLOCK method does not mean that the
     * resource is necessarily unlocked.  It means that the specific lock
     * corresponding to the specified token no longer exists.
     *
     * Any DAV-compliant resource that supports the LOCK method MUST support
     * the UNLOCK method.
     *
     * This method is idempotent, but not safe (see Section 9.1 of
     * [RFC2616]).  Responses to this method MUST NOT be cached.
     *
     * Dusseault, L.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc4918#section-9.11
     */
    public const UNLOCK = 'UNLOCK';
}
