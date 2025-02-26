<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://envytheme.com/
 * @since      1.1
 *
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/admin
 * @author     EnvyTheme <hello@EnvyTheme.com>
 */
class Envy_Notifs_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.1
	 */
	public function enqueue_styles() {

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.1
	 */
	public function enqueue_scripts() {

	}

}
