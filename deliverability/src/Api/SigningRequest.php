<?php

namespace TopDeliverability\Api;

class SigningRequest {

	private $from;

	private $subject;

	private $to;

	private $body;

	/**
	 * @param string   $from
	 * @param string   $subject
	 * @param string[] $to
	 * @param string   $body
	 */
	public function __construct( $from, $subject, array $to, $body ) {
		$this->from    = $from;
		$this->subject = $subject;
		$this->to      = $to;
		$this->body    = $body;
	}

	public function getFrom() {
		return $this->from;
	}

	public function getSubject() {
		return $this->subject;
	}

	public function getTo() {
		return $this->to;
	}

	public function getBody() {
		return $this->body;
	}
}
