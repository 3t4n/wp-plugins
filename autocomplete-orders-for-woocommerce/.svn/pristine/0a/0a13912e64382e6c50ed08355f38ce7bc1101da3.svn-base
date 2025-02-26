<?php

namespace AutocompleteOrdersForWooCommerce;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class Plugin.
 *
 * @since 1.0.0
 *
 * @package AutocompleteOrdersForWooCommerce
 */
class Plugin extends \AutocompleteOrdersForWooCommerce\ByteKit\Plugin {

	/**
	 * Plugin constructor.
	 *
	 * @param array $data The plugin data.
	 *
	 * @since 1.0.0
	 */
	protected function __construct( $data ) {
		parent::__construct( $data );
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Define constants.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function define_constants() {
		$this->define( 'AOFW_VERSION', $this->get_version() );
		$this->define( 'AOFW_FILE', $this->get_file() );
		$this->define( 'AOFW_PATH', $this->get_dir_path() );
		$this->define( 'AOFW_URL', $this->get_dir_url() );
		$this->define( 'AOFW_ASSETS_URL', $this->get_assets_url() );
		$this->define( 'AOFW_ASSETS_PATH', $this->get_assets_path() );
	}

	/**
	 * Include required files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function includes() {}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'before_woocommerce_init', array( $this, 'on_before_woocommerce_init' ) );
		add_action( 'woocommerce_init', array( $this, 'on_init' ), 0 );
		add_filter( 'woocommerce_general_settings', array( $this, 'add_global_settings' ) );
	}

	/**
	 * Run on before WooCommerce init.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function on_before_woocommerce_init() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', $this->get_file(), true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', $this->get_file(), true );
		}
	}

	/**
	 * Init the plugin after plugins_loaded so environment variables are set.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function on_init() {
		$this->set( Orders::class );

		// Admin only controllers.
		if ( is_admin() ) {
			$this->set( Admin\Admin::class );
			$this->set( Admin\Notices::class );
		}

		// Init action.
		do_action( 'autocomplete_orders_for_woocommerce_init' );
	}

	/**
	 * Inject global settings into the Settings > General page, immediately after the 'Store Notice' setting.
	 *
	 * @param array $settings Associative array of WooCommerce settings.
	 *
	 * @since 1.0.0
	 * @return array Associative array of WooCommerce settings.
	 */
	public function add_global_settings( $settings ) {

		$updated_settings = array();
		$count            = count( $settings );
		for ( $i = 0; $i < $count; $i++ ) {

			$updated_settings[] = $settings[ $i ];
			$next_setting       = isset( $settings[ $i + 1 ] ) ? $settings[ $i + 1 ] : array();

			// Insert our field just before the general options end marker.
			if ( ! empty( $next_setting ) ) {
				if ( isset( $next_setting['id'] ) && 'general_options' === $next_setting['id'] && isset( $next_setting['type'] ) && 'sectionend' === $next_setting['type'] ) {
					$updated_settings = array_merge( $updated_settings, $this->get_global_settings() );
				}
			}
		}

		return $updated_settings;
	}

	/**
	 * Returns the global settings array for the plugin.
	 *
	 * @since 1.0.0
	 * @return array The global settings.
	 */
	public function get_global_settings() {
		return apply_filters(
			'autocomplete_orders_for_woocommerce_settings',
			array(
				array(
					'title'    => __( 'Orders to autocomplete', 'autocomplete-orders-for-woocommerce' ),
					'desc_tip' => __( 'Select which types of orders should be changed to be completed. Default WooCommerce behavior is "Virtual & Downloadable".', 'autocomplete-orders-for-woocommerce' ),
					'id'       => 'aofw_autocomplete_order_status',
					'default'  => 'virtual_downloadable',
					'type'     => 'select',
					'class'    => 'wc-enhanced-select',
					'options'  => array(
						'none'                 => __( 'None', 'autocomplete-orders-for-woocommerce' ),
						'all'                  => __( 'All Orders', 'autocomplete-orders-for-woocommerce' ),
						'virtual'              => __( 'Virtual Orders', 'autocomplete-orders-for-woocommerce' ),
						'virtual_downloadable' => __( 'Virtual & Downloadable Orders', 'autocomplete-orders-for-woocommerce' ),
					),
				),
				array(
					'title'    => __( 'Orders to autocomplete for', 'autocomplete-orders-for-woocommerce' ),
					'desc'     => __( 'Select the payment option that should be changed orders to be auto completed when customer place an order. Default: Complete orders upon payment complete. Here, "BACS: Direct bank transfer", "CHECK: Check payments" & "COD: Cash on delivery".', 'autocomplete-orders-for-woocommerce' ),
					'desc_tip' => __( 'Select the payment option that should be changed orders to be auto completed when customer place an order. Default: Complete orders upon payment complete.', 'autocomplete-orders-for-woocommerce' ),
					'id'       => 'aofw_auto_complete_order_for',
					'default'  => 'upon_payment_complete',
					'type'     => 'select',
					'class'    => 'wc-enhanced-select',
					'options'  => array(
						'upon_payment_complete' => __( 'Complete orders upon payment complete', 'autocomplete-orders-for-woocommerce' ),
						'upon_bacs_check_cod'   => __( 'Complete orders upon "BACS, CHECK or COD".', 'autocomplete-orders-for-woocommerce' ),
					),
				),
			)
		);
	}
}
