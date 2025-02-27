<?php

namespace TopDeliverability\Api\Auth;

use Exception;
use TopDeliverability\Option;

class CookieSecretOption implements Option {

	private static $option = 'top_deliverability_auth0_cookie_secret';
	private static $lock   = 'top_deliverability_auth0_cookie_secret_lock';

	/**
	 * @return string
	 */
	public function name() {
		return self::$option;
	}

	/**
	 * @return void
	 */
	public function initialise() {

		$lock = wp_cache_add( self::$lock, true, '', 10 );

		if ( $lock ) {
			$currentValue = get_option( self::$option );

			if ( empty( $currentValue ) ) {
				try {
					/**
					 * @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection
					 * we don't support PHP<=5.6 because it went EOL on 2018-12-31
					 */
					$value = bin2hex( random_bytes( 32 ) );
				} catch ( Exception $e ) {
					wp_die( $e->getMessage() );
				}

				update_option( self::$option, $value );
			}

			wp_cache_delete( self::$lock );
		}
	}

	/**
	 * @return string|false
	 */
	public function get() {
		return get_option( self::$option );
	}

	public function defaultValue() {
		return null;
	}

	/**
	 * @return void
	 */
	public function purge() {
		delete_option( self::$option );
	}
}
