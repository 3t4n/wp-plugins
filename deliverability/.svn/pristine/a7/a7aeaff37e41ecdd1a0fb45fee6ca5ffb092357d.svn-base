<?php

namespace TopDeliverability\Plugin;

use TopDeliverability\Option;

class UninstallationPurgingOption implements Option {

	private static $option = 'top_deliverability_uninstallation_purging_enabled';

	public function purge() {
		delete_option( self::$option );
	}

	/**
	 * @return boolean
	 */
	public function isEnabled() {
		$optionExists = get_option( self::$option );

		return $optionExists !== false;
	}

	/**
	 * @param boolean $value
	 */
	public function set( $value ) {
		if ( $value ) {
			add_option( self::$option );
		} else {
			delete_option( self::$option );
		}
	}
}
