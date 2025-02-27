<?php

namespace TopDeliverability\Account\State;

use TopDeliverability\AccountIdOption;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\Auth\TokenOption;

class ApiEmailVerificationStateProvider implements EmailVerificationStateProvider {

	/**
	 * @var TokenOption
	 */
	private $tokenOption;

	/**
	 * @var AccountIdOption
	 */
	private $accountIdOption;

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @param TokenOption     $tokenOption
	 * @param AccountIdOption $accountIdOption
	 * @param ApiClient       $apiClient
	 */
	public function __construct( TokenOption $tokenOption, AccountIdOption $accountIdOption, ApiClient $apiClient ) {
		$this->tokenOption     = $tokenOption;
		$this->apiClient       = $apiClient;
		$this->accountIdOption = $accountIdOption;
	}

	/**
	 * @return EmailVerificationState
	 */
	public function getState() {
		if ( $this->tokenOption->get() === null ) {
			return new EmailNotRegistered();
		}

		if ( ! $this->apiClient->isEmailVerified() ) {
			return new EmailNotVerified();
		} else {
			return new EmailVerified( $this->apiClient, $this->accountIdOption );
		}
	}
}
