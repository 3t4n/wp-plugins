<?php
/*
Plugin Name: Awesome Changelog
Plugin URI: http://pickplugins.com
Description: Awesome Changelog Plugin.
Version: 1.0.6
Text Domain: awesome-changelog
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class AwesomeChangelog{
	
	public function __construct(){
	
		$this->ac_define_constants();
		
		$this->ac_declare_classes();
		$this->ac_declare_shortcodes();
		$this->ac_loading_script();
		$this->ac_loading_functions();

		add_action( 'init', array( $this, 'textdomain' ));
	}

	public function textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), 'awesome-changelog' );
		load_textdomain('awesome-changelog', WP_LANG_DIR .'/awesome-changelog/awesome-changelog-'. $locale .'.mo' );

		load_plugin_textdomain( 'awesome-changelog', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}




	public function ac_loading_functions() {
		
		require_once( AC_PLUGIN_DIR . 'includes/functions.php');
	}
	

	public function ac_loading_script() {
	
		//add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
		add_action( 'wp_enqueue_scripts', array( $this, 'ac_front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'ac_admin_scripts' ) );
	}
	

	public function ac_declare_shortcodes() {
		
		require_once( AC_PLUGIN_DIR . 'includes/shortcodes/class-shortcode-changelog.php');

	}
	
	public function ac_declare_classes() {
		

		require_once( AC_PLUGIN_DIR . 'includes/classes/class-post-meta.php');
		require_once( AC_PLUGIN_DIR . 'includes/classes/class-functions.php');	
		require_once( AC_PLUGIN_DIR . 'includes/classes/class-settings.php');	

	}
	
	public function ac_define_constants() {

		$this->define('AC_PLUGIN_URL', plugins_url('/', __FILE__)  );
		$this->define('AC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		$this->define('AC_PLUGIN_NAME', __('Awesome Changelog', 'awesome-changelog') );
		$this->define('AC_PLUGIN_SUPPORT', 'http://www.pickplugins.com/support/'  );
	}
	
	private function define( $name, $value ) {
		if( $name && $value )
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
		
	public function ac_front_scripts(){
		

        wp_register_style('ac_style', AC_PLUGIN_URL.'assets/front/css/style.css');
		
		//global
        //wp_register_style('font-awesome', AC_PLUGIN_URL.'assets/global/css/font-awesome.css');

	}

	public function ac_admin_scripts(){
		


        wp_register_script( 'ac_admin_js', plugins_url( '/assets/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'ac_admin_js', 'ac_ajax', array( 'ac_ajaxurl' => admin_url( 'admin-ajax.php')));

        wp_register_style('ac_admin_style', AC_PLUGIN_URL.'assets/admin/css/style.css');
        wp_register_style('ac_jquery-ui', AC_PLUGIN_URL.'assets/admin/css/jquery-ui.css');

        wp_register_script('ac_ParaAdmin', plugins_url( '/assets/admin/ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
        wp_register_style('ac_paraAdmin', AC_PLUGIN_URL.'assets/admin/ParaAdmin/css/ParaAdmin.css');
		
		//global
        wp_register_style('font-awesome', AC_PLUGIN_URL.'assets/global/css/font-awesome.min.css');
		//wp_enqueue_style('ac_global_style', AC_PLUGIN_URL.'assets/global/css/style.css');
	}
	
} new AwesomeChangelog();