<?php

/**
 * Fired during plugin activation
 *
 * @link       http://mockupplugin.com
 * @since      1.6.3
 *
 * @package    MockUp
 * @subpackage MockUp/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.6.3
 * @package    MockUp
 * @subpackage MockUp/includes
 * @author     Eelco Tjallema <mail@estjallema.nl>
 */
class MockUp_Activator {

	/**
	 * On activation flush the rewrite rules.
	 *
	 * @since  1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-mockup-admin.php';

		MockUp_Admin::register_cpt();
		MockUp_Admin::register_taxonomy();

		flush_rewrite_rules();

	}

}