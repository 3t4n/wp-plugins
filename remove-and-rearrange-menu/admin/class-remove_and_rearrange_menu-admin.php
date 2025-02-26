<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/shahbrijesh1992/
 * @since      1.0.0
 *
 * @package    Remove_and_rearrange_menu
 * @subpackage Remove_and_rearrange_menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Remove_and_rearrange_menu
 * @subpackage Remove_and_rearrange_menu/admin
 * @author     Brijesh Shah <shahbrijesh.1992@gmail.com>
 */
class Remove_and_rearrange_menu_Admin {

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
		 * defined in Remove_and_rearrange_menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Remove_and_rearrange_menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/remove_and_rearrange_menu-admin.css', array(), $this->version, 'all' );

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
		 * defined in Remove_and_rearrange_menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Remove_and_rearrange_menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$localizeValue = array(
		    'ajaxUrl' => admin_url('admin-ajax.php')	    
		);

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/remove_and_rearrange_menu-admin.js', array( 'jquery' ), $this->version, false );		
		wp_localize_script( $this->plugin_name , 'menu_obj', $localizeValue );
		wp_enqueue_script ( $this->plugin_name );
		
}

}
