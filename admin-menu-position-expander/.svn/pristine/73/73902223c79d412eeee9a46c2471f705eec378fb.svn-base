<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.aod-tech.com/wordpress/plugins/admin-menu-position-expander/
 * @since      1.0.0
 *
 * @package    Admin_Menu_Position_Expander
 * @subpackage Admin_Menu_Position_Expander/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Admin_Menu_Position_Expander
 * @subpackage Admin_Menu_Position_Expander/includes
 * @author     Jonathan Horowitz <jhorowitz@aod-tech.com>
 */
class Admin_Menu_Position_Expander_i18n {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * Define the internationalization functionality.
	 *
	 * Set the plugin name.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name ) {

		$this->plugin_name = $plugin_name;

	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			$this->plugin_name,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
