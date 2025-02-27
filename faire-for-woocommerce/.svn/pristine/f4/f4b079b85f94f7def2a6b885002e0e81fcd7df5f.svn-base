<?php
/**
 * Admin assets management.
 *
 * @package  Faire/Admin
 */

namespace Faire\Wc\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Admin assets management.
 */
class Assets {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_assets' ) );
	}

	/**
	 * Enqueues plugin admin JS scripts and styles.
	 */
	public function admin_enqueue_assets() {
		global $pagenow, $typenow;

		$assets_url  = self::get_assets_dir();
		$styles_url  = plugins_url( '', FAIRE_WC_PLUGIN_FILE ) . '/dist/styles';
		$scripts_url = $assets_url . '/scripts';
		$git_version = self::get_git_version();

		// Load assets for plugin settings page.
		if (
			// phpcs:disable WordPress.Security.NonceVerification.Recommended
			'admin.php' === $pagenow &&
			isset( $_GET['page'] ) &&
			'wc-settings' === $_GET['page'] &&
			isset( $_GET['section'] ) &&
			'faire_wc_integration' === $_GET['section']
			// phpcs:disable WordPress.Security.NonceVerification.Recommended
		) {
			wp_enqueue_script(
				'faire_admin_settings',
				$scripts_url . '/admin_settings.js',
				array( 'jquery' ),
				$git_version,
				true
			);
			wp_localize_script(
				'faire_admin_settings',
				'faireAdminSettings',
				array(
					'ajaxUrl'                             => admin_url( 'admin-ajax.php' ),
					// Test API connection.
					'nonceApiTestConnection'              => wp_create_nonce( 'faire_test_api_connection' ),
					'testingApiConnectionMsg'             => __( 'Testing the API connection...', 'faire-for-woocommerce' ),
					'apiKeyEmptyError'                    => __( 'Error: API Key is empty.', 'faire-for-woocommerce' ),
					// Orders manual sync.
					'nonceManualSyncOrders'               => wp_create_nonce( 'faire_orders_manual_sync' ),
					'ordersManualSyncMsg'                 => __( 'Syncing orders...', 'faire-for-woocommerce' ),
					'ordersManualSyncFailed'              => __( 'Orders syncing failed.', 'faire-for-woocommerce' ),
					// Products manual sync.
					'nonceManualSyncProducts'             => wp_create_nonce( 'faire_products_manual_sync' ),
					'productsManualSyncLinkExistingMsg'   => __( 'Existing products were found at Faire. Please run product linking before product sync to link existing products.'."\n\n".'Click "Cancel" to cancel product sync. '."\n\n".'Click "OK" to continue sync anyway.', 'faire-for-woocommerce' ),
					'productsManualSyncMsg'               => __( 'Syncing products...', 'faire-for-woocommerce' ),
					// Product taxonomy manual sync.
					'nonceManualSyncProductTaxonomy'      => wp_create_nonce( 'faire_product_taxonomy_manual_sync' ),
					'productTaxonomyManualSyncMsg'        => __( 'Syncing product taxonomy...', 'faire-for-woocommerce' ),
					'productTaxonomyManualSyncSuccessMsg' => __( 'Product taxonomy successfully synced.', 'faire-for-woocommerce' ),
					'productTaxonomyManualSyncFailMsg'    => __( 'Product taxonomy syncing failed.', 'faire-for-woocommerce' ),
					// Product linking manual sync.
					'nonceManualSyncProductLinking'       => wp_create_nonce( 'faire_product_linking_manual_sync' ),
					'productLinkingManualSyncMsg'         => __( 'Linking products...', 'faire-for-woocommerce' ),
					'productLinkingManualSyncFailed'      => __( 'Linking products failed.', 'faire-for-woocommerce' ),
					// Brand manual sync
					'nonceManualSyncBrand'      => wp_create_nonce( 'faire_brand_manual_sync' ),
					'brandManualSyncMsg'        => __( 'Syncing brand profile...', 'faire-for-woocommerce' ),
					'brandManualSyncSuccessMsg' => __( 'Brand profile successfully synced.', 'faire-for-woocommerce' ),
					'brandManualSyncFailMsg'    => __( 'Brand profile syncing failed.', 'faire-for-woocommerce' ),
				)
			);

			wp_enqueue_style(
				'faire_admin_settings',
				$styles_url . '/admin_settings.css',
				array(),
				$git_version
			);
		}

		// Load assets for products listing page.
		if ( 'edit.php' === $pagenow && 'product' === $typenow ) {
			wp_enqueue_style(
				'faire_admin_products_list',
				$styles_url . '/admin_products.css',
				array(),
				$git_version
			);

			wp_enqueue_script(
				'faire_admin_products_list',
				$scripts_url . '/admin_products_list.js',
				array( 'jquery' ),
				$git_version,
				true
			);
			wp_localize_script(
				'faire_admin_products_list',
				'faireAdminProductsList',
				array(
					'ajaxUrl'                 => admin_url( 'admin-ajax.php' ),
					'nonceProductManualSync'  => wp_create_nonce( 'faire_single_product_manual_sync' ),
					'productManualSyncFailed' => __( 'Manual sync request failed', 'faire-for-woocommerce' ),
				)
			);
		}

		// Load assets for single product page.
		if ( 'post.php' === $pagenow && 'product' === $typenow ) {
			wp_enqueue_script(
				'faire_admin_product_single',
				$scripts_url . '/admin_product_single.js',
				array( 'jquery' ),
				$git_version,
				true
			);
		}

		// Load assets for single order page.
		if ( 'post.php' === $pagenow && 'shop_order' === $typenow ) {
			wp_enqueue_style(
				'faire_admin_order',
				$styles_url . '/admin_order.css',
				array(),
				$git_version
			);

			wp_enqueue_script(
				'faire_admin_order',
				$scripts_url . '/admin_order.js',
				array( 'jquery' ),
				$git_version,
				true
			);
			wp_localize_script(
				'faire_admin_order',
				'faireAdminOrder',
				array(
					'ajaxUrl'                         => admin_url( 'admin-ajax.php' ),
					'nonce'                           => wp_create_nonce( 'faire_admin_order' ),
					'acceptingOrder'                  => __( 'Accepting the order...', 'faire-for-woocommerce' ),
					'acceptingOrderFailed'            => __( 'Error: could not accept the order.', 'faire-for-woocommerce' ),
					'updatingOrderStatus'             => __( 'Updating order status...', 'faire-for-woocommerce' ),
					'updatingOrderStatusFailed'       => __( 'Error: could not update the order status.', 'faire-for-woocommerce' ),
					'settingOrderShipment'            => __( 'Setting the order shipping carrier...', 'faire-for-woocommerce' ),
					'setOrderShipmentFailed'          => __( 'Error: could not set the shipment carrier for the order.', 'faire-for-woocommerce' ),
					'shipmentTrackingCodeRequired'    => __( 'Tracking code is required', 'faire-for-woocommerce' ),
					'shippingCostRequired'            => __( 'A valid shipping cost is required', 'faire-for-woocommerce' ),
					'orderProductsBackordering'       => __( 'Backordering products...', 'faire-for-woocommerce' ),
					'orderProductsBackorderSuccess'   => __( 'Products were successfully backordered. Reloading order...', 'faire-for-woocommerce' ),
					'orderProductsBackorderFailed'    => __( 'Error: could not backorder the products.', 'faire-for-woocommerce' ),
					'orderProductsBackorderQtyUnset'  => __( 'Error: missing product backorder quantities.', 'faire-for-woocommerce' ),
					'orderProductsBackorderDateUnset' => __( 'Error: missing product backorder dates.', 'faire-for-woocommerce' ),
					'orderProductsBackorderDateMin'   => __( 'Error: product backorder dates can\'t be set back in time.', 'faire-for-woocommerce' ),
				)
			);
		}
	}

	/**
	 * Returns the base directory for assets.
	 */
	private static function get_assets_dir() {
		$base_path = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ?
			'/assets' :
			'/dist';

		return plugins_url( '', FAIRE_WC_PLUGIN_FILE ) . $base_path;
	}

	/**
	 * Generates a version out of the current commit hash.
	 *
	 * @return string
	 *   Current commit hash.
	 */
	private static function get_git_version() {
		$git_version = null;
		$plugin_dir  = plugin_dir_path( FAIRE_WC_PLUGIN_FILE ) . '/';

		// phpcs:disable WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( is_dir( $plugin_dir . '.git' ) ) {
			$ref = trim( file_get_contents( $plugin_dir . '.git/HEAD' ) );
			if ( strpos( $ref, 'ref:' ) === 0 ) {
				$ref = substr( $ref, 5 );
				if ( file_exists( $plugin_dir . '.git/' . $ref ) ) {
					$ref = trim( file_get_contents( $plugin_dir . '.git/' . $ref ) );
				} else {
					$ref = substr( $ref, 11 );
				}
			}
			// phpcs:enable WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

			$git_version = substr( $ref, 0, 8 );
		}
		return $git_version;
	}

}
