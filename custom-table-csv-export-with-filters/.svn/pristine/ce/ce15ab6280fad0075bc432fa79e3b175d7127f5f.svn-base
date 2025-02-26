<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.indianic.com
 * @since      1.0.0
 *
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/admin
 * @author     indianic <help@indianic.com>
 */
class Custom_Table_Csv_Admin {

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
		 * defined in Custom_Table_Csv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Table_Csv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/custom-table-csv-admin.css', array(), $this->version, 'all' );

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
		 * defined in Custom_Table_Csv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Custom_Table_Csv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-table-csv-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'ctc_front_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' )			
		));

	}
	public function ctc_add_admin_menu()
    { 
		$ctc_admin_page = add_menu_page( "Custom Table export", "Custom Table export", 'manage_options', $this->plugin_name . '-ctc', array( $this, 'page_ctc' ),'dashicons-database-export'); 		
	}
	public function ctc_add_screen_options(){
		$option = 'per_page';
  		$args = array(
			'label' => 'Records per page',
			'default' => 10,
			'option' => 'ctc_per_page'
			);
  		add_screen_option( $option, $args );
	}
	 
	public function page_ctc() {		 
		include( plugin_dir_path( __FILE__ ) . 'partials/custom-table-csv-admin-display.php' );
	}
	public function test_table_set_option($status, $option, $value) {
		return $value;
	}

	 
}
