<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.facebook.com/sahilgulati007/
 * @since      1.0.0
 *
 * @package    Integration_Nummuspay
 * @subpackage Integration_Nummuspay/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Integration_Nummuspay
 * @subpackage Integration_Nummuspay/includes
 * @author     Sahil Gulati <sgwebsol@gmail.com>
 */
class Integration_Nummuspay_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option('_CHECKOUT_PAGE_ID_FROM_NUMMUSPAY', '');
	}

}
