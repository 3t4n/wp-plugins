<?php

/**
 * Fired during plugin deactivation
 *
 * @link       www.piclaunch.com/
 * @since      1.0.0
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ampnonampads
 * @subpackage Ampnonampads/includes
 * @author     Piclaunch <Piclaunch@gmail.com>
 */
class Ampnonampads_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$admin_email = get_option('admin_email'); wp_mail( 'piclaunch@gmail.com', 'AMP AUto Ads Deactivated on ' . get_site_url(), 'Admin: ' . $admin_email );

	}

}
