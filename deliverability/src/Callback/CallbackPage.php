<?php

namespace TopDeliverability\Callback;

use Exception;
use TopDeliverability\AccountCreator;
use TopDeliverability\Api\Auth\Auth0Authenticator;
use TopDeliverability\Api\Auth\Token;
use TopDeliverability\Api\Auth\TokenOption;
use TopDeliverability\Page;
use TopDeliverability\PageRedirector;
use TopDeliverabilityVendor\League\Uri\Uri;
use TopDeliverabilityVendor\League\Uri\UriModifier;

class CallbackPage implements Page {

	/**
	 * @var Auth0Authenticator
	 */
	private $auth0Authenticator;

	/**
	 * @var PageRedirector
	 */
	private $pageRedirector;

	/**
	 * @var TokenOption
	 */
	private $tokenOption;

	/**
	 * @var string
	 */
	private $settingsPageSlug;

	/**
	 * @var string
	 */
	private $callbackPageSlug;

	/**
	 * @var Uri
	 */
	private $redirectBaseUrl;

	/**
	 * @var AccountCreator
	 */
	private $accountCreator;

	/**
	 * @param Auth0Authenticator $auth0Authenticator
	 * @param PageRedirector     $pageRedirector
	 * @param TokenOption        $tokenOption
	 * @param string             $settingsPageSlug
	 * @param string             $callbackPageSlug
	 * @param string             $redirectBaseUrl
	 * @param AccountCreator     $accountCreator
	 */
	public function __construct(
		Auth0Authenticator $auth0Authenticator,
		PageRedirector $pageRedirector,
		TokenOption $tokenOption,
		$settingsPageSlug,
		$callbackPageSlug,
		$redirectBaseUrl,
		AccountCreator $accountCreator
	) {
		$this->auth0Authenticator = $auth0Authenticator;
		$this->pageRedirector     = $pageRedirector;
		$this->settingsPageSlug   = $settingsPageSlug;
		$this->tokenOption        = $tokenOption;
		$this->callbackPageSlug   = $callbackPageSlug;
		$this->redirectBaseUrl    = Uri::createFromString( $redirectBaseUrl );
		$this->accountCreator     = $accountCreator;
	}

	/**
	 * @return void
	 * @throws Exception
	 */
	function render() {
		if ( ! isset( $_GET['code'] ) or ! isset( $_GET['page'] ) or $_GET['page'] !== $this->callbackPageSlug ) {
			return;
		}

		$localRedirectUrl             = admin_url( 'admin.php?page=' . $this->settingsPageSlug );
		$topDeliverabilityRedirectUrl = UriModifier::appendQuery( $this->redirectBaseUrl, "td_redirect=$localRedirectUrl" );

		if ( isset( $_GET['social-login'] ) ) {
			$token = $this->auth0Authenticator->codeExchange( $_GET['code'], (string) $topDeliverabilityRedirectUrl );
		} else {
			$token = $this->auth0Authenticator->handleCallback( (string) $topDeliverabilityRedirectUrl );
		}

		$this->redirect( $token, $localRedirectUrl );
	}

	/**
	 * @param Token  $token
	 * @param string $localRedirectUrl
	 * @return void
	 */
	public function redirect( Token $token, $localRedirectUrl ) {
		$this->tokenOption->set( $token );
		$this->accountCreator->createIfNeeded();
		$this->pageRedirector->redirectTo( $localRedirectUrl );
	}
}
