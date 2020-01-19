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
 * @see https://tools.ietf.org/html/rfc3744
 */
interface Rfc3744 extends Status\ProposedStandard
{
    /**
     * The ACL method modifies the access control list (which can be read
     * via the DAV:acl property) of a resource.  Specifically, the ACL
     * method only permits modification to ACEs that are not inherited, and
     * are not protected.  An ACL method invocation modifies all non-
     * inherited and non-protected ACEs in a resource's access control list
     * to exactly match the ACEs contained within in the DAV:acl XML element
     * (specified in Section 5.5) of the request body.  An ACL request body
     * MUST contain only one DAV:acl XML element.  Unless the non-inherited
     * and non-protected ACEs of the DAV:acl property of the resource can be
     * updated to be exactly the value specified in the ACL request, the ACL
     * request MUST fail.
     *
     * It is possible that the ACEs visible to the current user in the
     * DAV:acl property may only be a portion of the complete set of ACEs on
     * that resource.  If this is the case, an ACL request only modifies the
     * set of ACEs visible to the current user, and does not affect any
     * non-visible ACE.
     *
     * In order to avoid overwriting DAV:acl changes by another client, a
     * client SHOULD acquire a WebDAV lock on the resource before retrieving
     * the DAV:acl property of a resource that it intends on updating.
     *
     * Implementation Note: Two common operations are to add or remove an
     * ACE from an existing access control list.  To accomplish this, a
     * client uses the PROPFIND method to retrieve the value of the
     * DAV:acl property, then parses the returned access control list to
     * remove all inherited and protected ACEs (these ACEs are tagged
     * with the DAV:inherited and DAV:protected XML elements).  In the
     * remaining set of non-inherited, non-protected ACEs, the client can
     * add or remove one or more ACEs before submitting the final ACE set
     * in the request body of the ACL method.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes.
     *
     * @see https://tools.ietf.org/html/rfc3744#section-8.1
     */
    public const ACL = 'ACL';
}
