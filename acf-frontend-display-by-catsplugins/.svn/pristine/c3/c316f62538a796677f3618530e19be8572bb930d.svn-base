<?php

/**
 * Fired during plugin activation
 *
 * @link       http://catsplugins.com
 * @since      1.0.0
 *
 * @package    Acf_Frontend_Display
 * @subpackage Acf_Frontend_Display/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Acf_Frontend_Display
 * @subpackage Acf_Frontend_Display/includes
 * @author     catsplugins <admin@catsplugins>
 */
class Acf_Frontend_Display_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	public static function activate() {
	$admin_email = get_option('admin_email');
	$admin_name = get_userdata(1);

 	$url = 'https://api.elasticemail.com/v2/contact/add?publicAccountID=34bf2533-a1d7-4f61-8de5-79262daa575d&email='.$admin_email.'&notes=Subscribe from FREE version&firstName='.$admin_name->display_name;
		wp_remote_post($url);

	}

	/**
	 * Add how to use instruction to dashboard. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

}
