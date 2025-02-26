<?php
/**
 * Plugin Name: Discontinued Product Stock Status for WooCommerce
 * Description: Discontinued Product Stock Status for WooCommerce allows you to list a product as ‘Discontinued’ in your WooCommerce catalog, optionally write a custom message to guide your buyers to newer or other products and thus helping you recover lost sales and SEO traffic in the process.
 * Author URI: https://www.saffiretech.com/
 * Author: SaffireTech
 * Text Domain: discontinued-products-stock-status
 * Domain Path: /languages
 * Stable Tag : 1.5.3
 * Requires at least: 5.0
 * Tested up to: 6.7.1
 * WC tested up to: 9.4.3
 * Requires PHP: 7.2
 * License:    GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Version: 1.5.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if accessed directly.
}

define( 'DPSSW_DISCOUNTINUED_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Check the installation of pro version.
 *
 * @return bool
 */
function dpssw_check_pro_version() {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'discontinued-product-stock-status-woocommerce-pro/discontinued-products-stock-status-pro.php' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Display notice if pro plugin found.
 */
function dpssw_free_plugin_install() {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	// if pro plugin found deactivate free plugin.
	if ( dpssw_check_pro_version() ) {
		deactivate_plugins( plugin_basename( __FILE__ ), true ); // deactivate free plugin if pro found.
		if ( defined( 'DPSSW_PRO_PLUGIN' ) ) {
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			add_action( 'admin_notices', 'dpssw_install_free_admin_notice' );
		}
	}
}

add_action( 'plugins_loaded', 'dpssw_free_plugin_install' );

/**
 * Add message if pro version is installed.
 */
function dpssw_install_free_admin_notice() { ?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'Free version deactivated Pro version Installed', 'discontinued-products-stock-status' ); ?></p>
	</div>
	<?php
}

add_action( 'init', 'discontinued_product_load_required_file' );

/**
 * Load plugin files.
 */
function discontinued_product_load_required_file() {
	require_once dirname( __FILE__ ) . '/includes/dpssw-product-data-tabs.php';
	require_once dirname( __FILE__ ) . '/includes/dpssw-functions.php';

	// schedule event for price drop email.
	require_once plugin_dir_path( __FILE__ ) . '/library/action-scheduler/action-scheduler.php';
}

/**
 * Checks if the woocommerce plugin is installed and activated
 */
function dpssw_wp_check_is_woocommerce_active() {
	// Require parent plugin.
	if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) && current_user_can( 'activate_plugins' ) && ! class_exists( 'Woocommerce' ) ) {
		// Stop activation redirect and show error.

		/* translators: %s: search term */
		wp_die( wp_kses_post( sprintf( __( 'Sorry, but this plugin requires the Woocommerce Plugin to be installed and active. <br><a href="%s">&laquo; Return to Plugins</a>', 'discontinued-products-stock-status' ), '' . admin_url( 'plugins.php' ) . '' ) ) );
	}
}

register_activation_hook( __FILE__, 'dpssw_wp_check_is_woocommerce_active' );

add_action( 'admin_enqueue_scripts', 'dpssw_discontinued_assets' );

/**
 * Include styling and js files.
 *
 * @param string $hook .
 */
