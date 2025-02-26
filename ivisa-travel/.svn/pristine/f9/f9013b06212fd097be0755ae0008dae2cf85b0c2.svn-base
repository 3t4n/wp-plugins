<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ivisa.com/
 * @since      1.0.0
 *
 * @package    Ivisa
 * @subpackage Ivisa/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ivisa
 * @subpackage Ivisa/admin
 * @author     iVisa.com <help@ivisa.com>
 */
class Ivisa_Admin {

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
		 * defined in Ivisa_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ivisa_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ivisa-admin.css', array(), $this->version, 'all' );

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
		 * defined in Ivisa_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ivisa_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ivisa-admin.js', array( 'jquery' ), $this->version, false );
    }

  // https://scotch.io/tutorials/how-to-build-a-wordpress-plugin-part-1
  public function add_plugin_admin_menu() {
    // Administration Menus: http://codex.wordpress.org/Administration_Menus
    add_options_page( 'iVisa Plugin Setup', 'iVisa Travel', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
  }
  
  public function add_action_links( $links ) {
      // Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
     $settings_link = array('<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',);
     return array_merge(  $settings_link, $links );

  }
  
  public function display_plugin_setup_page() {
    include_once( 'partials/ivisa-admin-display.php' );
  }

  public function validate($post_data) {
    // Returns an array of settings that will persist into the WP database
    
    return array('affiliate_code'=>strtolower(isset($post_data['affiliate_code'])? $post_data['affiliate_code'] : ''), 
                 'show_powered_by'=> (isset($post_data['show_powered_by']) && !empty($post_data['show_powered_by']))? 1:0 
                );
  }

  public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
  }
 
}
