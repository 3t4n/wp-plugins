<?php

/**
 * Fired during plugin activation
 *
 * @link       www.piclaunch.com/
 * @since      1.0.0
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ampnonampads
 * @subpackage Ampnonampads/includes
 * @author     Piclaunch <Piclaunch@gmail.com>
 */
class Ampnonampads_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$admin_email = get_option('admin_email'); wp_mail( 'piclaunch@gmail.com', 'AMP AUto Ads Activated on ' . get_site_url(), 'Admin: ' . $admin_email );

	}

}
