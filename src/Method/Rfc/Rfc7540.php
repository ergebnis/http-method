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
 * @see https://tools.ietf.org/html/rfc7540
 */
interface Rfc7540 extends Status\ProposedStandard
{
    /**
     * In HTTP/2, each endpoint is required to send a connection preface as
     * a final confirmation of the protocol in use and to establish the
     * initial settings for the HTTP/2 connection.  The client and server
     * each send a different connection preface.
     *
     * The client connection preface starts with a sequence of 24 octets,
     * which in hex notation is:
     *
     * 0x505249202a20485454502f322e300d0a0d0a534d0d0a0d0a
     *
     * That is, the connection preface starts with the string "PRI *
     * HTTP/2.0\r\n\r\nSM\r\n\r\n").  This sequence MUST be followed by a
     * SETTINGS frame (Section 6.5), which MAY be empty.  The client sends
     * the client connection preface immediately upon receipt of a 101
     * (Switching Protocols) response (indicating a successful upgrade) or
     * as the first application data octets of a TLS connection.  If
     * starting an HTTP/2 connection with prior knowledge of server support
     * for the protocol, the client connection preface is sent upon
     * connection establishment.
     *
     * Note: The client connection preface is selected so that a large
     * proportion of HTTP/1.1 or HTTP/1.0 servers and intermediaries do
     * not attempt to process further frames.  Note that this does not
     * address the concerns raised in [TALKING].
     *
     * The server connection preface consists of a potentially empty
     * SETTINGS frame (Section 6.5) that MUST be the first frame the server
     * sends in the HTTP/2 connection.
     *
     * The SETTINGS frames received from a peer as part of the connection
     * preface MUST be acknowledged (see Section 6.5.3) after sending the
     * connection preface.
     *
     * To avoid unnecessary latency, clients are permitted to send
     * additional frames to the server immediately after sending the client
     * connection preface, without waiting to receive the server connection
     * preface.  It is important to note, however, that the server
     * connection preface SETTINGS frame might include parameters that
     * necessarily alter how a client is expected to communicate with the
     * server.  Upon receiving the SETTINGS frame, the client is expected to
     * honor any parameters established.  In some configurations, it is
     * possible for the server to transmit SETTINGS before the client sends
     * additional frames, providing an opportunity to avoid this issue.
     *
     * Clients and servers MUST treat an invalid connection preface as a
     * connection error (Section 5.4.1) of type PROTOCOL_ERROR.  A GOAWAY
     * frame (Section 6.8) MAY be omitted in this case, since an invalid
     * preface indicates that the peer is not using HTTP/2.
     *
     * Belshe, M., et al.
     *
     * Safe: yes
     * Idempotent: yes
     *
     * @see https://tools.ietf.org/html/rfc7540#section-3.5
     */
    public const PRI = 'PRI';
}
