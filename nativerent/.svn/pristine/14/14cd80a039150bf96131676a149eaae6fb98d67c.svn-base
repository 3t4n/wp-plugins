<?php

namespace NativeRent\Common\SDK\Http;

use Exception;

use function is_numeric;

class RequestException extends Exception {

	/** @var bool */
	protected $suppress = false;

	public function suppress() {
		$this->suppress = true;
	}

	/** @return bool */
	public function isSuppressed() {
		return $this->suppress;
	}

	/**
	 * @param  int $status
	 *
	 * @return bool
	 */
	public static function isClientStatusError( $status ) {
		return is_numeric( $status ) && 400 <= $status && 500 > $status;
	}

	/**
	 * @return bool
	 */
	public function isClientError() {
		return self::isClientStatusError( $this->getCode() );
	}
}
