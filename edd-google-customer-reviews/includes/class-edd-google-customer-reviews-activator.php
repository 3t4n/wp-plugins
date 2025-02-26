<?php

/**
 * Fired during plugin activation
 *
 * @link       test.com
 * @since      1.0.0
 *
 * @package    EDD_Google_Customer_Reviews_Activator
 * @subpackage EDD_Google_Customer_Reviews_Activator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    EDD_Google_Customer_Reviews_Activator
 * @subpackage EDD_Google_Customer_Reviews_Activator/includes
 * @author     David Davis <david.davis@dcgws.com>
 */

class EDD_Google_Customer_Reviews_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		  set_transient( 'gcr-admin-notice-activation', true, 5 );   			
	}
	

}
