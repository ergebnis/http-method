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
 * @see http://www.iana.org/go/rfc3253
 */
interface Rfc3253 extends Status\ProposedStandard
{
    /**
     * A collection can be placed under baseline control with a
     * BASELINE-CONTROL request.  When a collection is placed under baseline
     * control, the DAV:version-controlled-configuration property of the
     * collection is set to identify a new version-controlled configuration.
     * This version-controlled configuration can be checked out and then
     * checked in to create a new baseline for that collection.
     *
     * If a baseline is specified in the request body, the DAV:checked-in
     * version of the new version-controlled configuration will be that
     * baseline, and the collection is initialized to contain version-
     * controlled members whose DAV:checked-in versions and relative names
     * are determined by the specified baseline.
     *
     * If no baseline is specified, a new baseline history is created
     * containing a baseline that captures the state of the version-
     * controlled members of the collection, and the DAV:checked-in version
     * of the version-controlled configuration will be that baseline.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:baseline-control
     * XML element.
     *
     * <!ELEMENT baseline-control ANY>
     * ANY value: A sequence of elements with at most one DAV:baseline
     * element.
     *
     * <!ELEMENT baseline (href)>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:baseline-control-response XML element.
     *
     * <!ELEMENT baseline-control-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:version-controlled-configuration-must-not-exist): The
     * DAV:version-controlled-configuration property of the collection
     * identified by the request-URL MUST not exist.
     *
     * (DAV:must-be-baseline): The DAV:href of the DAV:baseline element
     * in the request body MUST identify a baseline.
     *
     * (DAV:must-have-no-version-controlled-members): If a DAV:baseline
     * element is specified in the request body, the collection
     * identified by the request-URL MUST have no version-controlled
     * members.
     *
     * (DAV:one-baseline-controlled-collection-per-history-per-
     * workspace):  If the request-URL identifies a workspace or a member
     * of a workspace, and if a baseline is specified in a DAV:baseline
     * element in the request body, then there MUST NOT be another
     * collection in that workspace whose DAV:version-controlled-
     * configuration property identifies a version-controlled
     * configuration for the baseline history of that baseline.
     *
     * Postconditions:
     *
     * (DAV:create-version-controlled-configuration): A new version-
     * controlled configuration is created, whose DAV:baseline-
     * controlled-collection property identifies the collection.
     *
     * (DAV:reference-version-controlled-configuration): The
     * DAV:version-controlled-configuration of the collection identifies
     * the new version-controlled configuration.
     *
     * (DAV:select-existing-baseline): If the request body specifies a
     * baseline, the DAV:checked-in property of the new version-
     * controlled configuration MUST have been set to identify this
     * baseline.  A version-controlled member of the collection will be
     * created for each version in the baseline, where the version-
     * controlled member will have the content and dead properties of
     * that version, and will have the same name relative to the
     * collection as the corresponding version-controlled resource had
     * when the baseline was created.  Any nested collections that are
     * needed to provide the appropriate name for a version-controlled
     * member will be created.
     *
     * (DAV:create-new-baseline): If no baseline is specified in the
     * request body, the request MUST have created a new baseline history
     * at a server-defined URL, and MUST have created a new baseline in
     * that baseline history.  The DAV:baseline-collection of the new
     * baseline MUST identify a collection whose members have the same
     * relative name and DAV:checked-in version as the version-controlled
     * members of the request collection.  The DAV:checked-in property of
     * the new version-controlled configuration MUST identify the new
     * baseline.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-12.6
     */
    public const BASELINE_CONTROL = 'BASELINE_CONTROL';

