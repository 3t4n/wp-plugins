<?php

namespace NativeRent\Common\SDK;

final class Config {
	/** @var string  */
	public $host;

	/** @var string|null */
	public $siteID;

	/** @var string|null  */
	public $token;

	/**
	 * @param  string      $host  API host.
	 * @param  string|null $siteID Site ID.
	 * @param  string|null $token  Access token.
	 */
	public function __construct(
		$host,
		$siteID,
		#[\SensitiveParameter]
		$token
	) {
		$this->host = $host;
		$this->siteID = $siteID;
		$this->token = $token;
	}
}
