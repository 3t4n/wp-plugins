<?php

/*
Plugin Name: Remove/Hide Admin Toolbar
Plugin URI:  https://www.purrlydigital.com/plugins/remove-admin-toolbar
Description: Removes/hides the admin toolbar from the front end of the site when activated
Version:     1.2.4
Author:      Purrly Digital LLC
Author URI:  https://www.purrlydigital.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: purrly-digital-remove-admin-toolbar
Requires PHP: 7.0
Requires at least: 5.3
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

class PurrlyDigital_Remove_Admin_Toolbar {

	private static $instance;

	/*
	 * @since v1.0
	 */
	public static function get_instance() {

		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/*
	 * @since v1.0
	 */
	public function __construct() {

		add_filter( 'show_admin_bar', array( 'PurrlyDigital_Remove_Admin_Toolbar', 'show_admin_bar' ), PHP_INT_MAX );

	}

	/*
	 * @since v1.0
	 */
	public static function show_admin_bar() {

		return apply_filters( 'purrlydigital_remove_admin_toolbar', FALSE );

	}

}

$PurrlyDigital_Remove_Admin_Toolbar = PurrlyDigital_Remove_Admin_Toolbar::get_instance();