    /**
     * A CHECKIN request can be applied to a checked-out version-controlled
     * resource to produce a new version whose content and dead properties
     * are copied from the checked-out resource.
     *
     * If a CHECKIN request fails, the server state preceding the request
     * MUST be restored.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:checkin XML
     * element.
     *
     * <!ELEMENT checkin ANY>
     * ANY value: A sequence of elements with at most one
     * DAV:keep-checked-out element and at most one DAV:fork-ok element.
     *
     * <!ELEMENT keep-checked-out EMPTY>
     * <!ELEMENT fork-ok EMPTY>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:checkin-response XML element.
     *
     * <!ELEMENT checkin-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:must-be-checked-out): The request-URL MUST identify a
     * resource with a DAV:checked-out property.
     *
     * (DAV:version-history-is-tree) The versions identified by the
     * DAV:predecessor-set of the checked-out resource MUST be
     * descendants of the root version of the version history for the
     * DAV:checked-out version.
     *
     * (DAV:checkin-fork-forbidden): A CHECKIN request MUST fail if it
     * would cause a version whose DAV:checkin-fork is DAV:forbidden to
     * appear in the DAV:predecessor-set of more than one version.
     *
     * (DAV:checkin-fork-discouraged): A CHECKIN request MUST fail if it
     * would cause a version whose DAV:checkin-fork is DAV:discouraged to
     * appear in the DAV:predecessor-set of more than one version, unless
     * DAV:fork-ok is specified in the request body.
     *
     * Postconditions:
     *
     * (DAV:create-version): The request MUST have created a new version
     * in the version history of the DAV:checked-out version.  The
     * request MUST have allocated a distinct new URL for the new
     * version, and that URL MUST NOT ever identify any resource other
     * than that version. The URL for the new version MUST be returned in
     * a Location response header.
     *
     * (DAV:initialize-version-content-and-properties): The content, dead
     * properties, DAV:resourcetype, and DAV:predecessor-set of the new
     * version MUST be copied from the checked-out resource.  The
     * DAV:version-name of the new version MUST be set to a server-
     * defined value distinct from all other DAV:version-name values of
     * other versions in the same version history.
     *
     * (DAV:checked-in): If the request-URL identifies a version-
     * controlled resource and DAV:keep-checked-out is not specified in
     * the request body, the DAV:checked-out property of the version-
     * controlled resource MUST have been removed and a DAV:checked-in
     * property that identifies the new version MUST have been added.
     *
     * (DAV:keep-checked-out): If DAV:keep-checked-out is specified in
     * the request body, the DAV:checked-out property of the checked-out
     * resource MUST have been updated to identify the new version.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-4.4
     * @see https://tools.ietf.org/html/rfc3253#section-9.4
     */
    public const CHECKIN = 'CHECKIN';

    /**
     * A CHECKOUT request can be applied to a checked-in version-controlled
     * resource to allow modifications to the content and dead properties of
     * that version-controlled resource.
     *
     * If a CHECKOUT request fails, the server state preceding the request
     * MUST be restored.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:checkout XML
     * element.
     *
     * <!ELEMENT checkout ANY>
     *
     * ANY value: A sequence of elements with at most one DAV:fork-ok
     * element.
     *
     * <!ELEMENT fork-ok EMPTY>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:checkout-response XML element.
     *
     * <!ELEMENT checkout-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:must-be-checked-in): If a version-controlled resource is
     * being checked out, it MUST have a DAV:checked-in property.
     *
     * (DAV:checkout-of-version-with-descendant-is-forbidden): If the
     * DAV:checkout-fork property of the version being checked out is
     * DAV:forbidden, the request MUST fail if a version identifies that
     * version in its DAV:predecessor-set.
     *
     * (DAV:checkout-of-version-with-descendant-is-discouraged): If the
     * DAV:checkout-fork property of the version being checked out is
     * DAV:discouraged, the request MUST fail if a version identifies
     * that version in its DAV:predecessor-set unless DAV:fork-ok is
     * specified in the request body.
     *
     * (DAV:checkout-of-checked-out-version-is-forbidden): If the
     * DAV:checkout-fork property of the version being checked out is
     * DAV:forbidden, the request MUST fail if a checked-out resource
     * identifies that version in its DAV:checked-out property.
     *
     * (DAV:checkout-of-checked-out-version-is-discouraged): If the
     * DAV:checkout-fork property of the version being checked out is
     * DAV:discouraged, the request MUST fail if a checked-out resource
     * identifies that version in its DAV:checked-out property unless
     * DAV:fork-ok is specified in the request body.
     *
     * Postconditions:
     *
     * (DAV:is-checked-out): The checked-out resource MUST have a
     * DAV:checked-out property that identifies the DAV:checked-in
     * version preceding the checkout.  The version-controlled resource
     * MUST NOT have a DAV:checked-in property.
     *
     * (DAV:initialize-predecessor-set): The DAV:predecessor-set property
     * of the checked-out resource MUST be initialized to be the
     * DAV:checked-out version.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-4.3
     * @see https://tools.ietf.org/html/rfc3253#section-8.8
     */
    public const CHECKOUT = 'CHECKOUT';

