<?php
/*
Plugin Name: Nothing Much
Plugin URI: https://wordpress.org/plugins/nothing-much/
Description: This plugin does nothing of value, and is used to test things in the plugin directory/repo.
Author: stephdau
Version: 1.5.1
Text Domain: nothing-much
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class NothingMuch {
	public function __construct() {
		add_action( 'admin_init', array( $this, 'load_textdomain' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_script' ) );
	}

	public function load_textdomain() {
		load_plugin_textdomain( 'nothing-much' );
	}

	public function admin_notices() {
		echo '<div class="notice">'
			. __( 'Yo, we told you this plugin didn&#8217;t do much. Test Trunk', 'nothing-much' )
			. '</div>';
	}

	public function enqueue_script() {
		wp_enqueue_script( 'nothing-much-script', plugins_url( '/js/nothing-much.js' , __FILE__ ), array( 'jquery', 'wp-i18n' ) );

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'nothing-much-script', 'nothing-much' );
		}
	}
}

new NothingMuch();
