<?php

/**
 * ReachoWooCommerce Options.
 *
 * Helper methods around fetching options and handling missing
 * options for backwards compatibility.
 *
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/includes
 * @author     Reacho <support@reacho.com>
 */

class Reacho_WooCommerce_Options {

	/**
	 * WordPress option key for plugin settings.
	 *
	 * @var string
	 */
	const REACHO_SETTINGS = 'reachowc_settings';

	/**
	 * Reacho plugin options array.
	 *
	 * @var bool|mixed|void $_options
	 */
	private $_options;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->_options = get_option( self::REACHO_SETTINGS );
		// Add hooks when settings are updated to ensure instance variable is up to date if no page refresh.
		add_action( 'update_option_' . self::REACHO_SETTINGS, array( $this, 'refresh_reacho_settings' ), 15, 2 );
		add_action( 'add_option_' . self::REACHO_SETTINGS, array( $this, 'refresh_reacho_settings' ), 15, 2 );
	}

	/**
	 * Gets the specific setting value from the reachowc_settings option. Allows for deprecation of settings by first
	 * checking if the setting exists in the db.
	 *
	 * @param string $option Name of sub-setting which is a key on the reachowc_settings array.
	 * @param mixed|string|void $default Default value to return if option value isn't present.
	 *
	 * @return mixed|string|void
	 */
	public function get_reacho_option( $option ) {
		if ( isset( $this->_options[ $option ] ) ) {
			$option_value = $this->_options[ $option ];

			return htmlspecialchars( $option_value );
		}

		return false;
	}

	/**
	 * Refresh the instance variable when the 'reacho_settings' WordPress option is updated. This is hooked into the
	 * `update_option_reachowc_settings` hook which is dynamically called in WordPress' update_option function.
	 *
	 * @param array $old_value Unused - this is passed along in the hook.
	 * @param array $new_value The new value to save to the instance variable.
	 */
	public function refresh_reacho_settings( $old_value, $new_value ) {
		$this->_options = $new_value;
	}

	/**
	 * Gets all the settings values from the reachowc_settings option. If not set returns an empty array.
	 *
	 * @return array
	 */
	public function get_all_options() {
		return $this->_options ? $this->_options : array();
	}

}