    /**
     * A LABEL request can be applied to a version to modify the labels that
     * select that version.  The case of a label name MUST be preserved when
     * it is stored and retrieved.  When comparing two label names to decide
     * if they match or not, a server SHOULD use a case-sensitive URL-
     * escaped UTF-8 encoded comparison of the two label names.
     *
     * If a LABEL request is applied to a checked in version-controlled
     * resource, the operation MUST be applied to the DAV:checked-in version
     * of that version-controlled resource.
     *
     * Marshalling:
     *
     * The request body MUST be a DAV:label element.
     *
     * <!ELEMENT label ANY>
     * ANY value: A sequence of elements with at most one DAV:add,
     * DAV:set, or DAV:remove element.
     *
     * <!ELEMENT add (label-name)>
     * <!ELEMENT set (label-name)>
     * <!ELEMENT remove (label-name)>
     * <!ELEMENT label-name (#PCDATA)>
     * PCDATA value: string
     *
     * The request MAY include a Label header.
     *
     * The request MAY include a Depth header.  If no Depth header is
     * included, Depth:0 is assumed.  Standard depth semantics apply, and
     * the request is applied to the collection identified by the
     * request-URL and to all members of the collection that satisfy the
     * Depth value.  If a Depth header is included and the request fails
     * on any resource, the response MUST be a 207 Multi-Status that
     * identifies all resources for which the request has failed.
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:label-response XML element.
     *
     * <!ELEMENT label-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:must-be-checked-in): If the request-URL identifies a
     * version-controlled resource, the version-controlled resource MUST
     * be checked in.
     *
     * (DAV:must-select-version-in-history): If a Label request header is
     * included and the request-URL identifies a version-controlled
     * resource, the specified label MUST select a version in the version
     * history of the version-controlled resource.
     *
     * (DAV:add-must-be-new-label): If DAV:add is specified in the
     * request body, the specified label MUST NOT appear in the
     * DAV:label-name-set of any version in the version history of that
     * version-controlled resource.
     *
     * (DAV:label-must-exist): If DAV:remove is specified in the request
     * body, the specified label MUST appear in the DAV:label-name-set of
     * that version.
     *
     * Postconditions:
     *
     * (DAV:add-or-set-label): If DAV:add or DAV:set is specified in the
     * request body, the specified label MUST appear in the DAV:label-
     * name-set of the specified version, and MUST NOT appear in the
     * DAV:label-name-set of any other version in the version history of
     * that version.
     *
     * (DAV:remove-label): If DAV:remove is specified in the request
     * body, the specified label MUST NOT appear in the DAV:label-name-
     * set of any version in the version history of that version.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-8.2
     */
    public const LABEL = 'LABEL';

