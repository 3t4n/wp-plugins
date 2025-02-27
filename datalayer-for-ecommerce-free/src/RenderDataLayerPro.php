<?php
/**
 * RenderDataLayerPro Init
 *
 * @version 1.0.2
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;

use DatalayerForWoocommerceFree\Blocks\FunctionsWoocommerceBlocks;
use DatalayerForWoocommerceFree\JsScriptManager\JsScriptInjector;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RenderDataLayerPro' ) ) :
	/**
	 * Class RenderDataLayerPro
	 */
	class RenderDataLayerPro {

		/**
		 * Instance
		 *
		 * @var null $instance Instance.
		 */
		protected static $instance = null;

		/**
		 * Holds the values to be used in the fields callbacks
		 *
		 * @var $options Options Page.
		 */
		private $options;

		/**
		 * Stores the products
		 *
		 * @var array $stored_products Store Products
		 */
		private $stored_products = array();

		/**
		 * Adds products to the storage
		 *
		 * @param object $product Product.
		 */
		public function add_product_to_storage( $product ) {
			$this->stored_products[] = $product;
		}

		/**
		 * Gets the stored products
		 *
		 * @return array
		 */
		public function get_stored_products() {
			return $this->stored_products;
		}

		/**
		 * Start up
		 */
		private function __construct() {
			$this->options = get_option( 'options_tracking_option_free' );
			$checked_ua    = 0;
			if ( isset( $this->options['data_layer_google_tag_manager_enhanced_ecommerce'] ) ) {
				if ( $this->options['data_layer_google_tag_manager_enhanced_ecommerce'] ) {
					$checked_ua = 1;
				}
			}
			$checked_ga4 = 0;
			if ( isset( $this->options['data_layer_google_tag_manager_ecommerce_ga4'] ) ) {
				if ( $this->options['data_layer_google_tag_manager_ecommerce_ga4'] ) {
					$checked_ga4 = 1;
				}
			}
			if ( $checked_ua || $checked_ga4 ) :
				if ( ! $this->has_valid_requirements() ) {
					add_action( 'admin_notices', array( Notices::class, 'add_notice_requires_woocommerce_activated' ) );
					return;
				}

				if ( $checked_ua ) :
					add_action('admin_init', array( Notices::class, 'add_notice_datalayer_ua_deprecated' ) );
				endif;

				add_action( 'wp_head', array( $this, 'search_page_trigger' ), 30 );
				add_action('woocommerce_before_shop_loop_item', array( $this, 'get_ids_shop_loop_item_frontpage' ) );
				add_action('wp_footer', array( $this, 'render_stored_products' ));
				add_action( 'woocommerce_thankyou', array( $this, 'purchase_trigger' ), 40 );
			endif;
		}

		/**
		 * Remove to Cart Ajax Trigger
		 *
		 * @name 'has_valid_requirements'
		 * @return bool
		 */
		private function has_valid_requirements() {

			$plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';
			if ( in_array( $plugin_path, wp_get_active_and_valid_plugins(), true ) ) {
				return true;
			}

			$network_active_plugins = get_site_option('active_sitewide_plugins');
			if ( ( ! empty($network_active_plugins) && array_key_exists('woocommerce/woocommerce.php', $network_active_plugins) ) ) {
				return true;
			}

			return false;
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Search Page Trigger
		 *
		 * @name 'search_page_trigger'
		 */
		public function search_page_trigger() {
			/** VIEW PRODUCT DETAILS */
			if ( is_product() ) {
				$product = wc_get_product( get_the_ID() );
				RenderProduct::mount_measuring_views_of_product_details_data_layer( $product );
			}
		}

		/**
		 * Purchase_trigger
		 *
		 * @param int $order_id       Order ID.
		 */
		public function purchase_trigger( $order_id ) {
			/** PURCHASE */
			RenderCheckout::measuring_checkout_purchase_data_layer( $order_id );
		}

		/**
		 * Get ids shop loop item frontpage IMPRESSIONS FRONTPAGE
		 *
		 * @name 'get_ids_shop_loop_item_frontpage'
		 */
		public function get_ids_shop_loop_item_frontpage() {
			if ( is_product() ) {
				global $product;
				if ($product) {
					$this->add_product_to_storage( $product );
				}
			}
		}

		/**
		 * Renders the stored products
		 */
		public function render_stored_products() {
			if ( is_product() && !FunctionsWoocommerceBlocks::has_block_product_category() && DataLayer::get_related_product_show()) {
				$stored_products = $this->get_stored_products();
				if ( ! empty( $stored_products ) ) {
					RenderProduct::mount_measuring_product_impressions_data_layer( $stored_products );
				}
			}
		}

	}

endif;
