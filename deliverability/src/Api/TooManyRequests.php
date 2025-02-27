<?php

namespace TopDeliverability\Api;

use DateTimeInterface;

class TooManyRequests {

	/**
	 * @var DateTimeInterface
	 */
	private $retryAfter;

	/**
	 * @param DateTimeInterface $retryAfter
	 */
	public function __construct( DateTimeInterface $retryAfter ) {
		$this->retryAfter = $retryAfter;
	}

	public function get_retry_after() {
		return $this->retryAfter;
	}
}
