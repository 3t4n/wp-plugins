<?php

namespace TopDeliverability\Settings\Widget;

use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\ApiClientTimeoutError;
use TopDeliverability\Api\ApiClientUnexpectedStatusError;
use TopDeliverability\Api\EmailAlreadyVerified;
use TopDeliverability\Api\VerificationEmailSent;
use TopDeliverability\FormHandler;
use TopDeliverability\NonceValidator;
use TopDeliverability\PageRedirector;
use TopDeliverabilityVendor\Psr\Log\LoggerInterface;
use const TopDeliverability\TOP_DELIVERABILITY_CAPABILITY;

class VerificationEmailSendingFormHandler implements FormHandler {

	const ALREADY_VERIFIED = 'already_verified';

	const ERROR = 'error';

	const SENT = 'sent';

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var PageRedirector
	 */
	private $pageRedirector;

	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * @var string
	 */
	private $settingsPageSlug;
	/**
	 * @var NonceValidator
	 */
	private $nonceValidator;

	/**
	 * @param ApiClient       $apiClient
	 * @param PageRedirector  $pageRedirector
	 * @param NonceValidator  $nonceValidator
	 * @param LoggerInterface $logger
	 * @param string          $settingsPageSlug
	 */
	public function __construct(
		ApiClient $apiClient,
		PageRedirector $pageRedirector,
		NonceValidator $nonceValidator,
		LoggerInterface $logger,
		$settingsPageSlug
	) {
		$this->apiClient        = $apiClient;
		$this->pageRedirector   = $pageRedirector;
		$this->nonceValidator   = $nonceValidator;
		$this->logger           = $logger;
		$this->settingsPageSlug = $settingsPageSlug;
	}

	/**
	 * @return void
	 */
	public function handle() {
		$queryParam = '';

		if ( current_user_can( TOP_DELIVERABILITY_CAPABILITY ) && $this->nonceValidator->validate( $this->action() ) ) {
			$result = $this->apiClient->sendVerificationEmail();

			if ( $result instanceof EmailAlreadyVerified ) {
				$this->logger->warning( 'verification email requested for email already verified' );
				$queryParam = self::ALREADY_VERIFIED;
			} elseif ( $result instanceof ApiClientTimeoutError ) {
				$this->logger->error( 'timeout requesting verification email' );
				$queryParam = self::ERROR;
			} elseif ( $result instanceof ApiClientUnexpectedStatusError ) {
				$this->logger->error( 'unexpected API status while requesting verification email', array( 'status' => $result->getStatusCode() ) );
				$queryParam = self::ERROR;
			} elseif ( $result instanceof VerificationEmailSent ) {
				$queryParam = self::SENT;
			}
		}

		if ( $queryParam ) {
			$queryParam = "&verification_email_sending=$queryParam";
		}

		$localRedirectUrl = admin_url( "admin.php?page=$this->settingsPageSlug$queryParam" );
		$this->pageRedirector->redirectTo( $localRedirectUrl );
	}

	/**
	 * @return string
	 */
	function action() {
		return 'verification_email_sending';
	}
}
