<?php

namespace AcademyLMS\Divi;

defined( 'ABSPATH' ) || exit;

class Dependency {

	public $is_missing_dependency = false;

	public function __construct() {
		add_action( 'admin_init', array( $this, 'dispatch_notice' ) );
	}

	public function is_plugin_installed( $basename ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			include_once ABSPATH . '/wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();
		return isset( $installed_plugins[ $basename ] );
	}

	
	public function dispatch_notice() {
		// Check if Academy installed and activated
		if ( ! class_exists( 'Academy' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_academy_plugin' ) );
			$this->is_missing_dependency = true;
		}
	}

	public function admin_notice_missing_academy_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		$academy = 'academy/academy.php';
		if ( $this->is_plugin_installed( $academy ) ) {
			$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $academy . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $academy );

			$message = sprintf( __( '%1$sAcademy Divi Modules%2$s requires %1$sAcademy LMS%2$s plugin to be active. Please activate Academy main plugin to continue.', 'academy-divi-modules' ), '<strong>', '</strong>' );

			$button_text = __( 'Activate Academy LMS', 'academy-divi-modules' );
		} else {
			$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=academy' ), 'install-plugin_academy' );

			$message = sprintf( __( '%1$sAcademy Divi Modules%2$s requires %1$sAcademy LMS%2$s plugin to be installed and activated. Please install Divi Theme or Divi Builder to continue.', 'academy-divi-modules' ), '<strong>', '</strong>' );
			$button_text = __( 'Install Academy LMS', 'academy-divi-modules' );
		}

		$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

		printf( '<div class="error"><p>%1$s</p>%2$s</div>', wp_kses_post( $message ), wp_kses_post( $button ) );
	}

}

new Dependency();
