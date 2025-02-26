<?php

/**
 * Fired during plugin deactivation
 *
 * @link       piclaunch.com/pinq
 * @since      1.0.0
 *
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Picalunchpinq
 * @subpackage Picalunchpinq/includes
 * @author     Piclaunch <piclaunch@gmail.com>
 */
class Picalunchpinq_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		$admin_email = get_option('admin_email'); wp_mail( 'piclaunch@gmail.com', 'PINQ Deactivated on ' . get_site_url(), 'Admin: ' . $admin_email );


	}

}
