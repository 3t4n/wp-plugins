<?php

namespace NativeRent\Common\SDK\Http;

use function is_array;
use function json_decode;

/**
 * TODO: Response::getDecodedBody() can only work with plain/text and application/json content.
 */
class Response {
	/** @var int */
	private $statusCode;

	/** @var array|string */
	private $decodedBody;

	/** @var array<string, string> */
	private $headers;

	/**
	 * @param int                   $statusCode HTTP-status code.
	 * @param array|string          $body Response body.
	 * @param array<string, string> $headers Response headers.
	 */
	public function __construct( $statusCode, $body = '', $headers = [] ) {
		$this->statusCode = $statusCode;
		$this->decodedBody = is_array( $body ) ? $body : json_decode( $body, true );
		$this->headers = $headers;
	}

	/**
	 * HTTP status code.
	 *
	 * @return int
	 */
	public function getStatusCode() {
		return $this->statusCode;
	}

	/**
	 * The decoded body.
	 *
	 * @return array|string
	 */
	public function getDecodedBody() {
		return $this->decodedBody;
	}

	/**
	 * Response headers getter.
	 *
	 * @return array<string, string>
	 */
	public function getHeaders() {
		return $this->headers;
	}

	/**
	 * Get a header value.
	 *
	 * @param string $header
	 *
	 * @return string
	 */
	public function getHeaderLine( $header ) {
		return isset( $this->headers[ $header ] ) ? $this->headers[ $header ] : '';
	}
}
