<?php

namespace NativeRent\Common\SDK;

trait CommonResponse {
	/**
	 * Success flag.
	 *
	 * @var bool
	 */
	protected $success = false;

	/**
	 * List of errors.
	 *
	 * @var array<string,string>|null
	 */
	protected $errors = null;

	/**
	 * @return bool
	 */
	public function isSuccess() {
		return $this->success;
	}

	/**
	 * @return string[]|null
	 */
	public function getErrors() {
		return $this->errors;
	}

	/** @return bool */
	public function hasErrors() {
		return ! empty( $this->errors );
	}
}
