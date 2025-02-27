<?php

namespace TopDeliverability;

class Url {

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @param string $url
	 */
	public function __construct( $url ) {
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function get() {
		return $this->url;
	}

	/**
	 * @param string $key
	 * @param string $value
	 */
	public function appendQueryParam( $key, $value ) {
		$queryString = parse_url( $this->url, PHP_URL_QUERY );
		$separator   = empty( $queryString ) ? '?' : '&';
		$this->url   = "{$this->url}$separator$key=$value";
	}
}