    /**
     * The MERGE method performs the logical merge of a specified version
     * (the "merge source") into a specified version-controlled resource
     * (the "merge target").  If the merge source is neither an ancestor nor
     * a descendant of the DAV:checked-in or DAV:checked-out version of the
     * merge target, the MERGE checks out the merge target (if it is not
     * already checked out) and adds the URL of the merge source to the
     * DAV:merge-set of the merge target.  It is then the client's
     * responsibility to update the content and dead properties of the
     * checked-out merge target so that it reflects the logical merge of the
     * merge source into the current state of the merge target.  The client
     * indicates that it has completed the update of the merge target, by
     * deleting the merge source URL from the DAV:merge-set of the checked-
     * out merge target, and adding it to the DAV:predecessor-set.  As an
     * error check for a client forgetting to complete a merge, the server
     * MUST fail an attempt to CHECKIN a version-controlled resource with a
     * non-empty DAV:merge-set.
     *
     * When a server has the ability to automatically update the content and
     * dead properties of the merge target to reflect the logical merge of
     * the merge source, it may do so unless DAV:no-auto-merge is specified
     * in the MERGE request body.  In order to notify the client that a
     * merge source has been automatically merged, the MERGE request MUST
     * add the URL of the auto-merged source to the DAV:auto-merge-set
     * property of the merge target, and not to the DAV:merge-set property.
     * The client indicates that it has verified that the auto-merge is
     * valid, by deleting the merge source URL from the DAV:auto-merge-set,
     * and adding it to the DAV:predecessor-set.
     *
     * Multiple merge sources can be specified in a single MERGE request.
     * The set of merge sources for a MERGE request is determined from the
     * DAV:source element of the MERGE request body as follows:
     *
     * -  If DAV:source identifies a version, that version is a merge
     *    source.
     *
     * -  If DAV:source identifies a version-controlled resource, the
     *    DAV:checked-in version of that version-controlled resource is a
     *    merge source.
     *
     * -  If DAV:source identifies a collection, the DAV:checked-in version
     *    of each version-controlled resource that is a member of that
     *    collection is a merge source.
     *
     * The request-URL identifies the set of possible merge targets.  If the
     * request-URL identifies a collection, any member of the configuration
     * rooted at the request-URL is a possible merge target.  The merge
     * target of a particular merge source is the version-controlled or
     * checked-out resource whose DAV:checked-in or DAV:checked-out version
     * is from the same version history as the merge source.  If a merge
     * source has no merge target, that merge source is ignored.
     *
     * The MERGE response identifies the resources that a client must modify
     * to complete the merge. It also identifies the resources modified by
     * the request, so that a client can efficiently update any cached state
     * it is maintaining.
     *
     * Marshalling:
     *
     * The request body MUST be a DAV:merge element.
     *
     * The set of merge sources is determined by the DAV:source element
     * in the request body.
     *
     * <!ELEMENT merge ANY>
     * ANY value: A sequence of elements with one DAV:source element, at
     * most one DAV:no-auto-merge element, at most one DAV:no-checkout
     * element, at most one DAV:prop element, and any legal set of
     * elements that can occur in a DAV:checkout element.
     * <!ELEMENT source (href+)>
     * <!ELEMENT no-auto-merge EMPTY>
     * <!ELEMENT no-checkout EMPTY>
     * prop: see RFC 2518, Section 12.11
     *
     * The response for a successful request MUST be a 207 Multi-Status,
     * where the DAV:multistatus XML element in the response body
     * identifies all resources that have been modified by the request.
     *
     * multistatus: see RFC 2518, Section 12.9
     *
     * The response to a successful request MUST include a Location
     * header containing the URL for the new version created by the
     * checkin.
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:cannot-merge-checked-out-resource): The DAV:source element
     * MUST NOT identify a checked-out resource.  If the DAV:source
     * element identifies a collection, the collection MUST NOT have a
     * member that is a checked-out resource.
     *
     * (DAV:checkout-not-allowed): If DAV:no-checkout is specified in the
     * request body, it MUST be possible to perform the merge without
     * checking out any of the merge targets.
     *
     * All preconditions of the CHECKOUT operation apply to the checkouts
     * performed by the request.
     *
     * Postconditions:
     *
     * (DAV:ancestor-version): If a merge target is a version-controlled
     * or checked-out resource whose DAV:checked-in version or
     * DAV:checked-out version is the merge source or is a descendant of
     * the merge source, the merge target MUST NOT have been modified by
     * the MERGE.
     *
     * (DAV:descendant-version): If the merge target was a checked-in
     * version-controlled resource whose DAV:checked-in version was an
     * ancestor of the merge source, an UPDATE operation MUST have been
     * applied to the merge target to set its content and dead properties
     * to be those of the merge source.  If the UPDATE method is not
     * supported, the merge target MUST have been checked out, the
     * content and dead properties of the merge target MUST have been set
     * to those of the merge source, and the merge source MUST have been
     * added to the DAV:auto-merge-set of the merge target.  The merge
     * target MUST appear in a DAV:response XML element in the response
     * body.
     *
     * (DAV:checked-out-for-merge): If the merge target was a checked-in
     * version-controlled resource whose DAV:checked-in version was
     * neither a descendant nor an ancestor of the merge source, a
     * CHECKOUT MUST have been applied to the merge target.  All XML
     * elements in the DAV:merge XML element that could appear in a
     * DAV:checkout XML element MUST have been used as arguments to the
     * CHECKOUT request.  The merge target MUST appear in a DAV:response
     * XML element in the response body.
     *
     * (DAV:update-merge-set): If the DAV:checked-out version of the
     * merge target is neither equal to nor a descendant of the merge
     * source, the merge source MUST be added to either the DAV:merge-set
     * or the DAV:auto-merge-set of the merge target.  The merge target
     * MUST appear in a DAV:response XML element in the response body.
     *
     * If a merge source has been added to the DAV:auto-merge-set, the
     * content and dead properties of the merge target MUST have been
     * modified by the server to reflect the result of a logical merge of
     * the merge source and the merge target.  If a merge source has been
     * added to the DAV:merge-set, the content and dead properties of the
     * merge target MUST NOT have been modified by the server.  If
     * DAV:no-auto-merge is specified in the request body, the merge
     * source MUST NOT have been added to the DAV:auto-merge-set.
     *
     * (DAV:report-properties): If DAV:prop is specified in the request
     * body, the properties specified in the DAV:prop element MUST be
     * reported in the DAV:response elements in the response body.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes.
     *
     * @see https://tools.ietf.org/html/rfc3253#section-11.2
     */
    public const MERGE = 'MERGE';

