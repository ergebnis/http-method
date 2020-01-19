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
 * @see https://tools.ietf.org/html/rfc5842
 */
interface Rfc5842 extends Status\Experimental
{
    /**
     * The BIND method modifies the collection identified by the Request-
     * URI, by adding a new binding from the segment specified in the BIND
     * body to the resource identified in the BIND body.
     *
     * If a server cannot guarantee the integrity of the binding, the BIND
     * request MUST fail.  Note that it is especially difficult to maintain
     * the integrity of cross-server bindings.  Unless the server where the
     * resource resides knows about all bindings on all servers to that
     * resource, it may unwittingly destroy the resource or make it
     * inaccessible without notifying another server that manages a binding
     * to the resource.  For example, if server A permits the creation of a
     * binding to a resource on server B, server A must notify server B
     * about its binding and must have an agreement with B that B will not
     * destroy the resource while A's binding exists.  Otherwise, server B
     * may receive a DELETE request that it thinks removes the last binding
     * to the resource and destroy the resource while A's binding still
     * exists.  The precondition DAV:cross-server-binding is defined below
     * for cases where servers fail cross-server BIND requests because they
     * cannot guarantee the integrity of cross-server bindings.
     *
     * By default, if there already is a binding for the specified segment
     * in the collection, the new binding replaces the existing binding.
     * This default binding replacement behavior can be overridden using the
     * Overwrite header defined in Section 10.6 of [RFC4918].
     *
     * If a BIND request fails, the server state preceding the request MUST
     * be restored.  This method is unsafe and idempotent (see [RFC2616],
     * Section 9.1).
     *
     * Marshalling:
     *
     * The request MAY include an Overwrite header.
     *
     * The request body MUST be a DAV:bind XML element.
     *
     * <!ELEMENT bind (segment, href)>
     *
     * If the request succeeds, the server MUST return 201 (Created) when
     * a new binding was created and 200 (OK) or 204 (No Content) when an
     * existing binding was replaced.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:bind-response XML element.  Note that this document does
     * not define any elements for the BIND response body, but the DAV:
     * bind-response element is defined to ensure interoperability
     * between future extensions that do define elements for the BIND
     * response body.
     *
     * <!ELEMENT bind-response ANY>
     *
     * Preconditions:
     *
     * (DAV:bind-into-collection): The Request-URI MUST identify a
     * collection.
     *
     * (DAV:bind-source-exists): The DAV:href element MUST identify a
     * resource.
     *
     * (DAV:binding-allowed): The resource identified by the DAV:href
     * supports multiple bindings to it.
     *
     * (DAV:cross-server-binding): If the resource identified by the DAV:
     * href element in the request body is on another server from the
     * collection identified by the Request-URI, the server MUST support
     * cross-server bindings (servers that do not support cross-server
     * bindings can use this condition code to signal the client exactly
     * why the request failed).
     *
     * (DAV:name-allowed): The name specified by the DAV:segment is
     * available for use as a new binding name.
     *
     * (DAV:can-overwrite): If the collection already contains a binding
     * with the specified path segment, and if an Overwrite header is
     * included, the value of the Overwrite header MUST be "T".
     *
     * (DAV:cycle-allowed): If the DAV:href element identifies a
     * collection, and if the Request-URI identifies a collection that is
     * a member of that collection, the server MUST support cycles in the
     * URI namespace (servers that do not support cycles can use this
     * condition code to signal the client exactly why the request
     * failed).
     *
     * (DAV:locked-update-allowed): If the collection identified by the
     * Request-URI is write-locked, then the appropriate token MUST be
     * specified in an If request header.
     *
     * (DAV:locked-overwrite-allowed): If the collection already contains
     * a binding with the specified path segment, and if that binding is
     * protected by a write lock, then the appropriate token MUST be
     * specified in an If request header.
     *
     * Postconditions:
     *
     * (DAV:new-binding): The collection MUST have a binding that maps
     * the segment specified in the DAV:segment element in the request
     * body to the resource identified by the DAV:href element in the
     * request body.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc5842#section-4
     */
    public const BIND = 'BIND';