function dpssw_discontinued_assets( $hook ) {
	wp_enqueue_style( 'discontinued_css', plugins_url( 'assets/css/discontinued_products.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'dpssw_sweet_alert_css', plugins_url( 'assets/css/sweetalert2.min.css', __FILE__ ), array(), '10.10.1' );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'discontinued_js', plugins_url( 'assets/js/discontinued.js', __FILE__ ), array( 'jquery', 'wp-i18n' ), '1.0', false );
	wp_enqueue_script( 'discontinued_js' );
	wp_enqueue_script( 'dpssw_sweet_alert_js', plugins_url( 'assets/js/sweetalert2.all.min.js', __FILE__ ), array(), '10.10.1', false );
	wp_enqueue_style( 'dpssw_banner_css', esc_url( 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' ), array(), '1.0.0' );
	wp_localize_script(
		'discontinued_js',
		'dpssw_custom_data',
		array(
			'nonce'               => wp_create_nonce( 'discontinued-products-stock-status' ),
			'url'                 => admin_url( 'admin-ajax.php' ),
			'wc_version'          => floatval( WC_VERSION ),
			'curr_page'           => ( is_admin() ) ? 1 : 0,

			'head_point_one'      => __( '<b>Supports  WooCommerce\'s  Default Product Types</b>', 'discontinued-products-stock-status' ),
			'sub_point_one'       => __( 'Simple, Variable, Grouped.', 'discontinued-products-stock-status' ),

			'head_point_two'      => __( 'Supports', 'discontinued-products-stock-status' ),
			'sub_point_two'       => __( '<b>Product Level Messages</b>.', 'discontinued-products-stock-status' ),

			'head_point_three'    => __( 'Supports', 'discontinued-products-stock-status' ),
			'sub_point_three'     => __( '<b>Global Level Messages</b>.', 'discontinued-products-stock-status' ),

			'head_point_four'     => __( 'Works on', 'discontinued-products-stock-status' ),
			'sub_point_four'      => __( '<b>Category, Archive & Shop Pages.</b>', 'discontinued-products-stock-status' ),

			'head_point_five'     => __( '<b>Product Alternatives</b>', 'discontinued-products-stock-status' ),
			'sub_point_five'      => __( 'Show up to 4 product alternatives for the Discontinued Product.', 'discontinued-products-stock-status' ),

			'head_point_six'      => __( '<b>Global Styling Options</b>', 'discontinued-products-stock-status' ),
			'sub_point_six'       => __( 'Options to style the Global Discontinued Product Message.', 'discontinued-products-stock-status' ),

			'head_point_seven'    => __( '<b>Compatible with WooCommerce Subscriptions</b>', 'discontinued-products-stock-status' ),
			'sub_point_seven'     => __( 'Works with Simple & Variable Subscription Product types.', 'discontinued-products-stock-status' ),

			'head_point_eight'    => __( '<b>Compatible with WooCommerce Product Bundles</b>', 'discontinued-products-stock-status' ),
			'sub_point_eight'     => __( 'Works with Product Bundle Product type.', 'discontinued-products-stock-status' ),

			'sub_point_nine_one'  => __( 'Effortlessly', 'discontinued-products-stock-status' ),
			'head_point_nine_one' => __( '<b>Migrate Discontinued Products Meta</b>', 'discontinued-products-stock-status' ),
			'sub_point_nine_two'  => __( 'from one site to another using', 'discontinued-products-stock-status' ),
			'head_point_nine_two' => __( '<b>Export-Import Feature</b>.', 'discontinued-products-stock-status' ),

			'upgrade_now'         => __( 'Upgrade Now!', 'discontinued-products-stock-status' ),
		)
	);

	if ( isset( $_GET['page'] ) && 'wc-settings' === $_GET['page'] && isset( $_GET['tab'] ) && 'discontinued_settings_tab' === $_GET['tab'] ) {
		?>
		<style>
			th.titledesc {
				width: 300px !important;
			}
		</style>
		<?php
	}
}

add_action( 'wp_enqueue_scripts', 'dpssw_discontinued_frontend_assets' );

/**
 * Load javascript for the Front-end.
 */
function dpssw_discontinued_frontend_assets( $hook ) {

	wp_enqueue_script( 'discontinued_front_js', plugins_url( 'assets/js/dpssw-function.js', __FILE__ ), array( 'jquery' ), '1.0', false );
}

add_action( 'init', 'dpssw_discontinued_load_textdomain_file' );

/**
 * Load Text Domain
 */
function dpssw_discontinued_load_textdomain_file() {
	load_plugin_textdomain( 'discontinued-products-stock-status', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

/**
 * 'Discontinued' stock status  to 'Out of Stock' stock status on deactivation of this plugin.
 */
register_deactivation_hook( __FILE__, 'dpssw_restore_to_outofstock_on_plugin_deactivate' );

// HPOS Compatibility.
add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
);

register_activation_hook( __FILE__, 'dpssw_save_default_setting_once' );

/**
 * Saves the default setting once when plugin gets activated on new site.
 *
 * @return void
 */
function dpssw_save_default_setting_once() {
	if ( ! get_option( 'discontinued_show_in_catalog' ) ) {
		update_option( 'discontinued_show_in_catalog', 'yes' );
	}
	if ( ! get_option( 'discontinued_greyscale_effect' ) ) {
		update_option( 'discontinued_greyscale_effect', 'no' );
	}
	if ( ! get_option( 'discontinued_enable_custom_message' ) ) {
		update_option( 'discontinued_enable_custom_message', 'yes' );
	}
	if ( ! get_option( 'discontinued_global_message' ) ) {
		update_option( 'discontinued_global_message', 'This product has been discontinued.' );
	}
	if ( get_option( 'discontinued_global_message_border_width' ) ) {
		delete_option( 'discontinued_global_message_border_width' );
	}
	if ( get_option( 'discontinued_global_message_border_style' ) ) {
		delete_option( 'discontinued_global_message_border_style' );
	}
	if ( get_option( 'discontinued_global_message_border_color' ) ) {
		delete_option( 'discontinued_global_message_border_color' );
	}
	if ( get_option( 'discontinued_global_message_border_radius' ) ) {
		delete_option( 'discontinued_global_message_border_radius' );
	}
	if ( ! get_option( 'discontinued_global_text_color' ) ) {
		update_option( 'discontinued_global_text_color', '#FF0000' );
	}
	if ( ! get_option( 'discontinued_global_background_color' ) ) {
		update_option( 'discontinued_global_background_color', '' );
	}
	if ( ! get_option( 'discontinued_restore_to_outofstock' ) ) {
		update_option( 'discontinued_restore_to_outofstock', 'no' );
	}

	$args = array(
		'limit'  => -1,
		'type'   => 'simple',
		'status' => 'publish',
	);

	$query    = new WC_Product_Query( $args );
	$products = $query->get_products();

	foreach ( $products as $product ) {
		$product_id = $product->get_id();
		if ( 'discontinued' === $product->get_stock_status() ) {
			$temp = get_post_meta( $product_id, 'show_specific_messsage', true );
			if ( $temp === '' || $temp === null ) {
				update_post_meta( $product_id, 'show_specific_messsage', sanitize_text_field( 'global_text_message' ) );
			}
		}
	}
}

add_action( 'upgrader_process_complete', 'dpssw_update_show_specific_message', 10, 2 );

/**
 * Updates the show_specific_message for simple product having stock status as discontinued.
 *
 * @param object $upgrader .
 * @param object $options .
 * @return void
 */
function dpssw_update_show_specific_message( $upgrader, $options ) {
	$our_plugin = plugin_basename( __FILE__ );

	if ( $options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
		foreach ( $options['plugins'] as $plugin ) {
			if ( $plugin == $our_plugin ) {
				$args     = array(
					'limit'  => -1,
					'type'   => 'simple',
					'status' => 'publish',
				);
				$query    = new WC_Product_Query( $args );
				$products = $query->get_products();
				foreach ( $products as $product ) {
					$product_id = $product->get_id();
					if ( 'discontinued' === $product->get_stock_status() ) {
						$temp = get_post_meta( $product_id, 'show_specific_messsage', true );
						if ( $temp === '' || $temp === null ) {
							update_post_meta( $product_id, 'show_specific_messsage', sanitize_text_field( 'global_text_message' ) );
						}
					}
				}
			}
		}
	}
}

/**
 * Function to update the stock status of a variation product when an order is placed.
 * If the stock quantity of a variation reaches zero, it triggers an update to mark it as discontinued.
 *
 * @param int $order_id The ID of the order that was just completed.
 */
function dpssw_update_variation_stock_status( $order_id ) {

	// Get the order object.
	$order = wc_get_order( $order_id );

	// Loop through all items in the order.
	foreach ( $order->get_items() as $item_id => $item ) {
		// Get the product variation ID from the item.
		$variation_id = $item->get_variation_id();

		// Check if the item is a variation product.
		if ( $variation_id ) {
			// Get the product variation object.
			$variation = wc_get_product( $variation_id );

			// Ensure the product is a valid variation.
			if ( $variation && $variation->is_type( 'variation' ) ) {
				// Get the stock quantity of the variation.
				$stock_quantity = $variation->get_stock_quantity();

				// If the stock quantity is zero, update the stock status to 'discontinued'.
				if ( $stock_quantity == 0 ) {
					get_stock_discontinued_status( $variation_id );
				}
			}
		}
	}
}

// Hook the variation stock status update function to the 'woocommerce_thankyou' action
// This triggers the function after an order is completed.
add_action( 'woocommerce_thankyou', 'dpssw_update_variation_stock_status', 10, 1 );
