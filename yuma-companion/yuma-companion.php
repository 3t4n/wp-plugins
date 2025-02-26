<?php
/**
 * Plugin Name: Yuma Companion
 * Plugin URI: https://www.sharkthemes.com
 * Description: Add a supportive features, demos and options for Yuma Free and Pro Themes.
 * Version: 1.0.4
 * Author: Shark Themes
 * Author URI: https://sharkthemes.com
 * Requires at least: 5.0
 * Tested up to: 6.5.2
 *
 * Text Domain: yuma-companion
 * Domain Path: /languages/
 *
 * @package Yuma Companion
 * @category Core
 * @author Shark Themes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class ST_Yuma_Companion {

	public function __construct()
	{
		$this->constant();
		if ( ! $this->check_theme() ) {
			return;
		}
		add_action( 'init', array( $this, 'customizer_register' ) );
		add_action( 'init', array( $this, 'welcome_page' ) );
		add_action( 'init', array( $this, 'admin_enqueue' ) );
		add_action( 'init', array( $this, 'options' ) );
		add_action( 'init', array( $this, 'demo_import' ) );
	}

	public function constant()
	{
		define( 'YUMA_COMPANION_BASE_PATH', dirname(__FILE__ ) );
		define( 'YUMA_COMPANION_URL_PATH', plugin_dir_url(__FILE__ ) );
		define( 'YUMA_COMPANION_PLUGIN_BASE_PATH', plugin_basename(__FILE__) );
		define( 'YUMA_COMPANION_PLUGIN_FILE_PATH', (__FILE__) );
		$theme_data = wp_get_theme();
		define( 'YUMA_COMPANION_TEXT_DOMAIN', $theme_data->get( 'TextDomain' ) );
	}

	public function check_theme()
    {
    	// check the theme
    	$themes = array( 'yuma-pro', 'yuma' );
    	if ( get_template_directory() !== get_stylesheet_directory() ) {
    		$theme_data = wp_get_theme();
    		$parent = $theme_data->get( 'Template' );
    		$child = $theme_data->get( 'TextDomain' );
    		if ( in_array( $parent, $themes ) ) {
    			array_push( $themes, $child );
    		}
    	}

    	if ( in_array( YUMA_COMPANION_TEXT_DOMAIN, $themes ) ) {
    		return true;
    	} else {
    		return false;
    	}
    }

    public static function is_pro()
    {
    	// check the pro theme
    	return ( 'yuma-pro' == YUMA_COMPANION_TEXT_DOMAIN ) ? true : false;
    }

    public function customizer_register()
    {
    	// enqueue scripts for customizer
    	add_action( 'customize_controls_enqueue_scripts', array( $this, 'customizer_enqueue' ) );
    }

    public function admin_enqueue()
    {
    	// welcome admin enqueue scripts
    	add_action( 'admin_enqueue_scripts', array( $this, 'welcome_admin_enqueue' ) );
    }

    public function welcome_page()
    {
    	// add welcome page
		include YUMA_COMPANION_BASE_PATH . '/include/welcome.php';
    }

    public function welcome_admin_enqueue( $hook )
    {
    	if ( 'appearance_page_yuma-welcome' != $hook ) {
    		return;
    	}

    	// welcome style
        wp_enqueue_style( 'st-yuma-companion-welcome-style', YUMA_COMPANION_URL_PATH . 'assets/css/welcome-style.css' );

        // welcome script
        wp_enqueue_script( 'st-yuma-companion-welcome-script', YUMA_COMPANION_URL_PATH . 'assets/js/welcome-script.js', array( 'jquery', 'jquery-ui-tabs' ), '' );
    }

    public function options()
    {
    	if ( ! $this::is_pro() ) {
    		// add customizer options
    		include YUMA_COMPANION_BASE_PATH . '/include/options.php';
    	}
    }

    public function customizer_enqueue()
	{
		if ( ! $this::is_pro() ) {

	        // customizer style
	        wp_enqueue_style( 'st-yuma-companion-customizer-style', YUMA_COMPANION_URL_PATH . 'assets/css/customizer-style.css' );
	        
	        // customizer script
	        wp_enqueue_script( 'st-yuma-companion-customizer-script', YUMA_COMPANION_URL_PATH . 'assets/js/customizer-script.js', array( 'jquery' ), '', true );
	        $yuma_companion_l10n = array(
				'link'         => 'https://yuma.sharkthemes.com',
				'notice'         => esc_html__( 'Upgrade To Pro', 'yuma-companion' ),
				'plugin_link'  => YUMA_COMPANION_URL_PATH,
			);
			wp_localize_script( 'st-yuma-companion-customizer-script', 'yuma_companion_l10n', $yuma_companion_l10n );
	    }
	        
	}

	public function demo_import()
	{
		if ( class_exists( 'Advanced_Import' ) ) {
			// add demo data
    		include YUMA_COMPANION_BASE_PATH . '/include/demo-import.php';
		}
	}

}

if ( is_admin() ) {
	new ST_Yuma_Companion();
}
