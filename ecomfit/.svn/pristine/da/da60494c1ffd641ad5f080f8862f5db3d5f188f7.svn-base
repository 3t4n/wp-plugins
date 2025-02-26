<?php
/**
 * Plugin Name: Ecomfit
 * Plugin URI: https://ecomfit.com/
 * Description: Free Analytics & Insights tool for E-commerce
 * Version: 2.3
 * Author: ecomfit
 * Author URI: https://ecomfit.com/contact
 * License: GPLv2 or later
 */

// Define plugin constants
define( 'ECOMFIT_WOOCOMMERCE_VERSION', '2.3' );
define( 'ECOMFIT_WOOCOMMERCE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ECOMFIT_WOOCOMMERCE_PLUGIN_DIRNAME', __FILE__ );

require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'ecomfit-config.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'lib/ECOMFIT_StyleAndScript.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'lib/ECOMFIT_ApiCommon.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'controller/ECOMFIT_AdminPage.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Install.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Product.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Order.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_Cart.php' );
require_once( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'model/ECOMFIT_WorkService.php' );

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ECOMFIT_Woocommerce' ) ) {

	class ECOMFIT_Woocommerce {
		function __construct() {
			$this->ecomfit_hooks();
		}

		protected function ecomfit_hooks() {
			// Initialize plugin parts
			add_action( 'plugins_loaded', array( $this, 'ecomfit_init' ) );

			// Plugin updates
			add_action( 'admin_init', array( $this, 'ecomfit_check_version' ) );

			// Plugin activation
			register_activation_hook( __FILE__, array( $this, 'ecomfit_plugin_activation' ) );

			// Register plugin deactivation hook
			register_deactivation_hook( __FILE__, array( $this, 'ecomfit_plugin_deactivation' ) );

			// Uninstall
			register_uninstall_hook( __FILE__, array( $this, 'ecomfit_plugin_uninstall' ) );

			// add to cart
			add_action( 'woocommerce_add_to_cart', array( $this, 'ecomfit_add_to_cart' ) );
			// removed item cart
			add_action( 'woocommerce_cart_item_removed', array( $this, 'ecomfit_cart_item_removed' ) );
			// create order
			add_action( 'woocommerce_checkout_update_order_meta', array(
				$this,
				'ecomfit_order_update_cart_token'
			), 10, 2 );

			add_action( 'wp_loaded', array( $this, 'ecomfit_check_prerequisites' ), 5 );
			// Api init
			add_action( 'rest_api_init', array( $this, 'ecomfit_register_routes' ) );

			add_action( 'init', array( $this, 'ecomfit_sw_rewrites' ) );
			add_filter( 'query_vars', array( $this, 'ecomfit_sw_query_filter' ) );
			add_action( 'template_redirect', array( $this, 'ecomfit_sw_output' ) );

			if ( ECOMFIT_LOGIN_SUCCESS == get_option( ECOMFIT_LOGIN_CURRENT_STATUS )
			     && ECOMFIT_ApiCommon::isWooCommerceActive() ) {
				add_action( 'wp_footer', array( $this, 'ecomfit_sdk_wp_footer' ), 20 );
			} else {
				remove_action( 'wp_footer', array( $this, 'ecomfit_sdk_wp_footer' ) );
			}

			if ( function_exists( 'register_uninstall_hook' ) ) {
				register_uninstall_hook( __FILE__, 'ecomfit_uninstall' );
			}

		}

		function ecomfit_sw_rewrites() {
			global $wp_rewrite;
			$ecomfit_url_prefix = '';
			add_rewrite_rule( '^' . $ecomfit_url_prefix . '/?$', 'index.php?ecomfit=/', 'top' );
			add_rewrite_rule( '^' . $ecomfit_url_prefix . '/(.*)?', 'index.php?ecomfit=/$matches[1]', 'top' );
			add_rewrite_rule( '^' . $wp_rewrite->index . '/' . $ecomfit_url_prefix . '/?$', 'index.php?ecomfit=/', 'top' );
			add_rewrite_rule( '^' . $wp_rewrite->index . '/' . $ecomfit_url_prefix . '/(.*)?', 'index.php?ecomfit=/$matches[1]', 'top' );
		}

		public function ecomfit_sw_query_filter( $query_vars ) {
			$query_vars[] = 'ecomfit';
			$query_vars[] = 'webId';
			$query_vars[] = 'clientId';

			return $query_vars;
		}

		public function ecomfit_sw_output() {
			if ( get_query_var( 'ecomfit' ) == 'workservice/get' ) {
				$content = @ECOMFIT_WorkService::getService( get_query_var( 'clientId' ) );
				@header( 'Content-Type: application/javascript; charset=UTF-8' );
				echo $content;
				exit();
			}
		}

		public function ecomfit_init() {
			$style_and_script = new ECOMFIT_StyleAndScript();
			$admin_page       = new ECOMFIT_AdminPage();
			// If woocommerce is not active
			if ( ! ECOMFIT_ApiCommon::isWooCommerceActive() ) {
				// Show require woocommerce
				update_option( ECOMFIT_STATUS_WOOCOMMERCE, ECOMFIT_DEACTIVE_WOOCOMMERCE, true );
				add_action( 'admin_notices', function () {
					$wooCommercePluginUrl = ECOMFIT_ApiCommon::getWooCommercePluginUrl();
					include( ECOMFIT_WOOCOMMERCE_PLUGIN_DIR . 'view/templates/ecomfit-require-woocommerce.php' );
				} );
			} else {
				update_option( ECOMFIT_STATUS_WOOCOMMERCE, ECOMFIT_ACTIVE_WOOCOMMERCE, true );
			}
			$admin_page->ecomfit_redirect_to_login_page();
		}

		public function ecomfit_check_version() {
			$ecomfit_old_ver = get_option( ECOMFIT_VERSION );
			$ecomfit_new_ver = ECOMFIT_WOOCOMMERCE_VERSION;

			if ( $ecomfit_old_ver == $ecomfit_new_ver ) {
				return;
			}

			do_action( 'ecomfit_check_version', $ecomfit_new_ver, $ecomfit_old_ver );

			update_option( ECOMFIT_VERSION, $ecomfit_new_ver );
		}

		public function ecomfit_plugin_activation() {
			ECOMFIT_Install::ecomfit_init_install();
		}

		public function ecomfit_plugin_deactivation() {
			ECOMFIT_Install::ecomfit_deactive();
		}

		public function ecomfit_plugin_uninstall() {
			ECOMFIT_Install::ecomfit_uninstall();
		}

		public function ecomfit_uninstall() {
			$url   = '/wordpress/uninstall';
			$webId = get_option( ECOMFIT_WEB_ID );
			if ( $webId && get_option( ECOMFIT_TOKEN ) ) {
				$body   = array(
					'webId'   => $webId,
					'version' => get_option( ECOMFIT_VERSION ),
					'msg'     => 'uninstall'
				);
				$result = ECOMFIT_ApiCommon::post( $url, $body );
				if ( $result && $result->status ) {
					delete_option( ECOMFIT_WEB_ID );
					delete_option( ECOMFIT_TOKEN );
				}
			} else {
				$body = array(
					'msg' => 'website was NOT installed!'
				);
				ECOMFIT_ApiCommon::post( $url, $body );
			}
		}

		public function ecomfit_sdk_wp_footer() {
			$url_tracking = ECOMFIT_URL_FILE_TRACKING . '?v=' . ECOMFIT_TRACKING_VERSION . '&webId=' . get_option( ECOMFIT_WEB_ID );
			echo '<script type="text/javascript">
				(function (w, d, s, id, src) {
					if (d.getElementById(id)) return;
					var js, fjs = d.getElementsByTagName(s)[0];
					js = d.createElement(s);
					js.id = id;
					js.src = src;
					fjs.parentNode.insertBefore(js, fjs);
				})(window, document, "script", "ecomfit-sdk", "' . $url_tracking . '");
			</script>';
		}

		public function ecomfit_register_routes() {
			// get detail product
			register_rest_route( 'ecomfit', '/product/(?P<id>[\d]+)', array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'ecomfit_get_endpoint_product' ),
			) );

			// get list product
			register_rest_route( 'ecomfit', '/products/(?P<limit>[\d]+)/(?P<offset>[\d]+)', array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'ecomfit_get_endpoint_products' ),
			) );

			// get detail order
			register_rest_route( 'ecomfit', '/order/(?P<id>[\d]+)', array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'ecomfit_get_endpoint_order' ),
			) );

			// get list order
			register_rest_route( 'ecomfit', '/orders/(?P<limit>\d+)/(?P<offset>\d+)/(?P<from>.+)/(?P<to>.+)', array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'ecomfit_get_endpoint_orders' ),
			) );

			// get current cart
			register_rest_route( 'ecomfit', '/cart', array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'ecomfit_get_endpoint_cart' ),
			) );
		}

		public function ecomfit_get_endpoint_product( $request ) {
			if ( isset( $request['id'] ) && $request['id'] ) {
				return ECOMFIT_Product::ecomfit_get_product( $request['id'] );
			}

			return rest_ensure_response( array() );
		}

		public function ecomfit_get_endpoint_products( $request ) {
			if ( isset( $request['limit'] ) && isset( $request['offset'] ) ) {
				return ECOMFIT_Product::ecomfit_get_products( $request['limit'], $request['offset'] );
			}

			return rest_ensure_response( array() );
		}

		public function ecomfit_get_endpoint_order( $request ) {
			if ( isset( $request['id'] ) && $request['id'] ) {
				return ECOMFIT_Order::ecomfit_get_order( $request['id'] );
			}

			return rest_ensure_response( array() );
		}

		public function ecomfit_get_endpoint_orders( $request ) {
			if ( isset( $request['limit'] ) && isset( $request['offset'] ) && isset( $request['from'] ) && isset( $request['to'] ) ) {
				$orders = ECOMFIT_Order::ecomfit_get_orders( $request['limit'], $request['offset'], $request['from'], $request['to'] );

				return rest_ensure_response( $orders );
			}

			return array();
		}

		public function ecomfit_get_endpoint_cart() {
			return rest_ensure_response( ECOMFIT_Cart::ecomfit_get_cart() );
		}


		public function ecomfit_add_to_cart() {
			ECOMFIT_Cart::init_cart_token();
		}

		public function ecomfit_cart_item_removed() {
			global $woocommerce;
			if ( $woocommerce->cart->is_empty() ) {
				ECOMFIT_Cart::destroy_cart_token();
			}
		}

		public function ecomfit_order_update_cart_token( $order_id, $posted ) {
			session_start();
			$order = wc_get_order( $order_id );
			$order->update_meta_data( '_cart_token', ECOMFIT_Cart::cart_token() );
			$order->save();
			ECOMFIT_Cart::destroy_cart_token();
		}

		public function ecomfit_check_prerequisites() {
			if ( version_compare( WC_VERSION, '3.6.0', '>=' ) ) {
				if ( defined( 'WC_ABSPATH' ) ) {
					// WC 3.6+ - Cart and notice functions are not included during a REST request.
					include_once WC_ABSPATH . 'includes/wc-cart-functions.php';
					include_once WC_ABSPATH . 'includes/wc-notice-functions.php';
				}

				if ( null === WC()->session ) {
					$session_class = apply_filters( 'woocommerce_session_handler', 'WC_Session_Handler' );

					// Prefix session class with global namespace if not already namespaced
					if ( false === strpos( $session_class, '\\' ) ) {
						$session_class = '\\' . $session_class;
					}

					WC()->session = new $session_class();
					WC()->session->init();
				}

				/**
				 * For logged in customers, pull data from their account rather than the
				 * session which may contain incomplete data.
				 */
				if ( is_null( WC()->customer ) ) {
					if ( is_user_logged_in() ) {
						WC()->customer = new WC_Customer( get_current_user_id() );
					} else {
						WC()->customer = new WC_Customer( get_current_user_id(), true );
					}

					// Customer should be saved during shutdown.
					add_action( 'shutdown', array( WC()->customer, 'save' ), 10 );
				}

				// Load Cart.
				if ( null === WC()->cart ) {
					WC()->cart = new WC_Cart();
				}
			}
		}

	}

	new ECOMFIT_Woocommerce();
}
