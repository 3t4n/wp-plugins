<?php

defined( 'ABSPATH' ) or die( 'Na na na na na...' );

class SMCEnqueue {
	public static function register() {
		add_action( 'admin_enqueue_scripts', array( 'SMCEnqueue', 'ColorPickerScript' ) );
		add_action( 'admin_enqueue_scripts', array( 'SMCEnqueue', 'ColorPickerStyle' ) );
	}

	public static function ColorPickerStyle() {
		wp_enqueue_style( 'wp-color-picker' );
	}

	public static function ColorPickerScript() {
		wp_enqueue_script( 'my-script-handle', plugins_url( '/../js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	}

}
