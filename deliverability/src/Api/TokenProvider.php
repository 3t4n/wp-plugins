<?php

namespace TopDeliverability\Api;

use DateInterval;
use TopDeliverability\Api\Auth\Auth0Authenticator;
use TopDeliverability\Api\Auth\Token;
use TopDeliverability\Api\Auth\TokenOption;
use TopDeliverability\Clock;

class TokenProvider {

	/**
	 * @var DateInterval
	 */
	private $interval;

	/**
	 * @var TokenOption
	 */
	private $tokenOption;

	/**
	 * @var Clock
	 */
	private $clock;

	/**
	 * @var Auth0Authenticator
	 */
	private $auth0Authenticator;

	/**
	 * @param TokenOption        $tokenOption
	 * @param Clock              $clock
	 * @param Auth0Authenticator $auth0Authenticator
	 */
	public function __construct( TokenOption $tokenOption, Clock $clock, Auth0Authenticator $auth0Authenticator ) {
		$this->interval           = new DateInterval( 'PT5M' );
		$this->tokenOption        = $tokenOption;
		$this->clock              = $clock;
		$this->auth0Authenticator = $auth0Authenticator;
	}

	/**
	 * @return Token
	 */
	public function get() {
		$token = $this->tokenOption->get();

		if ( $token === null ) {
			return null;
		}

		$now            = $this->clock->now();
		$expirationDate = $this->tokenOption->get()->getExpiration();
		$renewalLimit   = $expirationDate->sub( $this->interval );

		if ( $now > $renewalLimit ) {
			$renewedToken = $this->auth0Authenticator->renewToken();
			$this->tokenOption->set( $renewedToken );

			return $renewedToken;
		}

		return $this->tokenOption->get();
	}
}
