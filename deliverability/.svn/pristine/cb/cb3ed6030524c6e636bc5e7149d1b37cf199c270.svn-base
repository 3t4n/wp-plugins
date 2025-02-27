<?php

namespace TopDeliverability\Api\Auth;

use DateInterval;
use DateTimeImmutable;
use Exception;
use TopDeliverabilityVendor\Auth0\SDK\Auth0;
use TopDeliverabilityVendor\Auth0\SDK\Exception\ConfigurationException;
use TopDeliverabilityVendor\Auth0\SDK\Exception\NetworkException;
use TopDeliverabilityVendor\Auth0\SDK\Exception\StateException;
use TopDeliverabilityVendor\Auth0\SDK\Utility\HttpResponse;
use TopDeliverabilityVendor\GuzzleHttp;
use TopDeliverabilityVendor\League\Uri\Uri;
use TopDeliverabilityVendor\League\Uri\UriModifier;
use WP_Http;

class Auth0Authenticator {

	/**
	 * @var Auth0
	 */
	private $auth0;

	/**
	 * @var Uri
	 */
	private $redirectBaseUrl;

	/**
	 * @var string
	 */
	private $callbackPageSlug;

	/**
	 * @var string
	 */
	private $audience;

	/**
	 * @param string             $domain
	 * @param string             $clientId
	 * @param string             $clientSecret
	 * @param string             $audience
	 * @param string             $callbackPageSlug
	 * @param string             $redirectBaseUrl
	 * @param CookieSecretOption $cookieSecretOption
	 * @param TokenOption        $tokenOption
	 */
	public function __construct(
		$domain,
		$clientId,
		$clientSecret,
		$audience,
		$callbackPageSlug,
		$redirectBaseUrl,
		CookieSecretOption $cookieSecretOption,
		TokenOption $tokenOption
	) {
		$cookieSecretOption->initialise();
		$httpFactory            = new GuzzleHttp\Psr7\HttpFactory();
		$this->auth0            = new Auth0(
			array(
				'domain'              => $domain,
				'clientId'            => $clientId,
				'clientSecret'        => $clientSecret,
				'cookieSecret'        => $cookieSecretOption->get(),
				'scope'               => array(
					'offline_access',
					'wordpress_plugin',
				),
				'audience'            => array( $audience ),
				'httpClient'          => new GuzzleHttp\Client(),
				'httpRequestFactory'  => $httpFactory,
				'httpResponseFactory' => $httpFactory,
				'httpStreamFactory'   => $httpFactory,
			)
		);
		$this->audience         = $audience;
		$this->callbackPageSlug = $callbackPageSlug;
		$this->redirectBaseUrl  = Uri::createFromString( $redirectBaseUrl );

		$token = $tokenOption->get();

		if ( $token !== null ) {
			/** @noinspection PhpParamsInspection */
			$this->auth0->setRefreshToken( $token->getRefresh() );
			/** @noinspection PhpParamsInspection */
			$this->auth0->setAccessToken( $token->getAccess() );
			/** @noinspection PhpParamsInspection */
			$this->auth0->setAccessTokenExpiration( $token->getExpiration()->getTimestamp() );
		}
	}

	/**
	 * @param string $connection
	 * @return string
	 *
	 * How to create a working login link:
	 * https://auth0.com/docs/get-started/authentication-and-authorization-flow/call-your-api-using-the-authorization-code-flow
	 */
	public function getLoginLink( $connection ) {
		$localRedirectUrl = Uri::createFromString( admin_url( 'admin.php' ) );
		$localRedirectUrl = UriModifier::appendQuery( $localRedirectUrl, "page=$this->callbackPageSlug" );
		$localRedirectUrl = UriModifier::appendQuery( $localRedirectUrl, "social-login=$connection" );
		$localRedirectUrl = urlencode( $localRedirectUrl );

		$topDeliverabilityRedirectUrl = UriModifier::appendQuery( $this->redirectBaseUrl, "td_redirect=$localRedirectUrl" );
		$topDeliverabilityRedirectUrl = urlencode( $topDeliverabilityRedirectUrl );

		$loginLink = Uri::createFromString( $this->auth0->configuration()->formatDomain() );
		$loginLink = UriModifier::addBasePath( $loginLink, '/authorize' );
		$loginLink = UriModifier::appendQuery( $loginLink, 'response_type=code' );
		$loginLink = UriModifier::appendQuery( $loginLink, 'client_id=' . $this->auth0->configuration()->getClientId() );
		$loginLink = UriModifier::appendQuery( $loginLink, "redirect_uri=$topDeliverabilityRedirectUrl" );
		$loginLink = UriModifier::appendQuery( $loginLink, 'scope=wordpress_plugin offline_access' );
		$loginLink = UriModifier::appendQuery( $loginLink, "audience=$this->audience" );

		return (string) UriModifier::appendQuery( $loginLink, "connection=$connection" );
	}

