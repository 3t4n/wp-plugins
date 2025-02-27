<?php

namespace TopDeliverability;

class AccountIdOption implements Option {

	private static $option = 'top_deliverability_account_id';

	/**
	 * @param string $value
	 */
	public function set( $value ) {
		add_option( self::$option, $value );
	}

	/**
	 * @return string|null
	 */
	public function get() {
		$value = get_option( self::$option );

		if ( $value === false ) {
			return null;
		} else {
			return $value;
		}
	}

	/**
	 * @return void
	 */
	public function purge() {
		delete_option( self::$option );
	}
}
