<?php
/*
Plugin Name: WPC Shoppable Images for WooCommerce
Plugin URI: https://wpclever.net/
Description: WPC Shoppable Images is impressively a versatile, multipurpose, and powerful plugin, which helps you increase your sales by creating shoppable images.
Version: 2.1.4
Author: WPClever
Author URI: https://wpclever.net
Text Domain: wpc-shoppable-images
Domain Path: /languages/
Requires Plugins: woocommerce
Requires at least: 4.0
Tested up to: 6.7
WC requires at least: 3.0
WC tested up to: 9.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) || exit;

! defined( 'WPCSI_VERSION' ) && define( 'WPCSI_VERSION', '2.1.4' );
! defined( 'WPCSI_LITE' ) && define( 'WPCSI_LITE', __FILE__ );
! defined( 'WPCSI_FILE' ) && define( 'WPCSI_FILE', __FILE__ );
! defined( 'WPCSI_URI' ) && define( 'WPCSI_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WPCSI_DIR' ) && define( 'WPCSI_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'WPCSI_REVIEWS' ) && define( 'WPCSI_REVIEWS', 'https://wordpress.org/support/plugin/wpc-shoppable-images/reviews/?filter=5' );
! defined( 'WPCSI_CHANGELOG' ) && define( 'WPCSI_CHANGELOG', 'https://wordpress.org/plugins/wpc-shoppable-images/#developers' );
! defined( 'WPCSI_DISCUSSION' ) && define( 'WPCSI_DISCUSSION', 'https://wordpress.org/support/plugin/wpc-shoppable-images' );
! defined( 'WPC_URI' ) && define( 'WPC_URI', WPCSI_URI );

include 'includes/dashboard/wpc-dashboard.php';
include 'includes/kit/wpc-kit.php';
include 'includes/hpos.php';

if ( ! function_exists( 'wpcsi_init' ) ) {
	add_action( 'plugins_loaded', 'wpcsi_init', 11 );

	function wpcsi_init() {
		if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0', '>=' ) ) {
			add_action( 'admin_notices', 'wpcsi_notice_wc' );

			return null;
		}

		if ( ! class_exists( 'WPCleverWpcsi' ) && class_exists( 'WC_Product' ) ) {
			class WPCleverWpcsi {
				public function __construct() {
					require_once 'includes/class-backend.php';
					require_once 'includes/class-frontend.php';
				}
			}

			new WPCleverWpcsi();
		}
	}
}

if ( ! function_exists( 'wpcsi_notice_wc' ) ) {
	function wpcsi_notice_wc() {
		?>
        <div class="error">
            <p><strong>WPC Shoppable Images</strong> requires WooCommerce version 3.0 or greater.</p>
        </div>
		<?php
	}
}
