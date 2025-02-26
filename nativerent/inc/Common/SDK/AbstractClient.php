<?php

namespace NativeRent\Common\SDK;

abstract class AbstractClient {
	/**
	 * API host.
	 *
	 * @var string
	 */
	protected $host;


	/**
	 * Get full API method URL.
	 *
	 * @param  string $method
	 *
	 * @return string
	 */
	protected function methodURL( $method ) {
		return "$this->host/integration-api/v1/$method";
	}

	/**
	 * Auth method URL.
	 *
	 * @return string
	 */
	protected function authURL() {
		return "$this->host/auth";
	}
}
