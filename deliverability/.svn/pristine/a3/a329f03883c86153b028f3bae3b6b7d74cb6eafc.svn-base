<?php

namespace TopDeliverability\Score;

abstract class Blacklisted {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @param string $name
	 * @param string $url
	 */
	public function __construct( $name, $url ) {
		$this->name = $name;
		$this->url  = $url;
	}

	/**
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function get_url() {
		return $this->url;
	}
}
