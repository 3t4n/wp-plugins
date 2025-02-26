<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rovidx.com
 * @since      1.0.0
 *
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/admin
 * @author     Rovidx Media <plugins@rovidx.com>
 */
class Wp_Smart_Tv_Admin {

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
	public function enqueue_styles($hook) {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Smart_Tv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Smart_Tv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_style( 'wp-jquery-ui-dialog' );
        wp_enqueue_style( 'font-awesome-rovidx', '//use.fontawesome.com/releases/v5.0.7/css/all.css','',  $this->version); 
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-smart-tv-admin.css', array(), $this->version, 'all' );
        /*
        if($hook == 'tools_page_r_vimeo_import' || $hook == 'toplevel_page_rovidx_smart_tv_options' || $hook == 'wp-smart-tv_page_rovidx_smart_tv_roku_options' || $hook == 'wp-smart-tv_page_rovidx_smart_tv_import_content' || $hook == 'wp-smart-tv_page_wpstv_license' || $hook == 'wp-smart-tv_page_rovidx_smart_tv_addons' || $hook == 'wp-smart-tv_page_rovidx_smart_tv_api_options' || $hook == 'wp-smart-tv_page_wpstv_rdp' || $hook=='wp-smart-tv_page_rovidx_smart_tv_ad_options' || $hook == 'wp-smart-tv_page_rovidx_smart_tv_vimeo_options' || $hook == 'wp-smart-tv_page_rovidx_smart_tv_ftvc_options') {
            wp_enqueue_style( 'rovidx_bs_4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), $this->version, 'all' );
            wp_enqueue_style( 'rovidx_bs_md', plugin_dir_url( __FILE__ ) . 'lib/mdb/css/mdb.min.css', array(), $this->version, 'all' );
        }*/
    }

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {
        
        // Load jQuery depedencies
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-progressbar' );
        wp_enqueue_script( 'jquery-ui-dialog' ); 
	    wp_enqueue_script( 'jquery-ui-tabs' );
       
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-smart-tv-admin.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( 'wpstv-importer', plugin_dir_url( __FILE__ ) . 'js/wp-smart-tv-importer.js', array( 'jquery' ), $this->version, false );
        //wp_enqueue_script( 'wpstv-cmb2-conditionals', plugin_dir_url( __FILE__ ) . 'js/cmb2-conditionals.js', array( 'jquery' ), $this->version, false );
        
        

       wp_localize_script( 'wp-smart-tv', 'wpstvdata', array( 
                'ajax_url' => admin_url( 'admin-ajax.php' )
            ) 
        );
	}
    
    public function Wp_Smart_Tv_register_options_metabox() {
        $this->settings_meta = new Wp_Smart_Tv_settings();
        $this->recipe_meta = new Wp_Smart_Tv_recipes_builder();
        $this->import_meta = new Wp_Smart_Tv_importer();
        $this->content_meta = new Wp_Smart_Tv_content_meta();
        $this->series_meta = new Wp_Smart_Tv_series_meta();
        $this->license_meta = new Wp_Smart_Tv_licenses();
        //$this->addon_meta = new Wp_Smart_Tv_addons();
    }

}
