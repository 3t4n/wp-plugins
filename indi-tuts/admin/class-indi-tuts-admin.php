<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.indigorise.de
 * @since      1.0.0
 *
 * @package    Indi_Tuts
 * @subpackage Indi_Tuts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Indi_Tuts
 * @subpackage Indi_Tuts/admin
 * @author     Alvaro Moreno <info@indi-design.de>
 */
class Indi_Tuts_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Indi_Tuts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Indi_Tuts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/indi-tuts-admin.css', array(), $this->version, 'all' );

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
		 * defined in Indi_Tuts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Indi_Tuts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/indi-tuts-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * 26.11.2017 - Display INDI-Tuts page 
	 *
	 *since      1.0.0
	 */
	public function indi_tuts_menu(){

  add_menu_page( 'INDI Tutorials',
                 'INDI-Tutorial', 
                 'manage_options', 
                 'indi_tuts', 
                 array($this, 'indi_showPage'), 
                 'dashicons-video-alt3', 
                 4 );
}

	
	public function indi_showPage() {
		if (current_user_can('indi-user')) {
		include_once 'partials/indi-tuts-user-display.php';
		} elseif (current_user_can('indi-blogger'))  {  
			include_once 'partials/indi-tuts-blogger-display.php';
			} elseif (current_user_can('indi-editor'))  {  
				include_once 'partials/indi-tuts-editor-display.php';
				} elseif (current_user_can('indi-manager'))  {  
					include_once 'partials/indi-tuts-manager-display.php';
					} elseif (current_user_can('indi-admin'))  {  
						include_once 'partials/indi-tuts-admin-display.php';
						} elseif (current_user_can('administrator'))  {  
							include_once 'partials/indi-tuts-admin-display.php';
							}	
	}
}
