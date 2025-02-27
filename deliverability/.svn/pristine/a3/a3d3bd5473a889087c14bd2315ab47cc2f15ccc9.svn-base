<?php

namespace TopDeliverability\Settings\Widget;

use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\Users\InvalidEmail;
use TopDeliverability\Api\Users\PasswordSuccessfullyReset;
use TopDeliverability\FormHandler;
use TopDeliverability\NonceValidator;
use TopDeliverability\PageRedirector;
use const TopDeliverability\TOP_DELIVERABILITY_CAPABILITY;

class PasswordResetFormHandler implements FormHandler {

	const SUCCESS = 'success';

	const ERROR = 'error';

	const INVALID_EMAIL = 'invalid_email';

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var PageRedirector
	 */
	private $pageRedirector;

	/**
	 * @var string
	 */
	private $settingsPageSlug;

	/**
	 * @var NonceValidator
	 */
	private $nonceValidator;

	/**
	 * @param ApiClient      $apiClient
	 * @param PageRedirector $pageRedirector
	 * @param NonceValidator $nonceValidator
	 * @param string         $settingsPageSlug
	 */
	public function __construct(
		ApiClient $apiClient,
		PageRedirector $pageRedirector,
		NonceValidator $nonceValidator,
		$settingsPageSlug
	) {
		$this->apiClient        = $apiClient;
		$this->pageRedirector   = $pageRedirector;
		$this->settingsPageSlug = $settingsPageSlug;
		$this->nonceValidator   = $nonceValidator;
	}

	public function handle() {

		$queryString = '';

		if ( current_user_can( TOP_DELIVERABILITY_CAPABILITY ) && $this->nonceValidator->validate( $this->action() ) ) {
			$result = $this->apiClient->resetPassword( $_POST['username'] );

			if ( $result instanceof InvalidEmail ) {
				$queryString = 'invalid_email';
			} elseif ( $result instanceof PasswordSuccessfullyReset ) {
				$queryString = 'success';
			} else {
				$queryString = 'error';
			}

			$queryString = "&password_reset_result=$queryString";
		}

		$redirectUrl = admin_url( "admin.php?page=$this->settingsPageSlug$queryString" );
		$this->pageRedirector->redirectTo( $redirectUrl );
	}

	public function action() {
		return 'reset_password';
	}
}
