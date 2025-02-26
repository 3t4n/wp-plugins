<?php

/**
 * Settings class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Settings' ) ) {

	/**
	 * Settings
	 *
	 * Configuration and management of settings
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Settings {

		/**
		 * Construct
		 *
		 * @since 1.0.0
		 */

		public function __construct() {

			add_action( 'current_screen', array( $this, 'save' ) ); // After current screen available but before headers sent

		}

		/**
		 * Saves edits to settings
		 *
		 * @since 1.0.0
		 */

		public function save() {

			global $wpdb;
			$tab = ldash_current_tab();

			if( ldash_page() == true && $tab == 'settings' ) {

				if( isset( $_POST['ldash_save_settings'] ) && $_POST['ldash_save_settings'] == 1 ) {

					// In order of field display on settings page

					// General > Menu > Name

					if( isset( $_POST['ldash_form_element_general_menu_name'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_menu_name'] );

						if( get_option( 'ldash_general_menu_name' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_menu_name', $input );

							}

						}

					}

					// General > Menu > Icon

					if( isset( $_POST['ldash_form_element_general_menu_icon'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_menu_icon'] );

						if( get_option( 'ldash_general_menu_icon' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_menu_icon', $input );

							} else {

								update_option( 'ldash_general_menu_icon', '' );

							}

						}

					}

					// General > Menu > Position

					if( isset( $_POST['ldash_form_element_general_menu_position'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_menu_position'] );

						if( get_option( 'ldash_general_menu_position' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_menu_position', $input );

							}

						}

					}

					// General > Date & Time > Date Format

					if( isset( $_POST['ldash_form_element_general_date_time_date_format'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_date_time_date_format'] );

						if( get_option( 'ldash_general_date_time_date_format' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_date_time_date_format', $input );

							} else {

								update_option( 'ldash_general_date_time_date_format', '' );

							}

						}

					}

					// General > Date & Time > Time Format

					if( isset( $_POST['ldash_form_element_general_date_time_time_format'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_date_time_time_format'] );

						if( get_option( 'ldash_general_date_time_time_format' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_date_time_time_format', $input );

							} else {

								update_option( 'ldash_general_date_time_time_format', '' );

							}

						}

					}

					// General > Appearance > Rows Per Page

					if( isset( $_POST['ldash_form_element_general_appearance_rows_per_page'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_appearance_rows_per_page'] );

						if( get_option( 'ldash_general_appearance_rows_per_page' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_appearance_rows_per_page', $input );

							}

						}

					}

					// General > Appearance > Lightbox Height

					if( isset( $_POST['ldash_form_element_general_appearance_lightbox_height'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_appearance_lightbox_height'] );

						if( get_option( 'ldash_general_appearance_lightbox_height' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_appearance_lightbox_height', $input );

							}

						}

					}

					// General > Appearance > Custom Logo

					if( isset( $_POST['ldash_form_element_general_appearance_custom_logo'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_appearance_custom_logo'] );

						if( get_option( 'ldash_general_appearance_custom_logo' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_appearance_custom_logo', $input );

							} else {

								update_option( 'ldash_general_appearance_custom_logo', '' );

							}

						}

					}

					// General > Appearance > Display Logo

					if( isset( $_POST['ldash_form_element_general_appearance_display_logo'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_appearance_display_logo'] );

						if( get_option( 'ldash_general_appearance_display_logo' ) !== $input ) {

							if( $input == 'on' ) {

								update_option( 'ldash_general_appearance_display_logo', $input );

							} else {

								update_option( 'ldash_general_appearance_display_logo', 'off' );

							}

						}

					}

					// General > Appearance > Custom Stylesheet

					if( isset( $_POST['ldash_form_element_general_appearance_custom_stylesheet'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_appearance_custom_stylesheet'] );

						if( get_option( 'ldash_general_appearance_custom_stylesheet' ) !== $input ) {

							if( $input == 'on' ) {

								update_option( 'ldash_general_appearance_custom_stylesheet', $input );

							} else {

								update_option( 'ldash_general_appearance_custom_stylesheet', 'off' );

							}

						}

					}

					// General > Notices > Global Notice

					if( isset( $_POST['ldash_form_element_general_notices_global_notice'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_notices_global_notice'] );

						if( get_option( 'ldash_general_notices_global_notice' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_general_notices_global_notice', $input );

							} else {

								update_option( 'ldash_general_notices_global_notice', '' );

							}

						}

					}

					// General > Misc > External Tabs

					if( isset( $_POST['ldash_form_element_general_misc_external_tabs'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_misc_external_tabs'] );

						if( get_option( 'ldash_general_misc_external_tabs' ) !== $input ) {

							if( $input == 'on' ) {

								update_option( 'ldash_general_misc_external_tabs', $input );

							} else {

								update_option( 'ldash_general_misc_external_tabs', 'off' );

							}

						}

					}

					// General > Misc > WooCommerce Tab

					if( isset( $_POST['ldash_form_element_general_misc_woocommerce_tab'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_misc_woocommerce_tab'] );

						if( get_option( 'ldash_general_misc_woocommerce_tab' ) !== $input ) {

							if( $input == 'on' ) {

								update_option( 'ldash_general_misc_woocommerce_tab', $input );

							} else {

								update_option( 'ldash_general_misc_woocommerce_tab', 'off' );

							}

						}

					}

					// General > Misc > Login Redirect

					if( isset( $_POST['ldash_form_element_general_misc_login_redirect'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_misc_login_redirect'] );

						if( get_option( 'ldash_general_misc_login_redirect' ) !== $input ) {

							if( $input == 'on' ) {

								update_option( 'ldash_general_misc_login_redirect', $input );

							} else {

								update_option( 'ldash_general_misc_login_redirect', 'off' );

							}

						}

					}

					// General > Misc > Save State

					if( isset( $_POST['ldash_form_element_general_misc_save_state'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_general_misc_save_state'] );

						if( get_option( 'ldash_general_misc_save_state' ) !== $input ) {

							if( $input == 'on' ) {

								update_option( 'ldash_general_misc_save_state', $input );

							} else {

								update_option( 'ldash_general_misc_save_state', 'off' );

							}

						}

					}

					// Orders > Notices > Notice

					if( isset( $_POST['ldash_form_element_orders_notices_notice'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_orders_notices_notice'] );

						if( get_option( 'ldash_orders_notices_notice' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_orders_notices_notice', $input );

							} else {

								update_option( 'ldash_orders_notices_notice', '' );

							}

						}

					}

					// Orders > Options > Default Option

					if( isset( $_POST['ldash_form_element_orders_options_default_option'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_orders_options_default_option'] );

						if( get_option( 'ldash_orders_options_default_option' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_orders_options_default_option', $input );

							} else {

								update_option( 'ldash_orders_options_default_option', '' );

							}

						}

					}

					// Orders > Rows > Row Highlight Colors

					if( isset( $_POST['ldash_form_element_orders_rows_row_highlight_color'] ) ) {

						$input = array_map( 'strip_tags', $_POST['ldash_form_element_orders_rows_row_highlight_color'] );

						if( !empty( $input ) ) {

							foreach( $input as $order_status_color_id => $order_status_color_value ) {

								if( get_option( 'ldash_orders_rows_row_highlight_color_' . $order_status_color_id ) !== $order_status_color_value ) {

									update_option( 'ldash_orders_rows_row_highlight_color_' . $order_status_color_id, $order_status_color_value );

								}

							}

						}

					}

					// Orders > Rows > Reset Row Highlight Colors

					if( isset( $_POST['ldash_form_element_orders_rows_reset_row_highlight_colors'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_orders_rows_reset_row_highlight_colors'] );

						if( $input == 'on' ) {

							// Delete all existing row colors

							$current_row_highlight_colors = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}options` WHERE `option_name` LIKE 'ldash_orders_rows_row_highlight_color_%'" );

							if( !empty( $current_row_highlight_colors ) ) {

								foreach( $current_row_highlight_colors as $current_row_highlight_color ) {

									delete_option( $current_row_highlight_color->option_name );

								}

							}

							// Add default row highlight colours

							$default_row_highlight_colors = LDASH_Settings::default_row_highlight_colors();

							if( !empty( $default_row_highlight_colors ) ) {

								foreach( $default_row_highlight_colors as $default_color_status => $default_color ) {

									update_option( 'ldash_orders_rows_row_highlight_color_' . $default_color_status, $default_color );

								}

							}

						}

					}


					// Products > Notices > Notice

					if( isset( $_POST['ldash_form_element_products_notices_notice'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_products_notices_notice'] );

						if( get_option( 'ldash_products_notices_notice' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_products_notices_notice', $input );

							} else {

								update_option( 'ldash_products_notices_notice', '' );

							}

						}

					}

					// Products > Options > Default Option

					if( isset( $_POST['ldash_form_element_products_options_default_option'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_products_options_default_option'] );

						if( get_option( 'ldash_products_options_default_option' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_products_options_default_option', $input );

							} else {

								update_option( 'ldash_products_options_default_option', '' );

							}

						}

					}


					// Customers > Notices > Notice

					if( isset( $_POST['ldash_form_element_customers_notices_notice'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_customers_notices_notice'] );

						if( get_option( 'ldash_customers_notices_notice' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_customers_notices_notice', $input );

							} else {

								update_option( 'ldash_customers_notices_notice', '' );

							}

						}

					}

					// Customers > Options > Default Option

					if( isset( $_POST['ldash_form_element_customers_options_default_option'] ) ) {

						$input = sanitize_text_field( $_POST['ldash_form_element_customers_options_default_option'] );

						if( get_option( 'ldash_customers_options_default_option' ) !== $input ) {

							if( !empty( $input ) ) {

								update_option( 'ldash_customers_options_default_option', $input );

							} else {

								update_option( 'ldash_customers_options_default_option', '' );

							}

						}

					}

					// Add-On Settings

					if( !empty( ldash_add_ons() ) ) {

						foreach( ldash_add_ons() as $add_on_id => $add_on_name ) {

							do_action( 'ldash_add_on_settings_save_' . str_replace( '-', '_', $add_on_id ), $add_on_settings );

						}

					}

					// Changing location ensure changes such as the menu icon are visible without a refresh by user and adds query var to display saved message, saved=1 gets removed by WP once the page loads but is usable and we use it for showing the settings saved notice

					header( "Location: admin.php?page=lightning-dashboard&tab=settings&saved=1" );

					// Exit
					
					exit;

				}

			}

		}

		/**
		 * Returns the default row highlight colors
		 *
		 * @since 1.0.0
		 * @return array Row highlight colors
		 */

		public static function default_row_highlight_colors() {

			// Statuses should be entered with underscores not hyphens (e.g. on-hold becomes on_hold) - this is done to ensure WP option names saved in correct/consistent format

			return array(
				'pending'		=> '',
				'processing'	=> '#c6e1c6',
				'on_hold'		=> '#f8dda7',
				'completed'		=> '#c8d7e1',
				'cancelled'		=> '',
				'refunded'		=> '',
				'failed'		=> '#eba3a3',
				'trash'			=> '#eba3a3',
			);

		}

	}

	new LDASH_Settings();

}