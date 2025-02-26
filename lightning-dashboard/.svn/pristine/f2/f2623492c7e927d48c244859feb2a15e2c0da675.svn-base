<?php

/**
 * Plugin Name: Lightning Dashboard
 * Description: The Ultimate Dashboard for WooCommerce.
 * Version: 1.0.0
 * Author: Lightning Dashboard
 * Author URI: https://lightningdashboard.com/
 * Text Domain: lightning-dashboard
 * Domain Path: /languages/
 *
 * @package LightningDashboard
 * @version 1.0.0
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

// Constants

define( 'LDASH_NAME', __( 'Lightning Dashboard', 'lightning-dashboard' ) );
define( 'LDASH_URL', 'https://lightningdashboard.com/' );
define( 'LDASH_VERSION', '1.0.0' );

// Active Plugins

$active_plugins = get_option( 'active_plugins' );

// WooCommerce Check

if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', $active_plugins ) ) ) {

	// Instantiate

	if( !class_exists( 'LDASH' ) )  {

		/**
		 * Main class
		 *
		 * @version 1.0.0
		 * @since 1.0.0
		 */

		class LDASH {

			/**
			 * Construct
			 *
			 * @since 1.0.0
			 */

			public function __construct() {

				// Functions

				require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';

				// Classes

				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-activation.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-enqueues.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-pages.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-orders.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-products.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-customers.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-datatable.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-markup.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-notices.php';
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-ldash-settings.php';

			}

		}

		new LDASH();

	}

} else {

	$notice = sprintf( __( '%s requires WooCommerce to be installed and activated.', 'lightning-dashboard' ), LDASH_NAME );

	if( !in_array( 'lightning-dashboard/lightning-dashboard.php', apply_filters( 'active_plugins', $active_plugins ) ) ) {

		die( $notice );

	} else {

		add_action( 'admin_notices', function() use ( $notice ) { ?>

			<div class="notice notice-error">
				<p><?php echo $notice; ?></p>
			</div>

		<?php });

	}

}