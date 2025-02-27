<?php

namespace TopDeliverability\Settings\Widget\Signup;

use TopDeliverability\AccountCreator;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\ApiClientUnexpectedStatusError;
use TopDeliverability\Api\Auth\Auth0Authenticator;
use TopDeliverability\Api\Auth\InvalidCredentials;
use TopDeliverability\Api\Auth\LoginError;
use TopDeliverability\Api\Auth\TokenOption;
use TopDeliverability\Api\Users\UserNotCreated;
use TopDeliverability\FormHandler;
use TopDeliverability\NonceValidator;
use TopDeliverability\PageRedirector;
use TopDeliverabilityVendor\Psr\Log\LoggerInterface;
use const TopDeliverability\TOP_DELIVERABILITY_CAPABILITY;

class EmbeddedSignupFormHandler implements FormHandler {
	const ERROR               = 'error';
	const INVALID_CREDENTIALS = 'invalid_credentials';
	const USER_NOT_CREATED    = 'user_not_created';

	/**
	 * @var AccountCreator
	 */
	private $accountCreator;

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var PageRedirector
	 */
	private $pageRedirector;

	/**
	 * @var NonceValidator
	 */
	private $nonceValidator;

	/**
	 * @var TokenOption
	 */
	private $tokenOption;

	/**
	 * @var string
	 */
	private $settingsPageSlug;

	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * @var Auth0Authenticator
	 */
	private $auth0Authenticator;

	/**
	 * @param AccountCreator     $accountCreator
	 * @param ApiClient          $apiClient
	 * @param PageRedirector     $pageRedirector
	 * @param NonceValidator     $nonceValidator
	 * @param TokenOption        $tokenOption
	 * @param string             $settingsPageSlug
	 * @param LoggerInterface    $logger
	 * @param Auth0Authenticator $auth0Authenticator
	 */
	public function __construct(
		AccountCreator $accountCreator,
		ApiClient $apiClient,
		PageRedirector $pageRedirector,
		NonceValidator $nonceValidator,
		TokenOption $tokenOption,
		$settingsPageSlug,
		LoggerInterface $logger,
		Auth0Authenticator $auth0Authenticator
	) {
		$this->accountCreator     = $accountCreator;
		$this->apiClient          = $apiClient;
		$this->pageRedirector     = $pageRedirector;
		$this->nonceValidator     = $nonceValidator;
		$this->tokenOption        = $tokenOption;
		$this->settingsPageSlug   = $settingsPageSlug;
		$this->logger             = $logger;
		$this->auth0Authenticator = $auth0Authenticator;
	}

	/**
	 * @return void
	 */
	function handle() {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$error    = '';

		if ( current_user_can( TOP_DELIVERABILITY_CAPABILITY ) && $this->nonceValidator->validate( $this->action() ) ) {
			$error = $this->signup( $username, $password );

			if ( ! $error ) {
				$error = $this->login( $username, $password );
			}
		}

		$redirectUrl = admin_url( "admin.php?page=$this->settingsPageSlug$error" );
		$this->pageRedirector->redirectTo( $redirectUrl );
	}

	/**
	 * @return string
	 */
	public function action() {
		return 'embedded_signup_form';
	}

	/**
	 * @param $username
	 * @param $password
	 * @return string
	 */
	private function login( $username, $password ) {
		$user_login_result = $this->auth0Authenticator->login( $username, $password );

		if ( $user_login_result instanceof InvalidCredentials ) {
			$this->logger->info( 'invalid credentials' );
			return '&user_login_result=' . self::INVALID_CREDENTIALS;
		}

		if ( $user_login_result instanceof LoginError ) {
			$this->logger->error( 'login error: ' . $user_login_result->getMessage() );
			return '&user_login_result=' . self::ERROR;
		}

		$this->tokenOption->set( $user_login_result );
		$this->accountCreator->createIfNeeded();

		return '';
	}

	/**
	 * @param $username
	 * @param $password
	 * @return string
	 */
	private function signup( $username, $password ) {
		$result = $this->apiClient->createUser( $username, $password );

		if ( $result instanceof UserNotCreated ) {
			$this->logger->info( 'user not created: invalid email or password' );
			return '&user_creation_result=' . self::USER_NOT_CREATED;
		}

		if ( $result instanceof ApiClientUnexpectedStatusError ) {
			$this->logger->error( 'unexpected status code from API: ' . $result->getStatusCode() );
			return '&user_creation_result=' . self::ERROR;
		}

		return '';
	}
}
