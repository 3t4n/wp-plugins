<?php

/**
 * Creates a shortcode which can be displayed on any page to show users available downloads.
 *
 * @link                    pramadillo.com
 * @wordpress-plugin
 * Plugin Name:             My Downloads Shortcode for WooCommerce
 * Plugin URI:              http://wordpress.emoxie.com/woocommerce-my-downloads/
 * Description:             Creates a shortcode which can be displayed on any page to show users available downloads.
 * Version:                 1.8.0
 * WC requires at least:    2.6
 * WC tested up to:         5.5
 * Author:                  Pramadillo
 * Author URI:              pramadillo.com
 * License:                 GPL-2.0+
 * License URI:             http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:             wc_my_downloads
 * Domain Path:             /languages
 */

if ( ! class_exists( 'Woocommerce_My_Downloads' ) ) :

	class Woocommerce_My_Downloads {

		protected static $prefix = 'wcmd';

		public static function init() {
			add_shortcode( 'woocommerce-my-downloads', __CLASS__ . '::my_downloads_shortcode' );
			add_shortcode( 'woocommerce-my-downloads-button', __CLASS__ . '::my_downloads_button_shortcode' );
			add_action( 'admin_init', __CLASS__ . '::register' );
			add_action( 'admin_menu', __CLASS__ . '::menu' );
		}


		public static function register() {
			register_setting( self::$prefix . '_options', self::$prefix . '_no_downloads' );
			register_setting( self::$prefix . '_options', self::$prefix . '_downloads_heading' );
			register_setting( self::$prefix . '_options', self::$prefix . '_show_downloads_remaining' );
			register_setting( self::$prefix . '_options', self::$prefix . '_show_download_count' );
			register_setting( self::$prefix . '_options', self::$prefix . '_show_date' );
			register_setting( self::$prefix . '_options', self::$prefix . '_download_button_class' );
			register_setting( self::$prefix . '_options', self::$prefix . '_download_button_label' );
		}

		public static function menu() {
			add_options_page( 'My Downloads for WooCommerce Options', 'My Downloads for WooCommerce', 'manage_options', self::$prefix . '_options', __CLASS__ . '::options_page' );
		}

		public static function options_page() {
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			require_once dirname( __FILE__ ) . '/tpl/options.php';
		}


		/**
		 * Shortcode to display my downloads
		 * [woocommerce-my-downloads]
		 */
		public static function my_downloads_shortcode() {
			if ( is_user_logged_in() ) {

				$woocommerce = WC();

				if ( ! is_null( $woocommerce ) ) {
					$downloads = $woocommerce->customer->get_downloadable_products();
				} else {
					$downloads = array();
				}

				$no_downloads      = get_option( self::$prefix . '_no_downloads', 'No Downloads Available' );
				$heading           = get_option( self::$prefix . '_downloads_heading', 'Available Downloads' );
				$showDownloads     = (bool) get_option( self::$prefix . '_show_downloads_remaining', true );
				$showDownloadCount = (bool) get_option( self::$prefix . '_show_download_count', true );
				$showDate          = (bool) get_option( self::$prefix . '_show_date', true );

				ob_start();
				require dirname( __FILE__ ) . '/tpl/my-downloads.php';

				return ob_get_clean();
			}
		}

		/**
		 * Shortcode to display my downloads button
		 * [woocommerce-my-downloads-button id=1]
		 */
		public static function my_downloads_button_shortcode( $atts ) {

			if ( is_user_logged_in() ) {
				$woocommerce = WC();

				if ( ! is_null( $woocommerce ) ) {
					$downloads = $woocommerce->customer->get_downloadable_products();
				} else {
					$downloads = array();
				}

				$id = (int) $atts['id'];
				$no_downloads        = get_option( self::$prefix . '_no_downloads', 'No Downloads Available' );
				$downloadButtonClass = get_option( self::$prefix . '_download_button_class' );
				$downloadButtonLabel = get_option( self::$prefix . '_download_button_label', 'Download Now' );

				ob_start();
				require dirname( __FILE__ ) . '/tpl/button.php';

				return ob_get_clean();
			}
		}


	}

	Woocommerce_My_Downloads::init();

endif;

/**
 * Add the settings link to the plugin screen
 */
$plugin_file = 'woocommerce-my-downloads-shortcode/woocommerce-my-downloads.php';
add_filter( "plugin_action_links_{$plugin_file}", 'woocommerce_my_downloads_plugin_action_links', 10, 2 );

function woocommerce_my_downloads_plugin_action_links( $links, $file ) {
	$settings_link = '<a href="' . admin_url( 'options-general.php?page=wcmd_options' ) . '">Settings</a>';
	array_unshift( $links, $settings_link );

	return $links;
}