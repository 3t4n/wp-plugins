<?php

namespace NativeRent\Common\SDK\Auth;

use NativeRent\Common\SDK\CommonResponse;

final class AuthResponse {
	use CommonResponse;

	/**
	 * Response data.
	 *
	 * @var AuthResponseData|null
	 */
	private $data;


	/**
	 * @param bool                      $success
	 * @param AuthResponseData|null     $data
	 * @param array<string,string>|null $errors
	 */
	public function __construct(
		$success,
		AuthResponseData $data = null,
		$errors = null
	) {
		$this->success = $success;
		$this->data = $data;
		$this->errors = $errors;
	}

	/**
	 * @return AuthResponseData|null
	 */
	public function getData() {
		return $this->data;
	}
}
