<?php

namespace NativeRent\Common\SDK\Auth;

final class AuthResponseData {
	/**
	 * Native Rent site UUID.
	 *
	 * @var string
	 */
	private $siteID;

	/**
	 * Native Rent API token.
	 *
	 * @var string
	 */
	private $token;

	/**
	 * @param string $siteID
	 * @param string $token
	 */
	public function __construct(
		$siteID,
		#[\SensitiveParameter]
		$token
	) {
		$this->siteID = $siteID;
		$this->token = $token;
	}

	/**
	 * @return string
	 */
	public function getSiteID() {
		return $this->siteID;
	}

	/**
	 * @return string
	 */
	public function getToken() {
		return $this->token;
	}
}
