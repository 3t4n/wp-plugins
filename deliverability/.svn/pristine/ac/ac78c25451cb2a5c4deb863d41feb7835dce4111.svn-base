<?php

namespace TopDeliverability\Api\Auth;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;

class Token {

	/**
	 * @var string
	 */
	private $access;

	/**
	 * @var string
	 */
	private $refresh;

	/**
	 * @var DateTimeInterface
	 */
	private $expiration;

	/**
	 * @param string            $access
	 * @param string            $refresh
	 * @param DateTimeInterface $expiration
	 */
	public function __construct( $access, $refresh, $expiration ) {
		$this->access     = $access;
		$this->refresh    = $refresh;
		$this->expiration = $expiration;
	}

	/**
	 * @param string $access
	 * @param string $refresh
	 * @param int    $expiration
	 */
	public static function create( $access, $refresh, $expiration ) {
		try {
			return new Token( $access, $refresh, new DateTimeImmutable( '@' . $expiration ) );
		} catch ( Exception $e ) {
			wp_die( $e->getMessage() );
		}
	}

	public function getAccess() {
		return $this->access;
	}

	public function getRefresh() {
		return $this->refresh;
	}

	public function getExpiration() {
		return $this->expiration;
	}

}
