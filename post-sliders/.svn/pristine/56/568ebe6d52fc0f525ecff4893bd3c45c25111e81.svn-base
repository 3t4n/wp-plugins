<?php
	/*
	Plugin Name: Post Sliders
	Plugin URI: https://themepoints.com/product/post-slider-pro
	Description: Post Slider Plugin is a handy and effective solution for anyone seeking a responsive post slider. It offers a variety of slider templates to set up your post slider on any WordPress website.
	Version: 1.9
	Author: Themepoints
	Author URI: https://themepoints.com
	TextDomain: post-sliders
	License: GPLv2
	*/

	// Exit if accessed directly
	if (!defined('ABSPATH')) {
	    exit;
	}

	// Define plugin paths
	define('TPPOSTSLIDER_PLUGIN_PATH', plugin_dir_url(__FILE__));
	define('tppostslider_plugin_dir', plugin_dir_path(__FILE__));

	// Enable shortcodes in widget text
	add_filter('widget_text', 'do_shortcode');

	// Function to initialize the plugin
	function tppostslider_pro_init() {
	    // Enqueue required stylesheets
	    wp_enqueue_style('tppostpro-fontawesome-css', plugins_url('assets/css/font-awesome.min.css', __FILE__));
	    wp_enqueue_style('tppostpro-owl-min-css', plugins_url('assets/css/owl.carousel.min.css', __FILE__));
	    wp_enqueue_style('tppostpro-style-css', plugins_url('assets/css/style.css', __FILE__));

	    // Enqueue jQuery
	    wp_enqueue_script('jquery');

	    // Enqueue plugin JavaScript
	    wp_enqueue_script('tppostpro-owl-js', plugins_url('/assets/js/owl.carousel.js', __FILE__), array('jquery'));
	}
	// Hook into WordPress initialization to initialize the plugin
	add_action('init', 'tppostslider_pro_init');
	
	# Load plugin admin style & scripts
	function tppostslider_pro_loaded_admin_scripts(){
	    global $typenow;
	    // Check if the current post type is 'tppostpro'
	    if( $typenow == 'tppostpro' ){
	        // Enqueue admin stylesheet
	        wp_enqueue_style( 'tppostpro-loaded_admin-style', plugins_url( 'admin/css/tppost-slider-load-admin.css' , __FILE__ ) );
	        // Enqueue Font Awesome stylesheet
	        wp_enqueue_style( 'tppostpro-loaded-admin-font-awesome', plugins_url( 'assets/css/font-awesome.min.css' , __FILE__ ) );
	        // Enqueue admin JavaScript with dependencies on jQuery
	        wp_enqueue_script('tppostpro-loaded-admin-scripts', plugins_url( 'admin/js/tppost-slider-load-admin.js', __FILE__ ), array('jquery'), '1.3.3', false);
	        // Enqueue WordPress color picker stylesheet
	        wp_enqueue_style('wp-color-picker');
	        // Enqueue color picker JavaScript with dependency on WordPress color picker
	        wp_enqueue_script( 'tppostpro-color-picker', plugins_url('admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	    }
	}
	// Hook into admin_enqueue_scripts action to load admin scripts and styles
	add_action('admin_enqueue_scripts', 'tppostslider_pro_loaded_admin_scripts');

	# Load plugin Translations
	function tppostslider_pro_load_textdomain(){
	    // Load translations for the 'post-sliders' text domain from the 'languages' directory
	    load_plugin_textdomain('post-sliders', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	// Hook into plugins_loaded action to load plugin translations
	add_action('plugins_loaded', 'tppostslider_pro_load_textdomain');

	// Include the file for custom post type registration
	require_once( 'lib/post-type/tppostpro-post-type.php' );

	// Include the file for metabox registration
	require_once( 'lib/metaboxes/tppostpro-metaboxes.php' );

	// Include the file for shortcode registration
	require_once( 'lib/shortcodes/tppostpro-post-shortcode.php' );

	// Include the file for shortcode registration
	require_once( 'lib/shortcodes/tppostpro-post-old-shortcode.php' );


	// Add Plugin Submenu Page
	function tppost_slider_admin_submenu_pages() {
		add_submenu_page( 'edit.php?post_type=tppostpro', __( 'Support & Doc', 'post-sliders' ), __( 'Support & Doc', 'post-sliders' ), 'manage_options', 'support', 'themepoints_logo_showcase_support_callback' );
	}

	// Require Plugin Callback File
	function themepoints_logo_showcase_support_callback() {
		require_once( plugin_dir_path( __FILE__ ) . '/admin/post-slider-admin-info.php' );
	}
	add_action( 'admin_menu', 'tppost_slider_admin_submenu_pages' );

	// Activation hook actions for the frontend
	function tppost_slider_activation_for_backend(){
	    $installed = get_option( 'tppost_slider_activation_time' );
	    // Check if this is the first activation
	    if (! $installed ) {
	        // If so, set the installation time
	        update_option('tppost_slider_activation_time', time() );
	    }
	}
	register_activation_hook( __FILE__, 'tppost_slider_activation_for_backend' );