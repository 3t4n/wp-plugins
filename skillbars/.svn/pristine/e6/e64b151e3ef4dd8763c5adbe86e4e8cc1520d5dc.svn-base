<?php
	/*
	 * Plugin Name: Skill Bars
	 * Plugin URI: https://themepoints.com/skillbar
	 * Description: Easily add animated skill bars to your WordPress site using shortcodes.
	 * Version: 1.4
	 * Author: ThemePoints
	 * Author URI: https://themepoints.com
	 * License: GPLv2 or later
	 * Text Domain: skillbar
	 * Domain Path: /languages
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}

	define('TP_SKILLBARSHORTCODES_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('tp_skillbarshortcodes_plugin_dir', plugin_dir_path( __FILE__ ) );
	add_filter('widget_text', 'do_shortcode');

	// Include necessary files
	require_once( plugin_dir_path( __FILE__ ) . 'inc/skillbar-postytpe.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'inc/skill-bar-shortcode.php' );

	/*==========================================================================
		Skill Bar Admin Scripts
	==========================================================================*/
	function tp_skillbar_shortcodes_script(){
		wp_enqueue_style( 'skillbar-css', plugins_url( 'assets/css/skillbar-css.css' , __FILE__ ) );
		wp_enqueue_script('jquery');
		wp_enqueue_script('skillbar-js', plugins_url( '/assets/js/shortcodes_skillbar.js', __FILE__ ), array('jquery'), '1.0', false);
	}
	add_action('wp_enqueue_scripts', 'tp_skillbar_shortcodes_script');

	# load plugin textdomain 
	function tp_skillbar_load_textdomain(){
		load_plugin_textdomain('skillbar', false, dirname(plugin_basename( __FILE__ )) . '/languages/');
	}
	add_action('plugins_loaded', 'tp_skillbar_load_textdomain');

	// Admin enqueue scripts
	function tp_skillbar_enqueue_scripts() {
		global $typenow;
		if ( ( $typenow == 'skillbar' ) ) {
			wp_enqueue_style( 'skillbar-admin-style', plugins_url( 'admin/css/admin-style.css' , __FILE__ ) );
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script( 'skillbar_color_picker', plugins_url('/assets/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
			wp_enqueue_script( 'skillbar-admin-scripts', plugins_url('admin/js/admin-scripts.js', __FILE__), array('jquery'), '1.0.0', true);
		}
	}
	add_action( 'admin_enqueue_scripts', 'tp_skillbar_enqueue_scripts' );

	function tp_skillbar_shortcode( $atts ) {
	    // Extract attributes with default values
	    $atts = shortcode_atts(
	        array(
	            'title'        => '',
	            'percentage'   => '80',
	            'color'        => '#333333',
	            'show_percent' => 'true',
	        ),
	        $atts,
	        'skillbar'
	    );

	    // Sanitize attributes
	    $title = sanitize_text_field( $atts['title'] );
	    $percentage = absint( $atts['percentage'] );
	    $color = sanitize_hex_color( $atts['color'] );
	    $show_percent = filter_var( $atts['show_percent'], FILTER_VALIDATE_BOOLEAN );

	    // Generate output
	    $output = '<div class="skillbar" data-percent="' . esc_attr( $percentage ) . '%">';
	    if ( ! empty( $title ) ) {
	        $output .= '<div class="skillbar-title" style="background: ' . esc_attr( $color ) . ';"><h6>' . esc_html( $title ) . '</h6></div>';
	    }
	    $output .= '<div class="skillbar-bar" style="background: ' . esc_attr( $color ) . ';"></div>';
	    if ( $show_percent ) {
	        $output .= '<div class="skillbar-percent">' . esc_html( $percentage ) . '%</div>';
	    }
	    $output .= '</div>';

	    return $output;
	}
	add_shortcode( 'skillbar', 'tp_skillbar_shortcode' );

?>