    /**
     * The REBIND method removes a binding to a resource from a collection,
     * and adds a binding to that resource into the collection identified by
     * the Request-URI.  The request body specifies the binding to be added
     * (segment) and the old binding to be removed (href).  It is
     * effectively an atomic form of a MOVE request, and MUST be treated the
     * same way as MOVE for the purpose of determining access permissions.
     *
     * If a REBIND request fails, the server state preceding the request
     * MUST be restored.  This method is unsafe and idempotent (see
     * [RFC2616], Section 9.1).
     *
     * Marshalling:
     *
     * The request MAY include an Overwrite header.
     *
     * The request body MUST be a DAV:rebind XML element.
     *
     * <!ELEMENT rebind (segment, href)>
     *
     * If the request succeeds, the server MUST return 201 (Created) when
     * a new binding was created and 200 (OK) or 204 (No Content) when an
     * existing binding was replaced.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:rebind-response XML element.  Note that this document
     * does not define any elements for the REBIND response body, but the
     * DAV:rebind-response element is defined to ensure interoperability
     * between future extensions that do define elements for the REBIND
     * response body.
     *
     * <!ELEMENT rebind-response ANY>
     *
     * Preconditions:
     *
     * (DAV:rebind-into-collection): The Request-URI MUST identify a
     * collection.
     *
     * (DAV:rebind-source-exists): The DAV:href element MUST identify a
     * resource.
     *
     * (DAV:cross-server-binding): If the resource identified by the DAV:
     * href element in the request body is on another server from the
     * collection identified by the Request-URI, the server MUST support
     * cross-server bindings (servers that do not support cross-server
     * bindings can use this condition code to signal the client exactly
     * why the request failed).
     *
     * (DAV:name-allowed): The name specified by the DAV:segment is
     * available for use as a new binding name.
     *
     * (DAV:can-overwrite): If the collection already contains a binding
     * with the specified path segment, and if an Overwrite header is
     * included, the value of the Overwrite header MUST be "T".
     *
     * (DAV:cycle-allowed): If the DAV:href element identifies a
     * collection, and if the Request-URI identifies a collection that is
     * a member of that collection, the server MUST support cycles in the
     * URI namespace (servers that do not support cycles can use this
     * condition code to signal the client exactly why the request
     * failed).
     *
     * (DAV:locked-update-allowed): If the collection identified by the
     * Request-URI is write-locked, then the appropriate token MUST be
     * specified in the request.
     *
     * (DAV:protected-url-modification-allowed): If the collection
     * identified by the Request-URI already contains a binding with the
     * specified path segment, and if that binding is protected by a
     * write lock, then the appropriate token MUST be specified in the
     * request.
     *
     * (DAV:locked-source-collection-update-allowed): If the collection
     * identified by the parent collection prefix of the DAV:href URI is
     * write-locked, then the appropriate token MUST be specified in the
     * request.
     *
     * (DAV:protected-source-url-deletion-allowed): If the DAV:href URI
     * is protected by a write lock, then the appropriate token MUST be
     * specified in the request.
     *
     * Postconditions:
     *
     * (DAV:new-binding): The collection MUST have a binding that maps
     * the segment specified in the DAV:segment element in the request
     * body, to the resource that was identified by the DAV:href element
     * in the request body.
     *
     * (DAV:binding-deleted): The URL specified in the DAV:href element
     * in the request body MUST NOT be mapped to a resource.
     *
     * (DAV:lock-deleted): If the URL specified in the DAV:href element
     * in the request body was protected by a write lock at the time of
     * the request, that write lock must have been deleted by the
     * request.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc5842#section-6
     */
    public const REBIND = 'REBIND';

    /**
     * The UNBIND method modifies the collection identified by the Request-
     * URI by removing the binding identified by the segment specified in
     * the UNBIND body.
     *
     * Once a resource is unreachable by any URI mapping, the server MAY
     * reclaim system resources associated with that resource.  If UNBIND
     * removes a binding to a resource, but there remain URI mappings to
     * that resource, the server MUST NOT reclaim system resources
     * associated with the resource.
     *
     * If an UNBIND request fails, the server state preceding the request
     * MUST be restored.  This method is unsafe and idempotent (see
     * [RFC2616], Section 9.1).
     *
     * Marshalling:
     *
     * The request body MUST be a DAV:unbind XML element.
     *
     * <!ELEMENT unbind (segment)>
     *
     * If the request succeeds, the server MUST return 200 (OK) or 204
     * (No Content) when the binding was successfully deleted.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:unbind-response XML element.  Note that this document
     * does not define any elements for the UNBIND response body, but the
     * DAV:unbind-response element is defined to ensure interoperability
     * between future extensions that do define elements for the UNBIND
     * response body.
     *
     * <!ELEMENT unbind-response ANY>
     *
     * Preconditions:
     *
     * (DAV:unbind-from-collection): The Request-URI MUST identify a
     * collection.
     *
     * (DAV:unbind-source-exists): The DAV:segment element MUST identify
     * a binding in the collection identified by the Request-URI.
     *
     * (DAV:locked-update-allowed): If the collection identified by the
     * Request-URI is write-locked, then the appropriate token MUST be
     * specified in the request.
     *
     * (DAV:protected-url-deletion-allowed): If the binding identified by
     * the segment is protected by a write lock, then the appropriate
     * token MUST be specified in the request.
     *
     * Postconditions:
     *
     * (DAV:binding-deleted): The collection MUST NOT have a binding for
     * the segment specified in the DAV:segment element in the request
     * body.
     *
     * (DAV:lock-deleted): If the internal member URI of the binding
     * specified by the Request-URI and the DAV:segment element in the
     * request body was protected by a write lock at the time of the
     * request, that write lock must have been deleted by the request.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc5842#section-5
     */
    public const UNBIND = 'UNBIND';
}
