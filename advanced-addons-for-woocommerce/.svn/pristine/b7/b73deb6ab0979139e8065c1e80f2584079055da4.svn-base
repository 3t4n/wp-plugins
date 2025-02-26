<?php
/**
 * Admin Class for WooCommerce Addon Plugin
 *
 * Handles all admin-related functionalities, including adding a custom tab in the product edit page.
 *
 * @package advanced-addons-for-woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Admin Class
 */
class AAFW_Addon_Admin {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'aafw_add_addon_tab' ) );
		add_action( 'woocommerce_product_data_panels', array( $this, 'aafw_render_addon_tab_content' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'aafw_enqueue_admin_assets' ) );
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'aafw_add_settings_tab' ), 50 );
		add_action( 'woocommerce_settings_tabs_product_addons', array( $this, 'aafw_render_add_settings' ) );
		add_action( 'woocommerce_update_options_product_addons', array( $this, 'aafw_save_settings' ) );
	}


	/**
	 * Add Product Addons Field
	 *
	 * Adds a hidden field to the product edit page for storing product addons.
	 */
	public function aafw_product_addons_field() {
		add_meta_box(
			'product_addons',
			__( 'Product Addons', 'advanced-addons-for-woocommerce' ),
			array( $this, 'aafw_product_addons_field_callback' ),
			'product',
			'normal',
			'high'
		);
	}

	/**
	 * Product Addons Field Callback
	 *
	 * Outputs the hidden field for storing product addons.
	 */
	public function aafw_product_addons_field_callback() {
		global $post;
		$product_addons = get_post_meta( $post->ID, '_product_addons', true );
		printf(
			'<pre>%s</pre>',
			esc_html( wp_json_encode( $product_addons, JSON_PRETTY_PRINT ) )
		);
	}

	/**
	 * Add Custom Tab
	 *
	 * Adds a new tab to the WooCommerce product edit page.
	 *
	 * @param array $tabs Existing tabs.
	 * @return array Modified tabs.
	 */
	public function aafw_add_addon_tab( $tabs ) {
		$tabs['addons_manager'] = array(
			'label'    => __( 'Addons Manager', 'advanced-addons-for-woocommerce' ),
			'target'   => 'addons_manager_product_data',
			'class'    => array(),
			'priority' => 21, // Position after Inventory tab.
		);
		return $tabs;
	}

	/**
	 * Render Addon Tab Content
	 *
	 * Outputs the HTML container for the tab content.
	 */
	public function aafw_render_addon_tab_content() {
		global $post;

		echo '<div id="addons_manager_product_data" class="panel woocommerce_options_panel hidden">';
		echo '<div id="woocommerce-addon-admin"></div>';
		echo '</div>';
	}

	/**
	 * Enqueue Admin Assets
	 *
	 * Loads React and custom admin styles/scripts.
	 *
	 * @param string $hook Current admin page.
	 */
	public function aafw_enqueue_admin_assets( $hook ) {
		$screen = get_current_screen();
		if ( 'product' !== $screen->id ) {
			return;
		}
		// Enqueue React and custom scripts.
		wp_enqueue_script(
			'woocommerce-addon-admin',
			plugins_url( 'dist/bundle.js', __DIR__ ),
			array( 'wp-element', 'wp-components' ),
			'1.0.0',
			true
		);

		// Enqueue custom admin styles.
		wp_enqueue_style(
			'woocommerce-addon-admin-styles',
			plugins_url( 'dist/styles.css', __DIR__ ),
			array(),
			'1.0.0'
		);

		// Localize script for AJAX or other dynamic data.
		wp_localize_script(
			'woocommerce-addon-admin',
			'woocommerceAddonAdmin',
			array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'nonce'      => wp_create_nonce( 'woocommerce_addon_nonce' ),
				'product_id' => get_the_ID(),
			)
		);
	}
	/**
	 * Add "Product Addons" tab to WooCommerce settings.
	 *
	 * @param array $tabs Existing WooCommerce settings tabs.
	 * @return array Modified tabs with Product Addons.
	 */
	public function aafw_add_settings_tab( $tabs ) {
		$tabs['product_addons'] = __( 'Product Addons', 'advanced-addons-for-woocommerce' );
		return $tabs;
	}

	/**
	 * Render settings for "Product Addons" tab.
	 */
	public function aafw_render_add_settings() {
		woocommerce_admin_fields( $this->aafw_get_settings() );
	}

	/**
	 * Save settings for "Product Addons" tab.
	 */
	public function aafw_save_settings() {
		woocommerce_update_options( $this->aafw_get_settings() );
	}

	/**
	 * Get settings for "Product Addons" tab.
	 *
	 * @return array Settings fields.
	 */
	private function aafw_get_settings() {
		return array(
			array(
				'title' => __( 'Product Addons Settings', 'advanced-addons-for-woocommerce' ),
				'type'  => 'title',
				'id'    => 'aafw_product_addons_settings',
			),
			array(
				'title'   => __( 'Enable Addons Globally', 'advanced-addons-for-woocommerce' ),
				'desc'    => __( 'Enable or disable the Product Addons feature globally.', 'advanced-addons-for-woocommerce' ),
				'id'      => 'enable_addons_globally',
				'type'    => 'checkbox',
				'default' => 'yes',
			),
			array(
				'title'   => __( 'Default Addon State', 'advanced-addons-for-woocommerce' ),
				'desc'    => __( 'Choose whether addons are expanded or collapsed by default.', 'advanced-addons-for-woocommerce' ),
				'id'      => 'default_addon_state',
				'type'    => 'select',
				'default' => 'expanded',
				'options' => array(
					'expanded'  => __( 'Expanded', 'advanced-addons-for-woocommerce' ),
					'collapsed' => __( 'Collapsed', 'advanced-addons-for-woocommerce' ),
				),
			),
			array(
				'title'   => __( 'Require Addon Selection', 'advanced-addons-for-woocommerce' ),
				'desc'    => __( 'Force customers to select an addon before adding the product to the cart.', 'advanced-addons-for-woocommerce' ),
				'id'      => 'require_addon_selection',
				'type'    => 'checkbox',
				'default' => 'no',
			),
			array(
				'title'    => __( 'Enable Tax for Addons', 'advanced-addons-for-woocommerce' ),
				'id'       => 'enable_addon_tax',
				'default'  => 'no',
				'type'     => 'checkbox',
				'desc'     => __( 'Enable tax calculation for product addons.', 'advanced-addons-for-woocommerce' ),
				'desc_tip' => true,
			),
			array(
				'title'    => __( 'Tax Class', 'advanced-addons-for-woocommerce' ),
				'id'       => 'addon_tax_class',
				'default'  => '',
				'type'     => 'select',
				'desc'     => __( 'Select a tax class for addons.', 'advanced-addons-for-woocommerce' ),
				'desc_tip' => true,
				'options'  => array(
					''             => __( 'Standard', 'advanced-addons-for-woocommerce' ),
					'reduced-rate' => __( 'Reduced Rate', 'advanced-addons-for-woocommerce' ),
					'zero-rate'    => __( 'Zero Rate', 'advanced-addons-for-woocommerce' ),
				),
			),
			array(
				'type' => 'sectionend',
				'id'   => 'aafw_product_addons_settings',
			),
		);
	}
}
