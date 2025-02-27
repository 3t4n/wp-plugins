<?php

namespace TopDeliverability\Score;

class DnsBlacklisted extends Blacklisted {

	/**
	 * @var string
	 */
	private $ipAddress;

	public function __construct( $name, $url, $ipAddress ) {
		parent::__construct( $name, $url );
		$this->ipAddress = $ipAddress;
	}

	/**
	 * @return string
	 */
	public function get_ip_address() {
		return $this->ipAddress;
	}
}
