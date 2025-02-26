<?php

/**
 * Enqueues class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Enqueues' ) ) {

	/**
	 * Enqueues
	 *
	 * Enqueueing of files
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Enqueues {

		/**
		 * Construct
		 *
		 * @since 1.0.0
		 */

		public function __construct() {

			add_action( 'admin_enqueue_scripts', array( $this, 'files' ) );

		}

		/**
		 * Enqueues files required for plugin to function
		 *
		 * @since 1.0.0
		 * @param string $hook Hook passed from admin_enqueue_scripts
		 */

		public function files( $hook ) {

			// Dash Icon

			wp_enqueue_style( 'ldash-icons', plugin_dir_url( __DIR__ ) . 'assets/css/icons.css' );

			// On page enqueues

			if( ldash_page() == true ) {

				// Thickbox

				wp_enqueue_style( 'thickbox' );
				wp_enqueue_script( 'thickbox' );

				// WordPress overrides

				wp_enqueue_style( 'ldash-wordpress', plugin_dir_url( __DIR__ ) . 'assets/css/wordpress.css' );

				// General

				wp_enqueue_style( 'ldash-general', plugin_dir_url( __DIR__ ) . 'assets/css/general.css' );

				// Consistent

				wp_enqueue_style( 'ldash-consistent', plugin_dir_url( __DIR__ ) . 'assets/css/consistent.css' );

				// Header

				wp_enqueue_style( 'ldash-header', plugin_dir_url( __DIR__ ) . 'assets/css/header.css' );

				// Notices

				wp_enqueue_style( 'ldash-notices', plugin_dir_url( __DIR__ ) . 'assets/css/notices.css' );
				wp_enqueue_script( 'ldash-notices', plugin_dir_url( __DIR__ ) . 'assets/js/notices.js' );

				// Options

				wp_enqueue_style( 'ldash-options', plugin_dir_url( __DIR__ ) . 'assets/css/options.css' );

				// Form

				wp_enqueue_style( 'ldash-form', plugin_dir_url( __DIR__ ) . 'assets/css/form.css' );

				// Custom

				if( get_option( 'ldash_general_appearance_custom_stylesheet' ) == 'on' ) {

					wp_enqueue_style( 'ldash-custom', trailingslashit( get_stylesheet_directory_uri() ) . 'lightning-dashboard/custom.css' );

				}

				// Add-Ons

				do_action( 'ldash_add_ons_enqueues' );

				// Non-settings pages

				if( ldash_current_tab() !== 'settings' ) {

					// Edit

					wp_enqueue_style( 'ldash-edit', plugin_dir_url( __DIR__ ) . 'assets/css/edit.css' );

					// DataTables

					wp_enqueue_style( 'ldash-datatables', plugin_dir_url( __DIR__ ) . 'includes/libraries/DataTables/datatables.min.css' );
					wp_enqueue_style( 'ldash-datatables-custom', plugin_dir_url( __DIR__ ) . 'assets/css/datatables.css' ); // after the default for higher priority
					wp_enqueue_script( 'ldash-datatables', plugin_dir_url( __DIR__ ) . 'includes/libraries/DataTables/datatables.min.js' );
					wp_enqueue_script( 'ldash-datatables-custom', plugin_dir_url( __DIR__ ) . 'assets/js/datatables.js' );

					// Add-Ons

					do_action( 'ldash_add_ons_enqueues_non_settings' );

				} else { // Settings page

					// Settings

					wp_enqueue_style( 'ldash-settings', plugin_dir_url( __DIR__ ) . 'assets/css/settings.css' );

					// Color picker

					wp_enqueue_style( 'wp-color-picker' );
					wp_enqueue_script( 'wp-color-picker' );
					wp_enqueue_script( 'ldash-color-picker', plugin_dir_url( __DIR__ ) . 'assets/js/color-picker.js' );

					// Media Upload

					wp_enqueue_media();

					// Add-Ons

					do_action( 'ldash_add_ons_enqueues_settings' );

				}

				if( ldash_current_tab() == 'orders' ) {

					// Date Picker

					wp_enqueue_script( 'jquery-ui-datepicker' );
					wp_enqueue_style( 'jquery-ui', plugin_dir_url( __DIR__ ) . 'includes/libraries/jquery-ui-themes-1.12.1/themes/smoothness/jquery-ui.min.css' );
					wp_enqueue_script( 'ldash-date-picker', plugin_dir_url( __DIR__ ) . 'assets/js/date-picker.js' );

				}

			}

		}

	}

	new LDASH_Enqueues();

}