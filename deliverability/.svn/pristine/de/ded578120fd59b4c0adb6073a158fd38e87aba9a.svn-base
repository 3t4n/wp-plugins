<?php

namespace TopDeliverability\Api;

class DkimRecordNotFound extends EmailSigningError {

	/**
	 * @var string
	 */
	private $domain;

	/**
	 * @var string
	 */
	private $keySelector;

	/**
	 * @param string $domain
	 * @param string $keySelector
	 */
	public function __construct( $domain, $keySelector ) {
		$this->domain      = $domain;
		$this->keySelector = $keySelector;
	}

	public function getDomain() {
		return $this->domain;
	}

	public function getKeySelector() {
		return $this->keySelector;
	}
}
