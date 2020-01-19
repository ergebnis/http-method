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
 * @see https://tools.ietf.org/html/rfc5789
 */
interface Rfc5789 extends Status\ProposedStandard
{
    /**
     * The PATCH method requests that a set of changes described in the
     * request entity be applied to the resource identified by the Request-
     * URI.  The set of changes is represented in a format called a "patch
     * document" identified by a media type.  If the Request-URI does not
     * point to an existing resource, the server MAY create a new resource,
     * depending on the patch document type (whether it can logically modify
     * a null resource) and permissions, etc.
     *
     * The difference between the PUT and PATCH requests is reflected in the
     * way the server processes the enclosed entity to modify the resource
     * identified by the Request-URI.  In a PUT request, the enclosed entity
     * is considered to be a modified version of the resource stored on the
     * origin server, and the client is requesting that the stored version
     * be replaced.  With PATCH, however, the enclosed entity contains a set
     * of instructions describing how a resource currently residing on the
     * origin server should be modified to produce a new version.  The PATCH
     * method affects the resource identified by the Request-URI, and it
     * also MAY have side effects on other resources; i.e., new resources
     * may be created, or existing ones modified, by the application of a
     * PATCH.
     *
     * PATCH is neither safe nor idempotent as defined by [RFC2616], Section
     * 9.1.
     *
     * A PATCH request can be issued in such a way as to be idempotent,
     * which also helps prevent bad outcomes from collisions between two
     * PATCH requests on the same resource in a similar time frame.
     * Collisions from multiple PATCH requests may be more dangerous than
     * PUT collisions because some patch formats need to operate from a
     * known base-point or else they will corrupt the resource.  Clients
     * using this kind of patch application SHOULD use a conditional request
     * such that the request will fail if the resource has been updated
     * since the client last accessed the resource.  For example, the client
     * can use a strong ETag [RFC2616] in an If-Match header on the PATCH
     * request.
     *
     * There are also cases where patch formats do not need to operate from
     * a known base-point (e.g., appending text lines to log files, or non-
     * colliding rows to database tables), in which case the same care in
     * client requests is not needed.
     *
     * The server MUST apply the entire set of changes atomically and never
     * provide (e.g., in response to a GET during this operation) a
     * partially modified representation.  If the entire patch document
     * cannot be successfully applied, then the server MUST NOT apply any of
     * the changes.  The determination of what constitutes a successful
     * PATCH can vary depending on the patch document and the type of
     * resource(s) being modified.  For example, the common 'diff' utility
     * can generate a patch document that applies to multiple files in a
     * directory hierarchy.  The atomicity requirement holds for all
     * directly affected files.  See "Error Handling", Section 2.2, for
     * details on status codes and possible error conditions.
     *
     * If the request passes through a cache and the Request-URI identifies
     * one or more currently cached entities, those entries SHOULD be
     * treated as stale.  A response to this method is only cacheable if it
     * contains explicit freshness information (such as an Expires header or
     * "Cache-Control: max-age" directive) as well as the Content-Location
     * header matching the Request-URI, indicating that the PATCH response
     * body is a resource representation.  A cached PATCH response can only
     * be used to respond to subsequent GET and HEAD requests; it MUST NOT
     * be used to respond to other methods (in particular, PATCH).
     *
     * Note that entity-headers contained in the request apply only to the
     * contained patch document and MUST NOT be applied to the resource
     * being modified.  Thus, a Content-Language header could be present on
     * the request, but it would only mean (for whatever that's worth) that
     * the patch document had a language.  Servers SHOULD NOT store such
     * headers except as trace information, and SHOULD NOT use such header
     * values the same way they might be used on PUT requests.  Therefore,
     * this document does not specify a way to modify a document's Content-
     * Type or Content-Language value through headers, though a mechanism
     * could well be designed to achieve this goal through a patch document.
     *
     * There is no guarantee that a resource can be modified with PATCH.
     * Further, it is expected that different patch document formats will be
     * appropriate for different types of resources and that no single
     * format will be appropriate for all types of resources.  Therefore,
     * there is no single default patch document format that implementations
     * are required to support.  Servers MUST ensure that a received patch
     * document is appropriate for the type of resource identified by the
     * Request-URI.
     *
     * Clients need to choose when to use PATCH rather than PUT.  For
     * example, if the patch document size is larger than the size of the
     * new resource data that would be used in a PUT, then it might make
     * sense to use PUT instead of PATCH.  A comparison to POST is even more
     * difficult, because POST is used in widely varying ways and can
     * encompass PUT and PATCH-like operations if the server chooses.  If
     * the operation does not modify the resource identified by the Request-
     * URI in a predictable way, POST should be considered instead of PATCH
     * or PUT.
     *
     * Dusseault, L., & Snell, J.
     *
     * Safe: no
     * Idempotent: no
     *
     * @see https://tools.ietf.org/html/rfc5789#section-2
     */
    public const PATCH = 'PATCH';
}
