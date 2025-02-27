<?php

namespace TopDeliverability\Api;

class ApiClientUnexpectedStatusError extends ApiClientError {

	/**
	 * @var int
	 */
	private $statusCode;

	/**
	 * @param int $statusCode
	 */
	public function __construct( $statusCode ) {
		$this->statusCode = $statusCode;
	}

	public function getStatusCode() {
		return $this->statusCode;
	}
}
