<?php
/**
 * Class AWSA_Shipping
 *
 * @version           1.1.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

namespace AWSA_Shipping;

use AWSA_Checkout;
use AWSA_WC_States_cities;

/**
 * Core Class in Plugin
 */
final class AWSA_Shipping {

	/**
	 * Plugin Version
	 *
	 * @var string
	 */
	public static $version = '1.0.0';

	/**
	 * Session instance
	 *
	 * @var bool
	 */
	protected static $instance;

	/**
	 * AWSA_Shipping Constructor
	 */
	public function __construct() {

		$this->define();
		$this->includes();
		$this->init_hooks();
		$this->admin();
		$this->enqueue_scripts();
	}

	/**
	 * AWSA_Shipping Instance
	 *
	 * @return self()
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Set Constants
	 *
	 * @return void
	 */
	public function define(): void {

		define( 'AWSA_SHIPPING_PD', plugin_dir_path( AWSA_SHIPPING_FILE ) );
		define( 'AWSA_SHIPPING_PDI', plugin_dir_path( AWSA_SHIPPING_FILE ) . 'includes/' );
		define( 'AWSA_SHIPPING_PU_JS', plugins_url( 'assets/js/', AWSA_SHIPPING_FILE ) );
		define( 'AWSA_SHIPPING_PU_CSS', plugins_url( 'assets/css/', AWSA_SHIPPING_FILE ) );
		define( 'AWSA_SHIPPING_PU_IMG', plugins_url( 'assets/img/', AWSA_SHIPPING_FILE ) );
		define( 'AWSA_SHIPPING_PU_FONTS', plugins_url( 'assets/fonts/', AWSA_SHIPPING_FILE ) );
		define( 'AWSA_SHIPPING_TEMPLATES', plugin_dir_path( AWSA_SHIPPING_FILE ) . 'templates/' );
	}

	/**
	 * Include Files
	 *
	 * @return void
	 */
	public function includes(): void {

		/**
		 *  Develop convert to class
		 */
		spl_autoload_register( __CLASS__ . '::autoload' );
		include dirname( __DIR__, 1 ) . '/vendor/autoload.php';

		require_once AWSA_SHIPPING_PDI . 'core.php';
		/* awsa-settings.php */
		require_once AWSA_SHIPPING_PDI . 'functions.php';

		require_once AWSA_SHIPPING_PDI . 'shipping-functions.php';

	}


	/**
	 * Function for add Shipping Methods to Woocommerce
	 *
	 * @param array $methods
	 *
	 * @return array
	 */
	public static function shipping_methods( array $methods ): array {

		$methods['awsa_pishtaz']      = 'AWSA_Shipping_Method_Pishtaz';
		$methods['awsa_sefareshi']    = 'AWSA_Shipping_Method_Sefareshi';
		$methods['awsa_express']      = 'AWSA_Shipping_Method_Express';
		$methods['awsa_air_delivery'] = 'AWSA_Shipping_Method_Air_Delivery';

		return $methods;
	}


	/**
	 * Include Files If is Admin
	 *
	 * @return void
	 */
	public function admin(): void {

		if ( !is_admin() ) {
			return;
		}

		// awsa-admin-settings.php
		// awsa-admin-core.php
		require_once AWSA_SHIPPING_PDI . 'admin.php';
	}

	/**
	 * Autoload Class
	 *
	 * @param string $class_name
	 *
	 * @return bool
	 */
	public function autoload( string $class_name ): bool {

		if ( !( false !== strpos( $class_name, 'AWSA' ) || false !== strpos( $class_name, 'AWSA_Core\\' ) ) ) {

			return false;
		}

		if ( false !== strpos( $class_name, 'AWSA_Core\\' ) ) {

			$class_name = str_replace( 'AWSA_Core\\', 'core\\', $class_name );
		} elseif ( false !== strpos( $class_name, 'AWSA_Shipping\\' ) ) {

			$class_name = str_replace( 'AWSA_Shipping\\', '', $class_name );
		}

		$ex         = explode( '\\', $class_name );
		$class_name = 'class-' . $ex[ count( $ex ) - 1 ];
		unset( $ex[ count( $ex ) - 1 ] );
		if ( !empty( $ex ) ) {

			$class_name = implode( '/', $ex ) . '/' . $class_name;
		} else {

			$class_name = str_replace( 'AWSA_', '', $class_name );
		}

		$class_name = strtolower( $class_name );
		$class_name = str_replace( '_', '-', $class_name );

		$filename = AWSA_SHIPPING_PDI . $class_name . '.php';
		if ( file_exists( $filename ) ) {
			require_once $filename;

			return true;
		}

		return false;
	}

