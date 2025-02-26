<?php

/**
 * Activation class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Activation' ) ) {

	/**
	 * Activation
	 *
	 * Actions performed on plugin activation
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Activation {

		/**
		 * Construct
		 *
		 * @since 1.0.0
		 */

		public function __construct() {

			register_activation_hook( plugin_dir_path( __DIR__ ) . 'lightning-dashboard.php', array( $this, 'set_default_settings' ) );

		}

		/**
		 * Sets the default settings upon plugin activation
		 *
		 * @since 1.0.0
		 */

		public function set_default_settings() {

			// In order of field display on settings page

			// General > Menu > Name

			if( empty( get_option( 'ldash_general_menu_name' ) ) ) {

				add_option( 'ldash_general_menu_name', __( 'Lightning Dash', 'lightning-dashboard' ) );

			}

			// General > Menu > Icon

			if( empty( get_option( 'ldash_general_menu_icon' ) ) ) {

				add_option( 'ldash_general_menu_icon', '' );

			}

			// General > Menu > Position

			if( empty( get_option( 'ldash_general_menu_position' ) ) ) {

				add_option( 'ldash_general_menu_position', 2 );

			}

			// General > Appearance > Rows Per Page

			if( empty( get_option( 'ldash_general_appearance_rows_per_page' ) ) ) {

				add_option( 'ldash_general_appearance_rows_per_page', 50 );

			}

			// General > Appearance > Lightbox Height

			if( empty( get_option( 'ldash_general_appearance_lightbox_height' ) ) ) {

				add_option( 'ldash_general_appearance_lightbox_height', 500 );

			}

			// General > Appearance > Date Format

			if( empty( get_option( 'ldash_general_date_time_date_format' ) ) ) {

				add_option( 'ldash_general_date_time_date_format', 'Y-m-d' );

			}

			// General > Appearance > Time Format

			if( empty( get_option( 'ldash_general_date_time_time_format' ) ) ) {

				add_option( 'ldash_general_date_time_time_format', 'H:i:s' );

			}

			// General > Appearance > External Tabs

			if( empty( get_option( 'ldash_general_misc_external_tabs' ) ) ) {

				add_option( 'ldash_general_misc_external_tabs', 'on' );

			}

			// General > Appearance > WooCommerce Tab

			if( empty( get_option( 'ldash_general_misc_woocommerce_tab' ) ) ) {

				add_option( 'ldash_general_misc_woocommerce_tab', 'on' );

			}

			// General > Appearance > Custom Logo

			if( empty( get_option( 'ldash_general_appearance_custom_logo' ) ) ) {

				add_option( 'ldash_general_appearance_custom_logo', '' );

			}

			// General > Appearance > Display Logo

			if( empty( get_option( 'ldash_general_appearance_display_logo' ) ) ) {

				add_option( 'ldash_general_appearance_display_logo', 'on' );

			}

			// General > Appearance > Custom Stylesheet

			if( empty( get_option( 'ldash_general_appearance_custom_stylesheet' ) ) ) {

				add_option( 'ldash_general_appearance_custom_stylesheet', 'off' );

			}

			// General > Notices > Global Notice

			if( empty( get_option( 'ldash_general_notices_global_notice' ) ) ) {

				add_option( 'ldash_general_notices_global_notice', '' );

			}

			// General > Misc > Login Redirect

			if( empty( get_option( 'ldash_general_misc_login_redirect' ) ) ) {

				add_option( 'ldash_general_misc_login_redirect', 'off' );

			}

			// General > Misc > Save State

			if( empty( get_option( 'ldash_general_misc_save_state' ) ) ) {

				add_option( 'ldash_general_misc_save_state', 'on' );

			}

			// Orders > Notices > Notice

			if( empty( get_option( 'ldash_orders_notices_notice' ) ) ) {

				add_option( 'ldash_orders_notices_notice', '' );

			}

			// Orders > Options > Default Option

			if( empty( get_option( 'ldash_orders_options_default_option' ) ) ) {

				add_option( 'ldash_orders_options_default_option', 'last-7-days' );

			}

			// Orders > Rows > Row Highlight Colors

			$default_row_highlight_colors = LDASH_Settings::default_row_highlight_colors();

			if( !empty( $default_row_highlight_colors ) ) {

				foreach( $default_row_highlight_colors as $default_color_status => $default_color ) {

					update_option( 'ldash_orders_rows_row_highlight_color_' . $default_color_status, $default_color );

				}
			}

			// Products > Notices > Notice

			if( empty( get_option( 'ldash_products_notices_notice' ) ) ) {

				add_option( 'ldash_products_notices_notice', '' );

			}

			// Products > Options > Default Option

			if( empty( get_option( 'ldash_products_options_default_option' ) ) ) {

				add_option( 'ldash_products_options_default_option', 'all-products' );

			}

			// Customers > Notices > Notice

			if( empty( get_option( 'ldash_customers_notices_notice' ) ) ) {

				add_option( 'ldash_customers_notices_notice', '' );

			}

			// Customers > Options > Default Option

			if( empty( get_option( 'ldash_customers_options_default_option' ) ) ) {

				add_option( 'ldash_customers_options_default_option', 'all-customers' );

			}

		}

	}

	new LDASH_Activation();

}
