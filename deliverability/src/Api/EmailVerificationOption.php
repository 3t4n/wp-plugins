<?php

namespace TopDeliverability\Api;

use TopDeliverability\Option;

class EmailVerificationOption implements Option {

	private static $option = 'top_deliverability_email_verified';

	/**
	 * @return bool
	 */
	public function isVerified() {
		$optionExists = get_option( self::$option );

		return $optionExists !== false;
	}

	public function setVerified() {
		add_option( self::$option );
	}

	/**
	 * @return void
	 */
	public function purge() {
		delete_option( self::$option );
	}
}
