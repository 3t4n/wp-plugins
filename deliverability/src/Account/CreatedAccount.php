<?php

namespace TopDeliverability\Account;

class CreatedAccount {

	/**
	 * @var string
	 */
	private $accountId;

	/**
	 * @var string
	 */
	private $domain;

	/**
	 * @var string
	 */
	private $keySelector;

	/**
	 * @param string $accountId
	 * @param string $domain
	 * @param string $keySelector
	 */
	public function __construct( $accountId, $domain, $keySelector ) {
		$this->accountId   = $accountId;
		$this->domain      = $domain;
		$this->keySelector = $keySelector;
	}

	public function getAccountId() {
		return $this->accountId;
	}

	public function getDomain() {
		return $this->domain;
	}

	public function getKeySelector() {
		return $this->keySelector;
	}
}
