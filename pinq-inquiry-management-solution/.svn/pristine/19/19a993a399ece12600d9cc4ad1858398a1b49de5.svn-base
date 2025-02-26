<?php

/**
 * Fired during plugin activation
 *
 * @link       piclaunch.com/pinq
 * @since      1.1
 *
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.1
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/includes
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Picalunchpinq_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$admin_email = get_option('admin_email'); wp_mail( 'piclaunch@gmail.com', 'PINQ Activated on ' . get_site_url(), 'Admin: ' . $admin_email );


	}

}
