<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MultiManager_WP
 * @subpackage MultiManager_WP/admin
 */
class MultiManager_WP_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $MultiManager_WP    The ID of this plugin.
	 */
	private $MultiManager_WP;

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
	 * @param      string    $MultiManager_WP       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $MultiManager_WP, $version ) {

		$this->MultiManager_WP = $MultiManager_WP;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in MultiManager_WP_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MultiManager_WP_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->MultiManager_WP, plugin_dir_url( __FILE__ ) . 'css/multi-manager-wp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in MultiManager_WP_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MultiManager_WP_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->MultiManager_WP, plugin_dir_url( __FILE__ ) . 'js/multi-manager-wp-admin.js', array( 'jquery' ), $this->version, false );

	}

}
