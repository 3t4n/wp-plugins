<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.6.0
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/admin
 * @author     Foteini Giannaropoulou <giannaropoulou.foteini@exitbee.com>
 */
class Exit_Bee_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.6.0
	 * @param    string $plugin_name   The name of this plugin.
	 * @param    string $version       The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for the Admin facing functionality.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Exit_Bee_Settings. Registers the admin settings and page.
	 *
	 * @since    1.6.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-exit-bee-settings.php';
	}
}
