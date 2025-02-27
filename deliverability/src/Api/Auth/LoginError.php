<?php

namespace TopDeliverability\Api\Auth;

class LoginError {

	/**
	 * @var string
	 */
	private $message;


	/**
	 * @param string $message
	 */
	public function __construct( $message ) {
		$this->message = $message;
	}

	/**
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

}
