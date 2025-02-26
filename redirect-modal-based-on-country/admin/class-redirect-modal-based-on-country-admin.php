<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/David-Kurniawan/
 * @since      1.0.0
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/admin
 * @author     David Kurniawan <jatinangorservice@gmail.com>
 */
class Redirect_Modal_Based_On_Country_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register sub menu
	 *
	 * @since    1.0.0
	 */
	public function rmboc_register_sub_menu() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-redirect-modal-based-on-country-admin-menu.php';
		$menu = new Redirect_Modal_Based_On_Country_Admin_Menu();
		$menu->rmboc_run();
	}

}
