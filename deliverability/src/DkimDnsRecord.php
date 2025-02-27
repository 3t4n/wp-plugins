<?php

namespace TopDeliverability;

class DkimDnsRecord {
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $content;

	/**
	 * @var int
	 */
	private $keySize;

	/**
	 * @param string $name
	 * @param string $content
	 * @param int    $keySize
	 */
	public function __construct( $name, $content, $keySize ) {
		$this->name    = $name;
		$this->content = $content;
		$this->keySize = $keySize;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @return int
	 */
	public function getKeySize() {
		return $this->keySize;
	}
}
