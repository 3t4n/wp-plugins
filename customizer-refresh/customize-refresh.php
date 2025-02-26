<?php
/**
 * Plugin Name: Customizer Refresh
 * Description: Add a button that refreshes the live preview in the WordPress Customizer.
 * Version:     1.0
 * Plugin URI:  https://marketersdelight.net/
 * Author:      Alex Mangini
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

final class Customize_Refresh_Plugin {

	public function __construct() {
		add_action( 'customize_controls_print_scripts', array( $this, 'scripts' ) );
	}


	public function scripts() {
		wp_enqueue_style( 'customize-refresh-css', plugin_dir_url( __FILE__ ) . 'customize-refresh.css' );
		wp_enqueue_script( 'customize-refresh-js', plugin_dir_url( __FILE__ ) . 'customize-refresh.js', array( 'jquery' ), '', true );
	}

}

new Customize_Refresh_Plugin;