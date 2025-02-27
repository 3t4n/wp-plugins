<?php

namespace TopDeliverability\Api;

use TopDeliverability\Account;
use TopDeliverability\Account\CreatedAccount;
use TopDeliverability\Api\Users\InvalidEmail;
use TopDeliverability\Api\Users\PasswordSuccessfullyReset;
use TopDeliverability\Api\Users\UserAlreadyExists;
use TopDeliverability\Api\Users\UserNotCreated;
use TopDeliverability\Api\Users\UserSuccessfullyCreated;
use TopDeliverability\DeliverabilityScore;
use TopDeliverability\DkimDnsRecord;
use TopDeliverability\Email\SignedEmail;
use WP_Http;

class ApiClient {

	/**
	 * @var AuthenticatingApiClient
	 */
	private $delegate;

	/**
	 * @var TokenProvider
	 */
	private $tokenProvider;

	/**
	 * @param AuthenticatingApiClient $authenticatingApiClient
	 * @param TokenProvider           $tokenProvider
	 * @see WP_Http::request() for default timeout
	 */
	public function __construct(
		AuthenticatingApiClient $authenticatingApiClient,
		TokenProvider $tokenProvider
	) {
		$this->tokenProvider = $tokenProvider;
		$this->delegate      = $authenticatingApiClient;
	}

	/**
	 * @param string $username
	 * @param string $password
	 *
	 * @return ApiClientUnexpectedStatusError|UserAlreadyExists|UserNotCreated|UserSuccessfullyCreated
	 */
	public function createUser( $username, $password ) {
		return $this->delegate->createUser( $username, $password );
	}

	/**
	 * @param $domain
	 * @param $emailDomain
	 *
	 * @return CreatedAccount
	 */
	public function createAccount( $domain, $emailDomain ) {
		return $this->delegate->createAccount( $this->accessToken(), $domain, $emailDomain );
	}

	/**
	 * @param string $accountId
	 *
	 * @return Account|null
	 */
	public function getAccount( $accountId ) {
		return $this->delegate->getAccount( $this->accessToken(), $accountId );
	}

	/**
	 * @param string $accountId
	 *
	 * @return DkimDnsRecord[]
	 */
	public function getDkimRecords( $accountId ) {
		return $this->delegate->getDkimRecords( $this->accessToken(), $accountId );
	}

	/**
	 * @param string $accountId
	 *
	 * @return SignedEmail|EmailSigningError|ApiClientUnexpectedStatusError
	 */
	public function sign( $accountId, $domain, $keySelector, SigningRequest $signingRequest ) {
		return $this->delegate->sign( $this->accessToken(), $accountId, $domain, $keySelector, $signingRequest );
	}

	/**
	 * @return bool
	 */
	public function isEmailVerified() {
		return $this->delegate->isEmailVerified( $this->accessToken() );
	}

	/**
	 * @param string $domain
	 *
	 * @return DeliverabilityScore|ApiClientError
	 */
	public function getDeliverabilityScore( $domain ) {
		$token = $this->tokenProvider->get();

		if ( $token != null ) {
			$accessToken = $token->getAccess();
		} else {
			$accessToken = null;
		}

		return $this->delegate->getDeliverabilityScore( $accessToken, $domain );
	}

	/**
	 * @param string $domain
	 * @param string $pluginVersion
	 * @param string $wordPressVersion
	 */
	public function trackPluginActivation( $domain, $pluginVersion, $wordPressVersion ) {
		$this->delegate->trackPluginActivation( $domain, $pluginVersion, $wordPressVersion );
	}

	/**
	 * @param string $domain
	 * @param string $pluginVersion
	 * @param string $wordPressVersion
	 */
	public function trackPluginDeactivation( $domain, $pluginVersion, $wordPressVersion ) {
		$this->delegate->trackPluginDeactivation( $domain, $pluginVersion, $wordPressVersion );
	}


	/**
	 * @param string $accountId
	 * @param string $domain
	 *
	 * @return DailyUsage[]|MalformedDateInResponse
	 */
	public function getDailyUsageData( $accountId, $domain ) {
		return $this->delegate->getDailyUsageData( $this->accessToken(), $accountId, $domain );
	}

	/**
	 * @return VerificationEmailSent|EmailAlreadyVerified|ApiClientError
	 */
	public function sendVerificationEmail() {
		return $this->delegate->sendVerificationEmail( $this->accessToken() );
	}

	/**
	 * @param string $accountId
	 * @param string $domain
	 * @param string $keySelector
	 * @param int    $keySize
	 * @return DkimKeyRotated | PaymentRequired | TooManyRequests | ApiClientUnexpectedStatusError
	 */
	public function rotateKey( $accountId, $domain, $keySelector, $keySize ) {
		return $this->delegate->rotateKey( $this->accessToken(), $accountId, $domain, $keySelector, $keySize );
	}

	/**
	 * @param $username
	 * @return PasswordSuccessfullyReset|InvalidEmail|ApiClientUnexpectedStatusError
	 */
	public function resetPassword( $username ) {
		return $this->delegate->resetPassword( $username );
	}

	/**
	 * @return string
	 */
	private function accessToken() {
		return $this->tokenProvider->get()->getAccess();
	}
}
