<?php

namespace TopDeliverability\Email;

class SignedEmail {

	/**
	 * @var string
	 */
	private $headerName;

	/**
	 * @var string
	 */
	private $headerValue;

	public function __construct( $headerName, $headerValue ) {
		$this->headerName  = $headerName;
		$this->headerValue = $headerValue;
	}

	public function getHeaderName() {
		return $this->headerName;
	}

	public function getHeaderValue() {
		return $this->headerValue;
	}
}
