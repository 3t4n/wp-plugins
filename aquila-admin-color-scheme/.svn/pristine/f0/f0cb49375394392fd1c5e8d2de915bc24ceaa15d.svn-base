<?php
/**
 * Plugin Name: Aquila Admin Color Scheme
 * Plugin URI: http://www.guyprimavera.com/
 * Description: The Aquila Color Scheme for WordPress Admin area.
 * Author: Guy Primavera
 * Author URI: http://www.guyprimavera.com/
 * Version: 1.25
 * Text Domain: aquila-admin-color-scheme
 * License: GPL2
 *
 * Copyright 2015 Guy Primavera
 */

include ('dashboard.php');
include ('admin-bar.php');

class Aquila_Admin_Color_Scheme {

	function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_default_css') );
		add_action( 'admin_init', array( $this, 'add_color_scheme') );
	}

	/**
	 * Register the custom admin color scheme
	 */
	function add_color_scheme() {
		wp_admin_css_color(
			'aquila',
			__( 'Aquila', 'aquila-color-scheme' ),
			plugins_url( 'aquila.css', __FILE__ ),
			array( '#222222', '#b41f24', '#b41f24', '#b41f24' )
			//array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
		);
	}

	function load_default_css() {

		global $wp_styles;

		$color_scheme = get_user_option( 'admin_color' );

		if ( 'aquila' === $color_scheme || in_array( get_current_screen()->base, array( 'profile', 'profile-network' ) ) ) {
			$wp_styles->registered[ 'colors' ]->deps[] = 'colors-fresh';
		}

	}
}

new Aquila_Admin_Color_Scheme();

add_filter('get_user_option_admin_color', 'change_admin_color');
	function change_admin_color($result) {
		return 'aquila';
	}
	
?>