    /**
     * A MKACTIVITY request creates a new activity resource.  A server MAY
     * restrict activity creation to particular collections, but a client
     * can determine the location of these collections from a DAV:activity-
     * collection-set OPTIONS request.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:mkactivity XML
     * element.
     *
     * <!ELEMENT mkactivity ANY>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:mkactivity-response XML element.
     *
     * <!ELEMENT mkactivity-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:resource-must-be-null): A resource MUST NOT exist at the
     * request-URL.
     *
     * (DAV:activity-location-ok): The request-URL MUST identify a
     * location where an activity can be created.
     *
     * Postconditions:
     *
     * (DAV:initialize-activity): A new activity exists at the request-
     * URL.  The DAV:resourcetype of the activity MUST be DAV:activity.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-13.5
     */
    public const MKACTIVITY = 'MKACTIVITY';

    /**
     * A MKWORKSPACE request creates a new workspace resource.  A server MAY
     * restrict workspace creation to particular collections, but a client
     * can determine the location of these collections from a
     * DAV:workspace-collection-set OPTIONS request (see Section 6.4).
     *
     * If a MKWORKSPACE request fails, the server state preceding the
     * request MUST be restored.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:mkworkspace XML
     * element.
     *
     * <!ELEMENT mkworkspace ANY>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:mkworkspace-response XML element.
     *
     * <!ELEMENT mkworkspace-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:resource-must-be-null): A resource MUST NOT exist at the
     * request-URL.
     *
     * (DAV:workspace-location-ok): The request-URL MUST identify a
     * location where a workspace can be created.
     *
     * Postconditions:
     *
     * (DAV:initialize-workspace): A new workspace exists at the
     * request-URL.  The DAV:resourcetype of the workspace MUST be
     * DAV:collection.  The DAV:workspace of the workspace MUST identify
     * the workspace.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-6.3
     */
    public const MKWORKSPACE = 'MKWORKSPACE';

    /**
     * A REPORT request is an extensible mechanism for obtaining information
     * about a resource.  Unlike a resource property, which has a single
     * value, the value of a report can depend on additional information
     * specified in the REPORT request body and in the REPORT request
     * headers.
     *
     * Marshalling:
     *
     * The body of a REPORT request specifies which report is being
     * requested, as well as any additional information that will be used
     * to customize the report.
     *
     * The request MAY include a Depth header.  If no Depth header is
     * included, Depth:0 is assumed.
     *
     * The response body for a successful request MUST contain the
     * requested report.
     *
     * If a Depth request header is included, the response MUST be a 207
     * Multi-Status.  The request MUST be applied separately to the
     * collection itself and to all members of the collection that
     * satisfy the Depth value.  The DAV:prop element of a DAV:response
     * for a given resource MUST contain the requested report for that
     * resource.
     *
     * Preconditions:
     *
     * (DAV:supported-report): The specified report MUST be supported by
     * the resource identified by the request-URL.
     *
     * Postconditions:
     *
     * (DAV:no-modification): The REPORT method MUST NOT have changed the
     * content or dead properties of any resource.
     *
     * Clemm, G., et al.
     *
     * Safe: yes
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-3.6
     */
    public const REPORT = 'REPORT';

    /**
     * An UNCHECKOUT request can be applied to a checked-out version-
     * controlled resource to cancel the CHECKOUT and restore the pre-
     * CHECKOUT state of the version-controlled resource.
     *
     * If an UNCHECKOUT request fails, the server MUST undo any partial
     * effects of the UNCHECKOUT request.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:uncheckout XML
     * element.
     *
     * <!ELEMENT uncheckout ANY>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:uncheckout-response XML element.
     *
     * <!ELEMENT uncheckout-response ANY>
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Preconditions:
     *
     * (DAV:must-be-checked-out-version-controlled-resource): The
     * request-URL MUST identify a version-controlled resource with a
     * DAV:checked-out property.
     *
     * Postconditions:
     *
     * (DAV:cancel-checked-out): The value of the DAV:checked-in property
     * is that of the DAV:checked-out property prior to the request, and
     * the DAV:checked-out property has been removed.
     *
     * (DAV:restore-content-and-dead-properties): The content and dead
     * properties of the version-controlled resource are copies of its
     * DAV:checked-in version.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-4.5
     */
    public const UNCHECKOUT = 'UNCHECKOUT';

