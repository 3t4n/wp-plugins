<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://harryrobinsondev.com
 * @since      1.0.0
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/includes
 * @author     Harry Robinson <harry.robo14@yahoo.co.uk>
 */
class Wp_Smoother_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
	if ( get_option( 'wp-smoother' ) != false ) {
		delete_option( 'wp-smoother' );
	}
	}

}