	/**
	 * Load Plugin Text Domain
	 */
	public function load_plugin_textdomain(): void {

		load_plugin_textdomain(
			'awsa-shipping',
			false,
			dirname( plugin_basename( AWSA_SHIPPING_FILE ) ) . '/languages'
		);
	}

	/**
	 * Register actions enqueue scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {

		add_action( 'wp_enqueue_scripts', '\AWSA_Shipping\Scripts::enqueue', 99 );
	}

	/**
	 * Add Hooks - Actions and Filters
	 *
	 * @return void
	 */
	public function init_hooks(): void {

		add_action( 'init', [ $this, 'init' ] );
		register_activation_hook( AWSA_SHIPPING_FILE, __CLASS__ . '::register_activation' );
		$settings = awsa_shipping_get_settings();
		if ( !isset( $settings['add-order-statuses'] ) || !empty( $settings['add-order-statuses'] ) ) {
			Order_Statuses::init();
		}

		add_filter(
			'woocommerce_cart_shipping_method_full_label',
			'awsa_shipping_filter_woocommerce_cart_shipping_method_full_label',
			10,
			2
		);

		if ( in_array(
			'woocommerce/woocommerce.php',
			apply_filters( 'active_plugins', get_option( 'active_plugins' ) ),
			true
		) ) {
			add_filter( 'woocommerce_shipping_methods', [ __CLASS__, 'shipping_methods' ], 10 );
		}

		add_filter( 'awsa_package_info_get_weight', 'awsa_add_default_weight_for_products', 10, 2 );

		add_action( 'woocommerce_order_details_before_order_table', [ __CLASS__, 'display_parcel_detail' ], 10 );

		//export orders
		add_filter( 'woe_fetch_order_data', [ __CLASS__, 'replace_city_id_in_export_orders' ] );

	}

	/**
	 * Active Plugin
	 *
	 * @return void
	 */
	public static function register_activation(): void {

		$pw_options = get_option( 'PW_Options', false );
		if ( $pw_options && isset( $pw_options['enable_iran_cities'] ) && 'yes' === $pw_options['enable_iran_cities'] ) {
			$pw_options['enable_iran_cities'] = 'no';
			update_option( 'PW_Options', $pw_options );
		}

		awsa_shipping_update_store_city();
	}


	/**
	 * Init AWSA_Shipping after WordPress
	 *
	 * @return void
	 */
	public function init(): void {

		$this->load_plugin_textdomain();
		if ( function_exists( 'WC' ) ) {
			AWSA_Checkout::init();
			AWSA_WC_States_cities::init();
		}
	}

	/**
	 * Display Parcel detail
	 *
	 * @param \WC_Order $order
	 *
	 * @hooked 'woocommerce_order_details_before_order_table'
	 * @since  1.1.0
	 * @return void
	 */
	public static function display_parcel_detail( $order ): void {

		$settings         = awsa_shipping_get_settings();
		$display_settings = $settings['parcel-details-display'] ?? [];
		$hide_settings = $settings['hide-parcel-details'] ?? [];
		$order_id    = $order->get_id();
		$parcel_code = awsa_shipping_get_parcel_code( $order_id );


		if ( is_account_page() && !in_array( 'view-order', $display_settings, true ) ) {

			return;
		}

		if ( is_checkout() && !empty( is_wc_endpoint_url( 'order-received' ) && !in_array( 'thank-you', $display_settings, true ) ) ) {

			return;
		}

		if(!$order->needs_shipping_address() && in_array( 'not-require-shipping', $hide_settings, true )){

			return;
		}

		if(empty($parcel_code) && in_array( 'empty-parcel-code', $hide_settings, true )){

			return;
		}

		include AWSA_SHIPPING_TEMPLATES . 'template-customer-parcel-info.php';

	}

	public static function replace_city_id_in_export_orders( $records ) {

		foreach ( $records as $r_id => $record ) {
			if ( array_key_exists( 'shipping_city', $record ) ) {
				$country                           = $record['shipping_country'];
				$state                             = $record['shipping_state'];
				$records[ $r_id ]['shipping_city'] = awsa_get_city_title_by_city_id( $record['shipping_city'], $state, $country );
			}

			if ( array_key_exists( 'billing_city', $record ) ) {
				$country                          = $record['billing_country'];
				$state                            = $record['billing_state'];
				$records[ $r_id ]['billing_city'] = awsa_get_city_title_by_city_id( $record['billing_city'], $state, $country );
			}
		}

		return $records;
	}

}
