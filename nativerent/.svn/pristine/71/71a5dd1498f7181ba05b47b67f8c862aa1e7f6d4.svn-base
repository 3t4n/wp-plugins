<?php

namespace NativeRent\Common\SDK\State;

use NativeRent\Common\SDK\CommonResponse;

final class GetOptionsResponse {
	use CommonResponse;

	/** @var GetOptionsData|null */
	private $data;

	/**
	 * @param bool                  $success
	 * @param GetOptionsData|null   $data
	 * @param array<string, string> $errors
	 */
	public function __construct(
		$success,
		GetOptionsData $data = null,
		$errors = null
	) {
		$this->success = $success;
		$this->data = $data;
		$this->errors = $errors;
	}

	/**
	 * @return GetOptionsData|null
	 */
	public function getData() {
		return $this->data;
	}
}
