<?php
/**
 * Plugin Name: Display Order Details for WooCommerce
 * Description: This plugin displays the list of items in an order in the WooCommerce->Orders page
 * Version: 1.1
 * Author: TechnoVama
 * Requires Plugins: woocommerce
 * Requires at least: 4.5
 * WC requires at least: 3.0
 * WC tested up to: 9.5.1
 * Text Domain: display-order-details
 * Domain Path: /languages/
 * Author URI: https://woocommerce.com/vendor/technovama/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Display Order Details
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (
	! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins', array() ) ), true ) &&
	! ( is_multisite() && array_key_exists( 'woocommerce/woocommerce.php', get_site_option( 'active_sitewide_plugins', array() ) ) )
) {
	if ( ! function_exists( 'deactivate_plugins' ) ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	add_action(
		'admin_notices',
		function () {
			// translators: plugin name with link.
			$msg = sprintf( __( 'Please install and activate %s before activating Display Order Details for WooCommerce.', 'display-order-details' ), '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a>' );
			?>
			<div class="notice notice-error">
				<p><?php echo wp_kses_post( $msg ); ?></p>
			</div>
			<?php
		}
	);
	deactivate_plugins( 'display-order-details/display-order-details.php' );
	return;
}

add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'orders_cache', __FILE__, true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
		}
	},
	999
);

if ( ! class_exists( 'display_order_details' ) ) {

	/**
	 * Display order details.
	 */
	class Display_Order_Details {

		/**
		 * Construct.
		 */
		public function __construct() {

			add_action( 'init', array( &$this, 'od_load_text_domain' ) );

			add_filter( 'manage_edit-shop_order_columns', array( &$this, 'od_column_header' ), 10, 1 );
			add_action( 'manage_shop_order_posts_custom_column', array( &$this, 'od_column_value' ), 10, 1 );
			// HPOS WC Orders page.
			add_action( 'manage_woocommerce_page_wc-orders_columns', array( &$this, 'od_column_header_hpos' ), 10, 1 );
			add_action( 'manage_woocommerce_page_wc-orders_custom_column', array( &$this, 'od_column_value_hpos' ), 10, 2 );
		}

		/**
		 * Load Plugin Text Domain.
		 *
		 * @since 1.1
		 */
		public function od_load_text_domain() {
			// Load plugin text domain.
			load_plugin_textdomain( 'display-order-details', false, basename( __DIR__ ) . '/languages' );
		}

		/**
		 * Add new column in CPT (Legacy) Orders Listng page.
		 *
		 * @param array $columns - Column List.
		 * @since 1.0
		 */
		public function od_column_header( $columns ) {

			// Get all columns up to Order.
			$new_columns = array();
			foreach ( $columns as $name => $value ) {
				if ( 'order_total' === $name ) {
					prev( $columns );
					break;
				}
				$new_columns[ $name ] = $value;
			}
			// Inject our columns.
			$new_columns['dot_items'] = __( 'Items', 'display-order-details' );
			// Add the remaining columns.
			foreach ( $columns as $name => $value ) {
				$new_columns[ $name ] = $value;
			}
			return $new_columns;
		}

		/**
		 * Display values in Items column for CPT (Legacy) Orders Listng page.
		 *
		 * @param string $column - Column ID.
		 * @since 1.0
		 */
		public function od_column_value( $column ) {

			if ( 'dot_items' === $column ) {
				global $post;

				$item_link = '';
				$order_id  = $post->ID;
				$order     = wc_get_order( $order_id );

				if ( $order ) {
					$items = $order->get_items();

					foreach ( $items as $item_value ) {

						$order_data = $item_value->get_data();

						$product_id   = $order_data['product_id'];
						$product_name = $order_data['name'];
						$quantity     = $order_data['quantity'];

						$args['post']   = $product_id;
						$args['action'] = 'edit';

						$item_link .= "<a href='" . esc_url_raw( add_query_arg( $args, get_admin_url( null, 'post.php' ) ) ) . "' target='_blanks' >$product_name</a> x $quantity<br>";
					}
				}
				echo wp_kses_post( $item_link );
			}
		}

		/**
		 * Add new column in HPOS Orders Listing Page.
		 *
		 * @param array $columns - Column List.
		 * @since 1.1
		 */
		public function od_column_header_hpos( $columns ) {

			// Get all columns up to order date.
			$new_columns = array();
			foreach ( $columns as $name => $value ) {
				if ( 'order_total' === $name ) {
					prev( $columns );
					break;
				}
				$new_columns[ $name ] = $value;
			}
			// Inject our columns.
			$new_columns['dot_items'] = __( 'Items', 'display-order-details' );

			// Add the remaining columns.
			foreach ( $columns as $name => $value ) {
				$new_columns[ $name ] = $value;
			}
			return $new_columns;
		}

		/**
		 * Display values in Items column for HPOS Orders Listng page.
		 *
		 * @param string $column - Column ID.
		 * @param obj    $order - WC Order object.
		 * @since 1.1
		 */
		public function od_column_value_hpos( $column, $order ) {
			if ( 'dot_items' === $column ) {

				$item_link = '';
				if ( $order ) {
					$items = $order->get_items();

					foreach ( $items as $item_value ) {

						$order_data = $item_value->get_data();

						$product_id   = $order_data['product_id'];
						$product_name = $order_data['name'];
						$quantity     = $order_data['quantity'];

						$args['post']   = $product_id;
						$args['action'] = 'edit';

						$item_link .= "<a href='" . esc_url_raw( add_query_arg( $args, get_admin_url( null, 'post.php' ) ) ) . "' target='_blanks' >$product_name</a> x $quantity<br>";
					}

					echo wp_kses_post( $item_link );
				}
			}
		}
	} // end of class.
}
$display_order_details = new Display_Order_Details();
