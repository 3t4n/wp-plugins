<?php
/**
 * Plugin Name: Feed For TikTok Shop
 * Description: Easily optimize and sync your product listings with TikTok Shop.
 * Version: 1.0.13
 * Author: AfterShip
 * Author URI: https://www.aftership.com/
 * Copyright: © AfterShip
 * License: GPL2
 */

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AUTOMIZELY_FEED_VERSION', '1.0.13' );
define( 'AUTOMIZELY_FEED_PATH', dirname( __FILE__ ) );
define( 'AUTOMIZELY_FEED_URL', plugins_url() . '/' . basename( AUTOMIZELY_FEED_PATH ) );


class Automizely_Feed {

	/**
	 * Instance of Automizely_Feed_Actions.
	 *
	 * @var Automizely_Feed_Actions
	 */
	public $actions;

	/**
	 * Plugin dir.
	 *
	 * @var string
	 */
	public $plugin_dir;

	public function __construct() {
		$this->plugin_dir = untrailingslashit( plugin_dir_path( __FILE__ ) );

		// Include required files.
		$this->includes();

		/**
		 * Add rest API when wooCommerce installed.
		 *
		 * @since 1.0.0
		 */
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
			add_filter( 'woocommerce_rest_api_get_rest_namespaces', array( $this, 'add_rest_api' ) );
		}

		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'plugins_loaded', array( $this, 'add_textdomain' ) );
		add_action( 'admin_init', array( $this, 'active_plugin' ) );
		add_action( 'admin_footer', array( $this, 'deactivate_modal' ) );

		add_filter( 'rest_shop_order_collection_params', array( $this->actions, 'add_collection_params' ), 10, 1 );
		add_filter( 'rest_shop_coupon_collection_params', array( $this->actions, 'add_collection_params' ), 10, 1 );
		add_filter( 'rest_product_collection_params', array( $this->actions, 'add_collection_params' ), 10, 1 );
		add_filter( 'woocommerce_rest_orders_prepare_object_query', array( $this->actions, 'add_query' ), 10, 2 );
		add_filter( 'woocommerce_rest_product_object_query', array( $this->actions, 'add_query' ), 10, 2 );
		add_filter( 'woocommerce_rest_shop_coupon_object_query', array( $this->actions, 'add_query' ), 10, 2 );
		add_filter( 'woocommerce_rest_customer_query', array( $this->actions, 'add_customer_query' ), 10, 2 );

		add_action( 'woocommerce_rest_insert_order_note', array( $this->actions, 'woocommerce_rest_insert_order_note' ), 10, 2 );
		add_action('woocommerce_order_note_added', array( $this->actions, 'woocommerce_order_note_added' ), 10, 2 );

		register_activation_hook( __FILE__, array( 'Automizely_Feed', 'install' ) );
		register_deactivation_hook( __FILE__, array( 'Automizely_Feed', 'deactivation' ) );
		register_uninstall_hook( __FILE__, array( 'Automizely_Feed', 'deactivation' ) );
	}

	/**
	 * Include required files.
	 */
	private function includes() {
		include $this->plugin_dir . '/includes/class-feed-actions.php';
		$this->actions = Automizely_Feed_Actions::get_instance();
		include_once $this->plugin_dir . '/includes/api/feed/v1/class-am-feed-rest-settings-controller.php';
	}

	/**
	 * Add a menu link to landing page.
	 *
	 * @return void
	 */
	public function add_admin_menu() {
		add_menu_page(
			'Feed for TikTok Shop',
			'Feed for TikTok Shop',
			'manage_options',
			'automizely-feed-index',
			array( $this, 'load_landing_page' ),
			AUTOMIZELY_FEED_URL . '/assets/images/sidebar_aftership_feed.svg'
		);
	}

	/**
	 * Include landing page.
	 *
	 * @return void
	 */
	public function load_landing_page() {
		include_once AUTOMIZELY_FEED_PATH . '/views/feed-landing-view.php';
	}

	/**
	 * Loading translate file.
	 *
	 * @return void
	 */
	public function add_textdomain() {
		load_plugin_textdomain( 'automizely_feed', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * Redirect to landing page when option has been set.
	 *
	 * @return void
	 **/
	public function active_plugin() {
		if ( get_option( 'automizely_feed_plugin_redirection', false ) ) {
			delete_option( 'automizely_feed_plugin_redirection' );
			wp_redirect( esc_url( 'admin.php?page=automizely-feed-index' ) );
			exit( 0 );
		}
	}

	/**
	 * Not allow to open page by links.
	 *
	 * @return void
	 **/
	public function deactivate_modal() {
		if ( current_user_can( 'manage_options' ) ) {
			global $pagenow;

			if ( 'plugins.php' !== $pagenow ) {
				return;
			}
		}
	}

	/**
	 * Create option when plugin installed.
	 *
	 * @return void
	 **/
	public static function install() {
		add_option( 'automizely_feed_plugin_redirection', true );
	}

	/**
	 * Remove settings when plugin deactivation.
	 *
	 * @return void
	 **/
	public static function deactivation() {
		$legacy_options = get_option( 'feed_option_name' ) ? get_option( 'feed_option_name' ) : array();
		update_option( 'feed_option_name', $legacy_options );
		delete_option( 'automizely_feed_plugin_redirection' );
	}

	/**
	 * Register REST API endpoints
	 *
	 * @param array $controllers REST Controllers.
	 *
	 * @return array
	 */
	public function add_rest_api( $controllers ) {
		$controllers['wc/feed/v1']['settings'] = 'AM_FEED_REST_Settings_Controller';
		return $controllers;
	}

}


new Automizely_Feed();

