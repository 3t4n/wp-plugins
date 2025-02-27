<?php

namespace TopDeliverability\Settings\Widget\Signup;

use TopDeliverability\Api\Auth\Auth0Authenticator;
use TopDeliverability\FormHandler;
use TopDeliverability\NonceValidator;
use TopDeliverability\PageRedirector;
use TopDeliverabilityVendor\League\Uri\Uri;
use TopDeliverabilityVendor\League\Uri\UriModifier;
use const TopDeliverability\TOP_DELIVERABILITY_CAPABILITY;

class Auth0SignupFormHandler implements FormHandler {

	/**
	 * @var Auth0Authenticator
	 */
	private $authenticator;

	/**
	 * @var PageRedirector
	 */
	private $pageRedirector;

	/**
	 * @var NonceValidator
	 */
	private $nonceValidator;

	/**
	 * @var string
	 */
	private $callbackPageSlug;

	/**
	 * @var string
	 */
	private $settingsPageSlug;

	/**
	 * @var Uri
	 */
	private $redirectBaseUrl;

	/**
	 * @param Auth0Authenticator $authenticator
	 * @param PageRedirector     $pageRedirector
	 * @param NonceValidator     $nonceValidator
	 * @param string             $callbackPageSlug
	 * @param string             $settingsPageSlug
	 * @param string             $redirectBaseUrl
	 */
	public function __construct(
		Auth0Authenticator $authenticator,
		PageRedirector $pageRedirector,
		NonceValidator $nonceValidator,
		$callbackPageSlug,
		$settingsPageSlug,
		$redirectBaseUrl
	) {
		$this->authenticator    = $authenticator;
		$this->pageRedirector   = $pageRedirector;
		$this->nonceValidator   = $nonceValidator;
		$this->callbackPageSlug = $callbackPageSlug;
		$this->settingsPageSlug = $settingsPageSlug;
		$this->redirectBaseUrl  = Uri::createFromString( $redirectBaseUrl );
	}

	/**
	 * @return void
	 */
	function handle() {
		if ( current_user_can( TOP_DELIVERABILITY_CAPABILITY ) && $this->nonceValidator->validate( $this->action() ) ) {
			$localRedirectUrl             = admin_url( 'admin.php?page=' . $this->callbackPageSlug );
			$topDeliverabilityRedirectUrl = UriModifier::appendQuery( $this->redirectBaseUrl, "td_redirect=$localRedirectUrl" );
			$redirectUrl                  = $this->authenticator->signup( (string) $topDeliverabilityRedirectUrl );
		} else {
			$redirectUrl = admin_url( "admin.php?page=$this->settingsPageSlug" );
		}

		$this->pageRedirector->redirectTo( $redirectUrl );
	}

	/**
	 * @return string
	 */
	public function action() {
		return 'auth0_signup_form';
	}
}
