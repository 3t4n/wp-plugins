<?php
/*
 * Plugin Name: ChatMe sharing for Jetpack
 * Plugin URI: https://wordpress.org/plugins/chatme-sharing-jetpack/
 * Description: Add a chatme button to the Jetpack Sharing module
 * Author: camaran
 * Version: 1.0 RC 1
 * Author URI: http://chatme.im
 * License: GPL2+
 * Text Domain: chatme-sharing-jetpack
 * Domain Path: /languages
 */

class chatme_Button {

	function __construct() {
		// Check if Jetpack and the sharing module is active
		if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'sharedaddy' ) ) {
			add_filter( 'sharing_services', array( $this, 'inject_service' ) );
		} else {
			add_action( 'admin_notices',  array( $this, 'install_jetpack' ) );
		}
		add_action('plugins_loaded', 		array( $this, 'chatme_button') );
		add_action('wp_enqueue_scripts', 	array( $this, 'chatme_sharing_jetpack_head') );
	}

    function chatme_button() {
        $plugin_dir = basename(dirname(__FILE__));
        load_plugin_textdomain( 'chatme-sharing-jetpack', false, $plugin_dir . '/languages/' );
    }

	function chatme_sharing_jetpack_head() {

		wp_register_style( 'chatme-sharing-jetpack', plugins_url( '/css/chatme-sharing-jetpack.css', __FILE__ ), array(), '1.0' );
		wp_enqueue_style( 'chatme-sharing-jetpack' );
	}

	// Add the ChatMe Button to the list of services in Sharedaddy
	public function inject_service ( $services ) {
		include_once 'classes/class.chatme-sharing-jetpack.php';
		if ( class_exists( 'Share_ChatMe' ) ) {
			$services['chatme'] = 'Share_ChatMe';
		}
		return $services;
	}

	// Prompt to install Jetpack
	public function install_jetpack() {
		echo '<div class="error"><p>';
	    printf(__( 'To use the ChatMe Sharing plugin, you\'ll need to install and activate <a href="%1$s" target="_blank">Jetpack</a> first, and <a href="%2$s">activate the Sharing module</a>.','chatme-sharing-jetpack'),
			'https://wordpress.org/plugins/jetpack/',
			'admin.php?page=jetpack_modules'
		);
		echo '</p></div>';
	}

}

new chatme_Button;