	/**
	 * @param string $code
	 * @param string $redirectUrl
	 *
	 * @return Token
	 * @throws Exception
	 */
	public function codeExchange( $code, $redirectUrl ) {
		$user = null;

		$response = $this->auth0->authentication()->codeExchange( $code, $redirectUrl );

		if ( ! HttpResponse::wasSuccessful( $response ) ) {
			$this->auth0->clear();
			throw StateException::failedCodeExchange();
		}

		$response = HttpResponse::decodeContent( $response );

		/** @var array{access_token?: string, scope?: string, refresh_token?: string, id_token?: string, expires_in?: int|string} $response */

		if ( ! isset( $response['access_token'] ) || trim( $response['access_token'] ) === '' ) {
			$this->auth0->clear();
			throw StateException::badAccessToken();
		}

		$this->auth0->setAccessToken( $response['access_token'] );

		if ( isset( $response['scope'] ) ) {
			$this->auth0->setAccessTokenScope( explode( ' ', $response['scope'] ) );
		}

		if ( isset( $response['refresh_token'] ) ) {
			$this->auth0->setRefreshToken( $response['refresh_token'] );
		}

		if ( isset( $response['expires_in'] ) && is_numeric( $response['expires_in'] ) ) {
			$expiresIn = time() + (int) $response['expires_in'];
			/** @noinspection PhpParamsInspection */
			$this->auth0->setAccessTokenExpiration( $expiresIn );
		}

		if ( $user === null || $this->auth0->configuration()->getQueryUserInfo() ) {
			$response = $this->auth0->authentication()->userInfo( $response['access_token'] );

			if ( HttpResponse::wasSuccessful( $response ) ) {
				$user = HttpResponse::decodeContent( $response );
			}
		}

		if ( ! $user ) {
			$user = array();
		}

		$this->auth0->setUser( $user );

		return $this->getToken();
	}

	/**
	 * @param $username
	 * @param $password
	 * @return Token | InvalidCredentials | LoginError
	 */
	public function login( $username, $password ) {
		try {
			$response = $this->auth0->authentication()->loginWithDefaultDirectory(
				$username,
				$password,
				array(
					'scope'    => 'offline_access',
					'audience' => $this->audience,
				)
			);

			if ( $response->getStatusCode() == WP_Http::OK ) {
				$response = HttpResponse::decodeContent( $response );

				$now            = new DateTimeImmutable();
				$expiresIn      = $response['expires_in'];
				$expirationDate = $now->add( new DateInterval( "PT{$expiresIn}S" ) );

				$this->auth0->setRefreshToken( $response['refresh_token'] );
				$this->auth0->setAccessTokenExpiration( $response['expires_in'] );

				return new Token(
					$response['access_token'],
					$response['refresh_token'],
					$expirationDate
				);

			} elseif ( $response->getStatusCode() == WP_Http::FORBIDDEN ) {
				return new InvalidCredentials();
			} else {
				return new LoginError( $response->getStatusCode() );
			}
		} catch ( Exception $e ) {
			wp_die( $e->getMessage() );
		}
	}

	/**
	 * @param string $redirectUrl
	 *
	 * @return string
	 */
	public function signup( $redirectUrl ) {
		$this->auth0->clear();

		try {
			/** @noinspection PhpParamsInspection */
			return $this->auth0->signup( $redirectUrl );
		} catch ( ConfigurationException $e ) {
			wp_die( $e->getMessage() );
		}
	}

	/**
	 * @return Token
	 * @throws Exception
	 */
	public function renewToken() {
		$this->auth0->renew();

		return self::toToken( $this->auth0 );
	}

	/**
	 * @param string $redirectUrl
	 *
	 * @return Token
	 */
	public function handleCallback( $redirectUrl ) {
		try {
			/** @noinspection PhpParamsInspection */
			$this->auth0->exchange( $redirectUrl );

			return $this->getToken();
		} catch ( NetworkException $e ) {
			wp_die( $e->getMessage() );
		} catch ( StateException $e ) {
			wp_die( $e->getMessage() );
		}
	}

	/**
	 * @return Token
	 */
	public function getToken() {
		return self::toToken( $this->auth0 );
	}

	/**
	 * @param Auth0 $auth0
	 *
	 * @return Token
	 */
	private static function toToken( Auth0 $auth0 ) {
		return Token::create(
			$auth0->getAccessToken(),
			$auth0->getRefreshToken(),
			$auth0->getAccessTokenExpiration()
		);
	}
}
