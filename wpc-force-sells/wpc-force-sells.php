<?php
/*
Plugin Name: WPC Force Sells for WooCommerce
Plugin URI: https://wpclever.net/
Description: Create a deal that combines various related products and put them for sale altogether.
Version: 6.3.0
Author: WPClever
Author URI: https://wpclever.net
Text Domain: wpc-force-sells
Domain Path: /languages/
Requires Plugins: woocommerce
Requires at least: 4.0
Tested up to: 6.7
WC requires at least: 3.0
WC tested up to: 9.6
*/

defined( 'ABSPATH' ) || exit;

! defined( 'WOOFS_VERSION' ) && define( 'WOOFS_VERSION', '6.3.0' );
! defined( 'WOOFS_LITE' ) && define( 'WOOFS_LITE', __FILE__ );
! defined( 'WOOFS_FILE' ) && define( 'WOOFS_FILE', __FILE__ );
! defined( 'WOOFS_URI' ) && define( 'WOOFS_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WOOFS_DIR' ) && define( 'WOOFS_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'WOOFS_SUPPORT' ) && define( 'WOOFS_SUPPORT', 'https://wpclever.net/support?utm_source=support&utm_medium=woofs&utm_campaign=wporg' );
! defined( 'WOOFS_REVIEWS' ) && define( 'WOOFS_REVIEWS', 'https://wordpress.org/support/plugin/wpc-force-sells/reviews/?filter=5' );
! defined( 'WOOFS_CHANGELOG' ) && define( 'WOOFS_CHANGELOG', 'https://wordpress.org/plugins/wpc-force-sells/#developers' );
! defined( 'WOOFS_DISCUSSION' ) && define( 'WOOFS_DISCUSSION', 'https://wordpress.org/support/plugin/wpc-force-sells' );
! defined( 'WPC_URI' ) && define( 'WPC_URI', WOOFS_URI );

include 'includes/dashboard/wpc-dashboard.php';
include 'includes/kit/wpc-kit.php';
include 'includes/hpos.php';

if ( ! function_exists( 'woofs_init' ) ) {
	add_action( 'plugins_loaded', 'woofs_init', 11 );

	function woofs_init() {
		if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0', '>=' ) ) {
			add_action( 'admin_notices', 'woofs_notice_wc' );

			return null;
		}

		include_once 'includes/class-helper.php';
		include_once 'includes/class-blocks.php';
		include_once 'includes/class-woofs.php';

		// start
		WPCleverWoofs();
	}
}

if ( ! function_exists( 'woofs_notice_wc' ) ) {
	function woofs_notice_wc() {
		?>
        <div class="error">
            <p><strong>WPC Force Sells</strong> requires WooCommerce version 3.0 or greater.</p>
        </div>
		<?php
	}
}