    /**
     * The UPDATE method modifies the content and dead properties of a
     * checked-in version-controlled resource (the "update target") to be
     * those of a specified version (the "update source") from the version
     * history of that version-controlled resource.
     *
     * The response to an UPDATE request identifies the resources modified
     * by the request, so that a client can efficiently update any cached
     * state it is maintaining.  Extensions to the UPDATE method allow
     * multiple resources to be modified from a single UPDATE request (see
     * Section 12.13).
     *
     * Marshalling:
     *
     * The request body MUST be a DAV:update element.
     *
     * <!ELEMENT update ANY>
     * ANY value: A sequence of elements with at most one DAV:version
     * element and at most one DAV:prop element.
     * <!ELEMENT version (href)>
     * prop: see RFC 2518, Section 12.11
     *
     * The response for a successful request MUST be a 207 Multi-Status,
     * where the DAV:multistatus XML element in the response body
     * identifies all resources that have been modified by the request.
     *
     * multistatus: see RFC 2518, Section 12.9
     *
     * The response MUST include a Cache-Control:no-cache header.
     *
     * Postconditions:
     *
     * (DAV:update-content-and-properties): If the DAV:version element in
     * the request body identified a version that is in the same version
     * history as the DAV:checked-in version of a version-controlled
     * resource identified by the request-URL, then the content and dead
     * properties of that version-controlled resource MUST be the same as
     * those of the version specified by the DAV:version element, and the
     * DAV:checked-in property of the version-controlled resource MUST
     * identify that version.  The request-URL MUST appear in a
     * DAV:response element in the response body.
     *
     * (DAV:report-properties): If DAV:prop is specified in the request
     * body, the properties specified in the DAV:prop element MUST be
     * reported in the DAV:response elements in the response body.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-7.1
     */
    public const UPDATE = 'UPDATE';

    /**
     * A VERSION-CONTROL request can be used to create a version-controlled
     * resource at the request-URL.  It can be applied to a versionable
     * resource or to a version-controlled resource.
     *
     * If the request-URL identifies a versionable resource, a new version
     * history resource is created, a new version is created whose content
     * and dead properties are copied from the versionable resource, and the
     * resource is given a DAV:checked-in property that is initialized to
     * identify this new version.
     *
     * If the request-URL identifies a version-controlled resource, the
     * resource just remains under version-control.  This allows a client to
     * be unaware of whether or not a server automatically puts a resource
     * under version control when it is created.
     *
     * If a VERSION-CONTROL request fails, the server state preceding the
     * request MUST be restored.
     *
     * Marshalling:
     *
     * If a request body is included, it MUST be a DAV:version-control
     * XML element.
     *
     * <!ELEMENT version-control ANY>
     *
     * If a response body for a successful request is included, it MUST
     * be a DAV:version-control-response XML element.  Note that this
     * document does not define any elements for the VERSION-CONTROL
     * response body, but the DAV:version-control-response element is
     * defined to ensure interoperability between future extensions that
     * do define elements for the VERSION-CONTROL response body.
     *
     * <!ELEMENT version-control-response ANY>
     *
     * Postconditions:
     *
     * (DAV:put-under-version-control): If the request-URL identified a
     * versionable resource at the time of the request, the request MUST
     * have created a new version history and MUST have created a new
     * version resource in that version history.  The resource MUST have
     * a DAV:checked-in property that identifies the new version.  The
     * content, dead properties, and DAV:resourcetype of the new version
     * MUST be the same as those of the resource.  Note that an
     * implementation can choose to locate the version history and
     * version resources anywhere that it wishes.  In particular, it
     * could locate them on the same host and server as the version-
     * controlled resource, on a different virtual host maintained by the
     * same server, on the same host maintained by a different server, or
     * on a different host maintained by a different server.
     *
     * (DAV:must-not-change-existing-checked-in-out): If the request-URL
     * identified a resource already under version control at the time of
     * the request, the request MUST NOT change the DAV:checked-in or
     * DAV:checked-out property of that version-controlled resource.
     *
     * Clemm, G., et al.
     *
     * Safe: no
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc3253#section-3.5
     */
    public const VERSION_CONTROL = 'VERSION-CONTROL';
}
