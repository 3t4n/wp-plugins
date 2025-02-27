<?php

namespace TopDeliverability\Account\State;

use TopDeliverability\Account;
use TopDeliverability\AccountIdOption;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\DkimDnsRecord;

class EmailVerified extends EmailVerificationState {

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var AccountIdOption
	 */
	private $accountIdOption;

	/**
	 * @var DkimDnsRecord[] | null
	 */
	private $dkimRecords = null;

	/**
	 * @var Account | null
	 */
	private $account = null;

	/**
	 * @param ApiClient       $apiClient
	 * @param AccountIdOption $accountIdOption
	 */
	public function __construct( ApiClient $apiClient, AccountIdOption $accountIdOption ) {
		$this->apiClient       = $apiClient;
		$this->accountIdOption = $accountIdOption;
	}

	/**
	 * @return DkimDnsRecord[]
	 */
	public function getDkimRecords() {
		if ( $this->dkimRecords === null ) {
			$this->dkimRecords = $this->apiClient->getDkimRecords( $this->accountIdOption->get() );
		}

		return $this->dkimRecords;
	}

	/**
	 * @return Account
	 */
	public function getAccount() {
		if ( $this->account == null ) {
			$this->account = $this->apiClient->getAccount( $this->accountIdOption->get() );
		}

		return $this->account;
	}
}
