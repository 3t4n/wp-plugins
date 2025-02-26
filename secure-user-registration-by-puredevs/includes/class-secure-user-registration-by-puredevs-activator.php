<?php

/**
 * Fired during plugin activation
 *
 * @link       https://puredevs.com
 * @since      1.0.0
 *
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/includes
 * @author     puredevs <admin@puredevs.com>
 */
class Pdsrw_Secure_User_Registration_by_PureDevs_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function pdsrw_activate() {
		if ( ! get_option( 'pdsrw_enable_nonce' ) ) {
			update_option( 'pdsrw_enable_nonce', 'yes' );
		}
	}

}
