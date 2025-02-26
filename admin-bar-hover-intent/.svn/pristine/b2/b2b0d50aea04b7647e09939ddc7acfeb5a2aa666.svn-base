<?php
/*
Plugin Name: Admin Bar Hover Intent
Description: If you use the WordPress Admin Bar you might have noticed the dropdowns are a bit quick on the draw. This plugin enables the jQuery hoverIntent plugin on the menu for logged in users.
Version: 0.2.2
License: GPL
Author: Ryan Imel
Author URI: http://ryanimel.com
*/

add_action( 'plugins_loaded', 'admin_bar_hover_activate' );

function admin_bar_hover_activate() {
	$hover = new Admin_Bar_Hover_Intent();
}

if ( !class_exists( 'Admin_Bar_Hover_Intent' ) ) {
    class Admin_Bar_Hover_Intent {

		const version	= '0.1';

		function Admin_Bar_Hover_Intent() {
			$this->__construct();
		}

		function __construct() {
			add_action( 'wp_print_scripts', array( __CLASS__ , 'enqueue_scripts' ) );
			add_action( 'init', array( __CLASS__ , 'enqueue_style' ) );
		}

		function enqueue_scripts() {
			if ( is_admin_bar_showing() ) {
				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'hoverintent', esc_url( plugins_url( 'hoverintent.min.js', __FILE__ ) ), array( 'jquery' ), '1.0', true );
				wp_enqueue_script( 'rwi-admin-bar-hover-intent-scripts', esc_url( plugins_url( 'rwi-admin-bar-hover-intent-scripts.js', __FILE__ ) ), array( 'jquery' ), Admin_Bar_Hover_Intent::version, true );
			}
		}

		function enqueue_style() {
			if ( is_admin_bar_showing() )
				wp_enqueue_style( 'rwi-admin-bar-hover-intent-style', esc_url( plugins_url( 'rwi-admin-bar-hover-intent.css', __FILE__ ) ), null, Admin_Bar_Hover_Intent::version, 'screen' );
		}
	}
};

?>