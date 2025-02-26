<?php

namespace NativeRent\Common\SDK\Http;

class Request {
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
	const METHOD_HEAD = 'HEAD';

	/** @var string */
	protected $method;

	/** @var string */
	protected $uri;

	/** @var string */
	protected $body;

	/** @var array<string, string> */
	protected $headers;

	/**
	 * @param string                $method Request method.
	 * @param string                $uri Request URI.
	 * @param string                $body Request body.
	 * @param array<string, string> $headers Request headers.
	 */
	public function __construct( $method, $uri, $body, $headers ) {
		$this->method = $method;
		$this->uri = $uri;
		$this->body = $body;
		$this->headers = $headers;
	}

	/**
	 * Request URI.
	 *
	 * @return string
	 */
	public function getRequestTarget() {
		return $this->uri;
	}

	/**
	 * Request method (POST, GET, HEAD).
	 *
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * @return array<string, string>
	 */
	public function getHeaders() {
		return $this->headers;
	}

	/**
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Adding header.
	 *
	 * @param string $header
	 * @param string $val
	 * @param bool   $replace Replace existing value.
	 *
	 * @return self
	 */
	public function addHeader( $header, $val, $replace = true ) {
		if ( $replace || ! isset( $this->headers[ $header ] ) ) {
			$this->headers[ $header ] = $val;
		}

		return $this;
	}
}
