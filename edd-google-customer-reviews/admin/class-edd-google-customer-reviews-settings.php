<?php
/**
 * The admin-setting functionality of the plugin.
 *
 * @link       dcgws.com
 * @since      1.0.0
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/admin
 */

/**
 * The admin-setting functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/admin
 * @author     David Davis <david.davis@dcgws.com>
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class EDD_Google_Customer_Reviews_Settings {
	
	public static function add_update_settings($settings) {
		if ( !get_option($settings)) {
			$gcr_options = array();
			if(is_array($_POST)) {
				foreach ($_POST as $key => $value) {
					if(!isset($_POST[$key])){
						$_POST[$key] = '';
					}
					if(isset($_POST[$key])) {
						$gcr_options[$key] = sanitize_text_field($_POST[$key]);
					}
				}
			}
			add_option( $settings, serialize( $gcr_options ) );
		}
		else {
			$get_gcr_settings = unserialize(get_option($settings));
			if(is_array($get_gcr_settings)) {
				foreach ($get_gcr_settings as $key => $value) {
					if(!isset($_POST[$key])){
						$_POST[$key] = '';
					}
					if( $_POST[$key] != $value ) {
						$get_gcr_settings[$key] = sanitize_text_field($_POST[$key]);
					}

				}
			}
			if(is_array($_POST)) {
			foreach($_POST as $key=>$value){
				if(!array_key_exists($key,$get_gcr_settings)){
					$get_gcr_settings[$key] =  $value;
				}
			}
			}
			update_option($settings, serialize( $get_gcr_settings ));
		}
		self::admin_notice__success();
	}
	
	private static function admin_notice__success() {
		$class = 'notice notice-success';
		$message = __( 'Your settings have been saved.', 'edd-google-customer-reviews' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
		
	}
	
}

?>