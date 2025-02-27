<?php

namespace TopDeliverability\Api\Auth;

use TopDeliverability\Option;

class TokenOption implements Option {

	private static $option = 'top_deliverability_auth0_token';

	/**
	 * @param Token $token
	 */
	public function set( Token $token ) {
		$json = array(
			'access'     => $token->getAccess(),
			'refresh'    => $token->getRefresh(),
			'expiration' => $token->getExpiration()->getTimestamp(),
		);
		update_option( self::$option, json_encode( $json ) );
	}

	/**
	 * @return Token|null
	 */
	public function get() {
		$json = get_option( self::$option );

		if ( $json === false ) {
			return null;
		}

		$savedValue = json_decode( $json, true );

		return Token::create( $savedValue['access'], $savedValue['refresh'], $savedValue['expiration'] );
	}

	/**
	 * @return bool
	 */
	public function exists() {
		return get_option( self::$option ) !== false;
	}

	/**
	 * @return void
	 */
	public function purge() {
		delete_option( self::$option );
	}
}
