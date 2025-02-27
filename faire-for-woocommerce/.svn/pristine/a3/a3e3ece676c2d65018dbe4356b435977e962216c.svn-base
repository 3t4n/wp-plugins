<?php
/**
 * Integration Demo Integration.
 *
 * @package  Wc_Integration_Faire
 * @category Integration
 * @author   Faire
 */

namespace Faire\Wc\Admin;

use Exception;
use Faire\Wc\Api\Faire_Api;
use Faire\Wc\Api\Order_Api;
use Faire\Wc\Api\Product_Api;
use Faire\Wc\Sync\Sync_Order;
use Faire\Wc\Sync\Sync_Product;
use Faire\Wc\Sync\Sync_Taxonomy;
use Faire\Wc\Sync\Sync_Brand;
use Faire\Wc\Sync\Sync_Product_Linking;
use Faire\Wc\Admin\Settings;

class Wc_Integration_Faire extends \WC_Integration {

	/**
	 *  Instance of Faire\Wc\Admin\Settings class.
	 *
	 * @var Settings
	 */
	protected $plugin_settings;

	/**
	 * Minimum width for products images.
	 *
	 * @var int
	 */
	const IMAGE_MIN_WIDTH = 1050;

	/**
	 * Minimum height for products images.
	 *
	 * @var int
	 */
	const IMAGE_MIN_HEIGHT = 1050;

	/**
	 * Init and hook in the integration.
	 */
	public function __construct() {
		global $woocommerce;

		$this->id                 = 'faire_wc_integration';
		$this->method_title       = __( 'Faire', 'faire-for-woocommerce' );
		$this->method_description = '';

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Load plugin Settings getter setter functions.
		$this->plugin_settings = new Settings();

		// Actions.
		add_action( 'woocommerce_update_options_integration_' . $this->id, array( $this, 'process_admin_options' ) );

		// Filters.
		add_filter( 'woocommerce_settings_api_sanitized_fields_' . $this->id, array( $this, 'sanitize_settings' ) );

		// Ensures inventory sync is disabled if WooCommerce stock management is.
		add_filter( 'woocommerce_admin_settings_sanitize_option', array( $this, 'manage_inventory_sync_settings' ), 10, 2 );

		// Handles the Ajax call to test the API connection.
		add_action( 'wp_ajax_faire_test_api_connection', array( $this, 'ajax_test_api_connection' ) );

		// Handles the Ajax call to sync orders.
		add_action(
			'wp_ajax_faire_orders_manual_sync',
			array(
				new Sync_Order( new Order_Api(), new Settings() ),
				'ajax_orders_manual_sync',
			)
		);

		// Handles the Ajax call to sync taxonomy.
		add_action(
			'wp_ajax_faire_product_taxonomy_manual_sync',
			array(
				new Sync_Taxonomy( new Product_Api(), new Settings() ),
				'ajax_taxonomy_manual_sync',
			)
		);

		// Handles the Ajax call to sync the brand.
		add_action(
			'wp_ajax_faire_brand_manual_sync',
			array(
				new Sync_Brand( new Faire_Api(), new Settings() ),
				'ajax_brand_manual_sync',
			)
		);

		// Handles the Ajax call to link products
		add_action(
			'wp_ajax_faire_product_linking_manual_sync',
			array(
				new Sync_Product_Linking( new Product_Api(), new Settings() ),
				'ajax_product_linking_manual_sync',
			)
		);

		// Handles download of csv from settings page
		if ( is_admin() && ( isset( $_GET['wc_faire_link_products_csv'] ) || isset( $_GET['wc_faire_link_variations_csv'] ) ) )  {
			$product_linking = new Sync_Product_Linking( new Product_Api(), new Settings() );
			if ( isset( $_GET['wc_faire_link_products_csv'] ) ) {
				$product_linking->download_faire_create_csv( 'products' );
			}
			if ( isset( $_GET['wc_faire_link_variations_csv'] ) ) {
				$product_linking->download_faire_create_csv( 'variations' );
			}
		}


		if (isset($_GET['forcecheck'])) {
			$this->maybe_run_initial_setup_sync();
		}
	}

	/**
	 * Output the admin options table.
	 */
	public function admin_options() {

		self::maybe_disable_fields();

		parent::admin_options();

		if ( empty( $_POST ) ) { // On settings submit, display errors during process_admin_options().
			self::display_errors();
		}
	}

	/**
	 * Checks if the shop country is in the EU.
	 *
	 * @return bool True if the shop country is in the EU.
	 */
	public function shop_country_in_eu(): bool {
		return in_array(
			WC()->countries->get_base_country(),
			WC()->countries->get_european_union_countries(),
			true
		);
	}

	/**
	 * Initialize integration settings form fields.
	 *
	 * @return void
	 */
	public function init_form_fields() {
		$site_title                     = get_bloginfo( 'name' );
		$woocommerce_logs_url           = admin_url( 'admin.php?page=wc-status&tab=logs' );
		$faire_pricing_policy_url       = defined( 'FAIRE_PRICING_POLICY_URL' )
			? FAIRE_PRICING_POLICY_URL
			: 'https://www.faire-stage.com/support/articles/360019040531';
		$faire_pricing_policy_statement = $this->shop_country_in_eu()
			? sprintf(
				// translators: %1$, %2$ link to pricing policy.
				__( 'To comply with %1$sFaire\'s pricing policy%2$s, your wholesale prices must be the same across all sales channels.', 'faire-for-woocommerce' ),
				'<a href="' . $faire_pricing_policy_url . '" target = "_blank">',
				'</a>'
			)
			: sprintf(
				// translators: %1$, %2$ link to pricing policy.
				__( 'To comply with %1$sFaire\'s pricing policy%2$s, your wholesale and retail prices must be the same across all sales channels.', 'faire-for-woocommerce' ),
				'<a href="' . $faire_pricing_policy_url . '" target = "_blank">',
				'</a>'
			);

		$this->form_fields = array(
			// Faire API related settings.
			'api_key'                       => array(
				'title'       => __( 'API Key', 'faire-for-woocommerce' ),
				'type'        => 'text',
				'description' => __( 'Enter with your API Key.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
				'default'     => '',
			),
			'api_mode'                      => array(
				'title'       => __( 'API Mode', 'faire-for-woocommerce' ),
				'type'        => 'select',
				'options'     => array(
					'production' => __( 'Production', 'faire-for-woocommerce' ),
					'staging'    => __( 'Staging', 'faire-for-woocommerce' ),
				),
				'description' => __( 'Select API environment for the provided API Key.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
				'default'     => 'production',
			),
			'initial_setup_products_exist'  => array(
				'label'       => __( 'Existing products found.', 'faire-for-woocommerce' ),
				'type'        => 'hidden',
				'description' => '',
			),
			'initial_setup'                 => array(
				'label'       => __( 'Save & Finish Setup', 'faire-for-woocommerce' ),
				'type'        => 'button',
				'description' => 'Save the API key and perform an initial sync of the Brand and Taxonomy types.',
				'class'       => 'button-primary',
			),
			'debug'                         => array(
				'title'       => __( 'Debug Log', 'faire-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Enable logging', 'faire-for-woocommerce' ),
				'default'     => 'no',
				'description' => str_replace(
					'\n',
					'<br />',
					sprintf(
						// translators: %1$s link start %2$s link end.
						__( 'Log events such as API requests and responses will be created if this option is checked. This can be used in case of technical issues and can be found in %1$sWooCommerce > Status > Logs%2$s.', 'faire-for-woocommerce' ),
						'<a href="' . $woocommerce_logs_url . '" target = "_blank">',
						'</a>'
					)
				),
			),
			'test_api_connection'           => array(
				'label'       => __( 'Test connection', 'faire-for-woocommerce' ),
				'type'        => 'button',
				'desc_tip'    => true,
				'description' => 'Test the connection to the Faire API',
				'class'       => 'button-secondary',
			),
			// Brand related settings.
			'brand_title'                   => array(
				'title'       => __( 'Brand', 'faire-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Your brand locale and currency configuration at Faire.', 'faire-for-woocommerce' ),
			),
			'brand_locale'                  => array(
				'title'             => 'Locale',
				'type'              => 'text',
				'description'       => '',
				'default'           => 'not synced',
				'class'             => 'disabled',
				'custom_attributes' => array(
					'readonly' => 'readonly',
				),
			),
			'brand_currency'                => array(
				'title'             => 'Currency',
				'type'              => 'text',
				'description'       => '',
				'class'             => 'disabled',
				'default'           => 'not synced',
				'custom_attributes' => array(
					'readonly' => 'readonly',
				),
			),
			'brand_sync_manual'             => array(
				'label'       => __( 'Brand Sync', 'faire-for-woocommerce' ),
				'type'        => 'button',
				'desc_tip'    => true,
				'description' => 'Get the brand profile from Faire.',
				'class'       => 'button-secondary',
			),
			// Faire product linking sync.
			'product_linking_title'                   => array(
				'title'       => __( 'Product linking', 'faire-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Faire Product linking.', 'faire-for-woocommerce' ),
			),
			'product_linking_sync_manual'             => array(
				'title'             => __( 'Link Products', 'faire-for-woocommerce' ),
				'label'             => __( 'Link products now', 'faire-for-woocommerce' ),
				'type'              => 'button',
				'description'       => __( 'Triggers product linking with faire products and wordpress products by SKU.', 'faire-for-woocommerce' ),
				'desc_tip'          => true,
			),
			'product_linking_sync_results'            => array(
				'title'             => __( 'Last Linking Results', 'faire-for-woocommerce' ),
				'type'              => 'textarea',
				'description'       => __( 'Shows the result of the last product linking.', 'faire-for-woocommerce' ),
				'class'  		    => 'disabled',
				'css'               => 'min-height:200px;min-width:min(400px,80%);width:min(400px,100%);resize:both;overflow-y:auto;',
				'custom_attributes' => array(
					'readonly' => 'readonly',
				),
			),
			'create_new_variations_when_linking'      => array(
				'title'       => __( 'Create new variations', 'faire-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Yes', 'faire-for-woocommerce' ),
				'default'     => 'no',
				'description' => __( 'Check this option to create new wordpress product variations when linking products.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'create_new_products_when_linking'        => array(
				'title'       => __( 'Create new products', 'faire-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Yes', 'faire-for-woocommerce' ),
				'default'     => 'no',
				'description' => __( 'Check this option to create new wordpress products when linking products.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'product_linking_create_variations_csv'    => array(
				'title'             => __( 'Variation CSV', 'faire-for-woocommerce' ),
				'label'             => __( 'Download variation CSV', 'faire-for-woocommerce' ),
				'type'              => 'button',
				'description'       => __( 'Download new variations CSV for importing into wordpress.', 'faire-for-woocommerce' ),
				'desc_tip'          => true,
			),
			'product_linking_create_products_csv'      => array(
				'title'             => __( 'Product CSV', 'faire-for-woocommerce' ),
				'label'             => __( 'Download product CSV', 'faire-for-woocommerce' ),
				'type'              => 'button',
				'description'       => __( 'Download new products CSV for importing into wordpress.', 'faire-for-woocommerce' ),
				'desc_tip'          => true,
			),
			// Products related settings.
			'product_title'                 => array(
				'title'       => __( 'Products', 'faire-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Set product related settings when syncing to Faire.', 'faire-for-woocommerce' ),
			),
			'product_sync_mode'             => array(
				'title'    => __( 'Product sync Mode', 'faire-for-woocommerce' ),
				'type'     => 'select',
				'desc_tip' => false,
				'options'  => array(
					'do_not_sync'    => __( 'Do Not Sync', 'faire-for-woocommerce' ),
					'sync_scheduled' => __( 'Sync Scheduled', 'faire-for-woocommerce' ),
				),
				'class'    => 'wc-enhanced-select',
				'default'  => 'do_not_sync',
			),
			'product_sync_schedule_num'     => array(
				'title'             => __( 'Sync Schedule Every', 'faire-for-woocommerce' ),
				'type'              => 'number',
				'description'       => __( 'Sync automatically based on these settings.', 'faire-for-woocommerce' ),
				'desc_tip'          => true,
				'class'             => '',
				'default'           => '1',
				'custom_attributes' => array(
					'min'  => '0.5',
					'max'  => '5000',
					'step' => '0.5',
				),
			),
			'product_sync_schedule_time'    => array(
				'title'    => __( 'Product sync schedule time', 'faire-for-woocommerce' ),
				'type'     => 'select',
				'desc_tip' => false,
				'options'  => array(
					'hours' => __( 'Hour(s)', 'faire-for-woocommerce' ),
					'daily' => __( 'Day(s)', 'faire-for-woocommerce' ),
				),
				'class'    => 'wc-enhanced-select',
				'default'  => 'daily',
			),
			'inventory_sync_on_change'      => array(
				'title'       => __( 'Sync on Stock Update', 'faire-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Yes', 'faire-for-woocommerce' ),
				'default'     => 'yes',
				'description' => __( 'Check this option to sync product details on every stock update.', 'faire-for-woocommerce' ),
				'desc_tip'    => false,
			),
			'product_pricing_policy'        => array(
				'title'       => __( 'Pricing policy', 'faire-for-woocommerce' ),
				'type'        => 'radio',
				'label'       => __( 'Yes', 'faire-for-woocommerce' ),
				'default'     => 'yes',
				'description' => __( 'Select your pricing policy for products.', 'faire-for-woocommerce' ),
				'desc_tip'    => false,
				'options'     => array(
					'wholesale_percentage' => __( 'Retail prices', 'faire-for-woocommerce' ),
					'wholesale_multiplier' => __( 'Wholesale prices', 'faire-for-woocommerce' ),
				),
				'default'     => 'wholesale_percentage',
			),
			'product_wholesale_multiplier'  => array(
				'title'             => __( 'Wholesale Price multiplier', 'faire-for-woocommerce' ),
				'type'              => 'number',
				'default'           => '1.25',
				'description'       => $faire_pricing_policy_statement,
				'desc_tip'          => false,
				'custom_attributes' => array(
					'min'  => '1.25',
					'max'  => '10',
					'step' => '0.05',
				),
			),
			'product_wholesale_percentage'  => array(
				'title'             => __( 'Wholesale Price as a percentage of retail price(%)', 'faire-for-woocommerce' ),
				'type'              => 'number',
				'default'           => '80',
				'description'       => $faire_pricing_policy_statement,
				'desc_tip'          => false,
				'custom_attributes' => array(
					'min' => '10',
					'max' => '80',
				),
			),
			'product_image_size'            => array(
				'title'       => __( 'Image Size', 'faire-for-woocommerce' ),
				'type'        => 'select',
				'desc_tip'    => true,
				'description' => __( 'Select the size of image to send to Faire.', 'faire-for-woocommerce' ),
				'options'     => $this->get_images_sizes_options(
					$this->get_images_sizes_info(
						self::IMAGE_MIN_WIDTH,
						self::IMAGE_MIN_HEIGHT
					)
				),
				'default'     => 'original',
				'class'       => 'wc-enhanced-select',
			),
			'product_sync_exclude_fields'   => array(
				'title'       => __( 'Exclude Sync Fields', 'faire-for-woocommerce' ),
				'type'        => 'multiselect',
				'description' => __( 'Select Faire fields that a product sync should not overwrite.', 'faire-for-woocommerce' ),
				'options'     => array(
					'product.name'            => __( 'Product Name', 'faire-for-woocommerce' ),
					// 'product.short_description' => __( 'Product Short Description', 'faire-for-woocommerce' ),
					'product.description'     => __( 'Product Description', 'faire-for-woocommerce' ),
          'product.lifecycle_state' => __( 'Product & Variant Lifecycle State', 'faire-for-woocommerce' ),
					'product.images'          => __( 'Product Images', 'faire-for-woocommerce' ),
          'product.taxonomy_type'   => __( 'Product Taxonomy Type', 'faire-for-woocommerce' ),
					'product.allow_sales_when_out_of_stock' => __( 'Allow Sales When Out Of Stock', 'faire-for-woocommerce' ),
					'product.preorder_fields' => __( 'Product Preorder fields', 'faire-for-woocommerce' ),
					'variant.sku'             => __( 'Variant SKU', 'faire-for-woocommerce' ),
					'variant.tariff_code'     => __( 'Variant Tariff Code', 'faire-for-woocommerce' ),
					'variant.prices'          => __( 'Retail & Wholesale Prices', 'faire-for-woocommerce' ),
				),
				'class'       => 'wc-enhanced-select',
				'default'     => array(
					'product.allow_sales_when_out_of_stock',
					'product.preorder_fields',
					'variant.sku',
					'variant.tariff_code',
				),
			),
			'product_sync_manual'           => array(
				'title'       => __( 'Manual Sync', 'faire-for-woocommerce' ),
				'label'       => __( 'Sync products now', 'faire-for-woocommerce' ),
				'type'        => 'button',
				'class'       => 'button-secondary',
				'description' => __( 'Triggers products sync.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'product_sync_results'          => array(
				'title'             => __( 'Last Sync Results', 'faire-for-woocommerce' ),
				'type'              => 'textarea',
				'description'       => __( 'Shows the result of the last products sync.', 'faire-for-woocommerce' ),
				'class'             => 'disabled',
				'css'               => 'min-height:200px;min-width:min(400px,80%);width:min(400px,100%);resize:both;overflow-y:auto;',
				'custom_attributes' => array(
					'readonly' => 'readonly',
				),
			),
			// Orders and Inventory related settings.
			'order_title'                   => array(
				'title'       => __( 'Orders & Inventory', 'faire-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Set order and inventory related settings when syncing from Faire.', 'faire-for-woocommerce' ),
			),
			'order_sync_mode'               => array(
				'title'    => __( 'Order Sync Mode', 'faire-for-woocommerce' ),
				'type'     => 'select',
				'desc_tip' => false,
				'options'  => array(
					'do_not_sync'    => __( 'Do Not Sync', 'faire-for-woocommerce' ),
					'sync_scheduled' => __( 'Sync scheduled', 'faire-for-woocommerce' ),
				),
				'class'    => 'wc-enhanced-select',
				'default'  => 'do_not_sync',
			),
			'order_sync_schedule_num'       => array(
				'title'             => __( 'Sync Schedule Every', 'faire-for-woocommerce' ),
				'type'              => 'number',
				'description'       => __( 'Orders are synced at this time interval', 'faire-for-woocommerce' ),
				'desc_tip'          => true,
				'class'             => '',
				'default'           => '1',
				'custom_attributes' => array(
					'min'  => '0.5',
					'max'  => '5000',
					'step' => '0.5',
				),
			),
			'order_sync_schedule_time'      => array(
				'title'    => '',
				'type'     => 'select',
				'desc_tip' => false,
				'options'  => array(
					'hours' => __( 'Hour(s)', 'faire-for-woocommerce' ),
					'daily' => __( 'Day(s)', 'faire-for-woocommerce' ),
				),
				'class'    => 'wc-enhanced-select',
				'default'  => 'hours',
			),
			'order_sync_manual'             => array(
				'title'       => __( 'Manual Sync', 'faire-for-woocommerce' ),
				'label'       => __( 'Sync orders now', 'faire-for-woocommerce' ),
				'type'        => 'button',
				'class'       => 'button-secondary',
				'description' => __( 'Triggers orders and inventory sync.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'order_sync_skip_orders_create' => array(
				'title'       => __( 'Skip Order Creation', 'faire-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Yes', 'faire-for-woocommerce' ),
				'default'     => 'no',
				'desc_tip'    => true,
				'description' => __( 'Check this control to avoid orders creation. Inventory will be still updated.', 'faire-for-woocommerce' ),
			),
			'inventory_sync_on_add_to_cart' => array(
				'title'       => __( 'Sync on Add To Cart', 'faire-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Yes', 'faire-for-woocommerce' ),
				'default'     => 'no',
				'description' => __( 'Check this option to sync inventory when products are added to the cart.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'order_sync_results'            => array(
				'title'             => __( 'Last Sync Results', 'faire-for-woocommerce' ),
				'type'              => 'textarea',
				'description'       => __( 'Shows the result of the last orders sync.', 'faire-for-woocommerce' ),
				'class'             => 'disabled',
				'css'               => 'min-height:200px;min-width:min(400px,80%);width:min(400px,100%);resize:both;overflow-y:auto;',
				'custom_attributes' => array(
					'readonly' => 'readonly',
				),
			),
			// Faire product taxonomy.
			'product_taxonomy_title'        => array(
				'title'       => __( 'Product type', 'faire-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Faire Product type related settings and actions.', 'faire-for-woocommerce' ),
			),
			'product_taxonomy_sync_manual'  => array(
				'title'       => __( 'Manual Sync', 'faire-for-woocommerce' ),
				'label'       => __( 'Sync product type now', 'faire-for-woocommerce' ),
				'type'        => 'button',
				'description' => __( 'Triggers product taxonomy sync.', 'faire-for-woocommerce' ),
				'desc_tip'    => true,
			),
			
		);
	}

	/**
	 * Get the form fields after they are initialized
	 */
	public function maybe_disable_fields() {

		// Conditionally hide initial setup if already run.
		if ( $this->get_option( 'initial_setup_date' ) ) {
			unset( $this->form_fields['initial_setup'] );
		}

		// Conditionally disable sync buttons.
		$disable_sync_fields = array(
			'product_sync_manual',
			'order_sync_manual',
			'product_sync_mode',
			'order_sync_mode',
			'product_linking_sync_manual'
		);
		if ( $this->is_sync_enabled() === false ) {
			foreach ( $disable_sync_fields as $field_key ) {
				if ( ! isset( $this->form_fields[ $field_key ] ) ) {
					continue;
				}
				$this->form_fields[ $field_key ]['class']             = isset( $this->form_fields[ $field_key ]['class'] )
					? $this->form_fields[ $field_key ]['class']
					: ''
					. ' disabled';
				$this->form_fields[ $field_key ]['custom_attributes'] = array( 'disabled' => 'disabled' );
			}
		}
		$inventory_sync_settings = array(
			'inventory_sync_on_add_to_cart',
			'inventory_sync_on_change',
		);
		if ( 'yes' !== get_option( 'woocommerce_manage_stock' ) ) {
			foreach ( $inventory_sync_settings as $field_key ) {
				if ( ! isset( $this->form_fields[ $field_key ] ) ) {
					continue;
				}
				$this->form_fields[ $field_key ]['class']             = isset( $this->form_fields[ $field_key ]['class'] )
					? $this->form_fields[ $field_key ]['class']
					: ''
					. ' disabled';
				$this->form_fields[ $field_key ]['custom_attributes'] = array( 'disabled' => 'disabled' );
			}
		}
		// Conditionally disable download csv buttons
		$disable_download_fields = array(
			'product_linking_create_variations_csv',
			'product_linking_create_products_csv'
		);
		foreach ( $disable_download_fields as $field_key ) {
			if ( !isset($this->form_fields[ $field_key ]) ) continue;
			$option_key = 'faire_' . $field_key; // Lookup global shop setting, not faire plugin setting
			if ( ! get_option( $option_key ) ) { 
				$this->form_fields[ $field_key ]['class'] = isset( $this->form_fields[ $field_key ]['class'] )
					? $this->form_fields[ $field_key ]['class']
					: ''
					. ' disabled';
				$this->form_fields[ $field_key ]['custom_attributes'] = array( 'disabled' => 'disabled' );
			}
		}
		// Conditionally add product linking before sync warning flag 
		$warning_sync_fields = array(
			'product_sync_manual',
			'product_sync_mode'
		);
		if ( $this->get_option( 'initial_setup_products_exist', false ) ) {
			foreach ( $warning_sync_fields as $field_key ) {
				if ( ! isset( $this->form_fields[ $field_key ] ) ) {
					continue;
				}
				$custom_attributes = isset($this->form_fields[ $field_key ]['custom_attributes']) ? $this->form_fields[ $field_key ]['custom_attributes'] : array();
				$this->form_fields[ $field_key ]['custom_attributes'] = array_merge($custom_attributes, array( 'data-faire-linking-warning' => 'true' ));
			}
		}
    // Conditionally disable "Skip Order Creation"
    if ( TRUE === $this->plugin_settings->get_suppress_currency_matching() ) {
      $this->form_fields[ 'order_sync_skip_orders_create' ]['class'] = isset( $this->form_fields[ 'order_sync_skip_orders_create' ]['class'] )
					? $this->form_fields[ 'order_sync_skip_orders_create' ]['class']
					: ''
					. ' disabled';
				$this->form_fields[ 'order_sync_skip_orders_create' ]['custom_attributes'] = array( 'disabled' => 'disabled', 'checked' => 'checked' );
    }
	}

	/**
	 * Generate Radio Button HTML.
	 *
	 * @param string $key  Field key.
	 * @param array  $data Field setup data.
	 */
	public function generate_radio_html( string $key, array $data ) {
		$field    = $this->plugin_id . $this->id . '_' . $key;
		$defaults = array(
			'class'             => esc_attr( $field ),
			'css'               => '',
			'custom_attributes' => array(),
			'desc_tip'          => false,
			'description'       => '',
			'title'             => '',
			'options'           => '',
		);
		$data     = wp_parse_args( $data, $defaults );
		ob_start();
		?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
					<?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
				</th>
				<td class="forminp forminp-radio">
					<fieldset>
						<ul>
							<?php
							foreach ( $data['options'] as $value => $label ) :
								$checked = checked(
									$this->plugin_settings->get_product_pricing_policy(),
									$value,
									false
								);
								?>
							<li>
								<label>
									<input
										type="radio"
										name="<?php echo esc_attr( $field ); ?>"
										value="<?php echo esc_attr( $value ); ?>"
										style="<?php echo esc_attr( $data['css'] ); ?>"
										class="<?php echo esc_attr( $data['class'] ); ?>"
										<?php echo esc_attr( $this->get_custom_attribute_html( $data ) ); ?>
										<?php echo esc_attr( $checked ); ?>
									>
									<?php echo wp_kses_post( $label ); ?>
								</label>
							</li>
							<?php endforeach; ?>
						</ul>
					<?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
					</fieldset>
				</td>
			</tr>
		<?php
		return ob_get_clean();
	}

	/**
	 * Generate Hidden input HTML.
	 *
	 * @param string $key  Field key.
	 * @param array  $data Field setup data.
	 */
	public function generate_hidden_html( string $key, array $data ) {
		$field    = $this->plugin_id . $this->id . '_' . $key;
		$defaults = array(
			'class'             => esc_attr( $field ),
			'css'               => '',
			'custom_attributes' => array(),
			'desc_tip'          => false,
			'description'       => '',
			'title'             => '',
			'value'           => '',
		);
		$data     = wp_parse_args( $data, $defaults );

		ob_start();
		?>
			<tr valign="top">
				<td colspan="2" class="forminp forminp-hidden">
					<input
						type="hidden"
						id="<?php echo esc_attr( $field ); ?>"
						name="<?php echo esc_attr( $field ); ?>"
						value="<?php echo esc_attr( $this->get_option( $key ) ); ?>"
						style="<?php echo esc_attr( $data['css'] ); ?>"
						class="<?php echo esc_attr( $data['class'] ); ?>"
					>
				</td>
			</tr>
		<?php
		return ob_get_clean();
	}

	/**
	 * Generate Button HTML.
	 */
	public function generate_button_html( $key, $data ) {
		$field    = $this->plugin_id . $this->id . '_' . $key;
		$defaults = array(
			'class'             => 'button-secondary',
			'css'               => '',
			'custom_attributes' => array(),
			'desc_tip'          => false,
			'description'       => '',
			'title'             => '',
			'label'             => '',
		);

		$data = wp_parse_args( $data, $defaults );

		ob_start();
		?>
	<tr valign="top">
		<th scope="row" class="titledesc">
			<label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
			<?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
		</th>
		<td class="forminp">
			<fieldset>
				<legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
				<button
					class="<?php echo esc_attr( $data['class'] ); ?>"
					type="button" name="<?php echo esc_attr( $field ); ?>"
					id="<?php echo esc_attr( $field ); ?>"
					style="<?php echo esc_attr( $data['css'] ); ?>"
					<?php echo esc_attr( $this->get_custom_attribute_html( $data ) ); ?>
				>
					<?php echo wp_kses_post( $data['label'] ); ?>
				</button>
				<?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
			</fieldset>
		</td>
	</tr>
		<?php
		return ob_get_clean();
	}


	/**
	 * Santize our settings
	 *
	 * @see process_admin_options()
	 */
	public function sanitize_settings( $settings ) {

		// We're just going to make the api key all upper case characters since that's how our imaginary API works.
		if ( isset( $settings['api_key'] ) ) {
			$settings['api_key'] = strtoupper( $settings['api_key'] );
		}

		$stock_management_enabled = get_option( 'woocommerce_manage_stock' ) === 'yes';
		if ( isset( $settings['inventory_sync_on_add_to_cart'] ) ) {
			$settings['inventory_sync_on_add_to_cart'] = $stock_management_enabled
				? $settings['inventory_sync_on_add_to_cart']
				: 'no';
		}

		return $settings;
	}

	/**
	 * Ensures inventory sync is disabled if WooCommerce stock management is.
	 *
	 * If WooCommerce general setting to enable stock management is disabled,
	 * inventory sync related settings should be off.
	 *
	 * @param mixed $value
	 *   The WooCommerce settings field value.
	 *
	 * @param array $option
	 *   The WooCommerce settings field data.
	 *
	 * @return mixed
	 *   The WooCommerce settings field value, unchanged.
	 */
	public function manage_inventory_sync_settings( $value, array $option ) {
		if ( 'woocommerce_manage_stock' === $option['id'] && 'yes' !== $value ) {
			$this->update_option( 'inventory_sync_on_add_to_cart', 'no' );
			$this->update_option( 'inventory_sync_on_change', 'no' );
		}
		return $value;
	}

	/**
	 * Process our settings with exclusions
	 *
	 * @see parent::process_admin_options()
	 */
	public function process_admin_options() {

		parent::process_admin_options();

		$this->maybe_run_initial_setup_sync();

		self::display_errors();
	}


	/**
	 * Validate the API key
	 *
	 * @see validate_settings_fields()
	 */
	 /*
	public function validate_api_key_field( $key ) {
		// get the posted value
		$value = $_POST[ $this->plugin_id . $this->id . '_' . $key ];

		// check if the API key is longer than 20 characters. Our imaginary API doesn't create keys that large so something must be wrong. Throw an error which will prevent the user from saving.
		if ( isset( $value ) &&
			20 < strlen( $value ) ) {
			$this->errors[] = $key;
		}
		return $value;
	}
	*/


	/**
	 * Display errors by overriding the display_errors() method
	 *
	 * @see display_errors()
	 */
	/*
	public function display_errors() {

		// loop through each error and display it
		foreach ( $this->errors as $key => $value ) {
			?>
		<div class="error">
			<p><?php _e( 'Looks like you made a mistake with the ' . $value . ' field. Make sure it isn&apos;t longer than 20 characters', 'faire-for-woocommerce' ); ?></p>
		</div>
			<?php
		}
	}
	*/

	public function maybe_run_initial_setup_sync() {

		if ( ! empty( $this->get_option( 'api_key' ) )
			&& isset( $_POST[ 'woocommerce_' . $this->id . '_initial_setup_trigger' ] ) ) {

			// Send a test request to the API.
			$api = new Faire_Api();
			try {
				$api->test_connection();
			} catch ( Exception $e ) {
				$this->add_error(
					sprintf(
						'%s %s',
						__( 'API Connection failed. Please check your API key and API mode.', 'faire-for-woocommerce' ),
						$e->getMessage(),
					)
				);
				return;
			}

			// If API test passed, then perform initial sync.
			$sync_brand   = new Sync_Brand( new Faire_Api(), new Settings() );
			$brand_result = $sync_brand->import_brand();

			$sync_taxonomy = new Sync_Taxonomy( new Product_Api(), new Settings() );
			$tax_result    = $sync_taxonomy->import_taxonomy_types();

			if ( 'error' === $brand_result['status'] ) {
				$this->add_error( $brand_result['info'] );
			} else {
				// Set for this instance.
				if ( isset( $brand_result['brand']['locale'] ) ) {
					$this->settings['brand_locale'] = $brand_result['brand']['locale'];
				}
				if ( isset( $brand_result['brand']['currency'] ) ) {
					$this->settings['brand_currency'] = $brand_result['brand']['currency'];
				}
			}
			if ( 'error' === $tax_result['status'] ) {
				$this->add_error( $tax_result['info'] );
			}
			if ( 'success' === $brand_result['status'] && 'success' === $tax_result['status'] ) {
				$update_date = gmdate( 'c' );
				$this->update_option( 'initial_setup_date', $update_date );
				$this->settings['initial_setup_date'] = $update_date;
			}

			// Check for existing products 
			$product_linking = new Sync_Product_Linking( new Product_Api(), new Settings() );
			$product_check = $product_linking->check_if_faire_products_exist();

			if ( 'error' === $product_check['status'] ) {
				$this->add_error( $product_check['info'] );
			} else {
				if ( isset( $product_check['products_exist'] ) ) {
					$exist = (bool)$product_check['products_exist'];
					$this->update_option( 'initial_setup_products_exist', $exist );
					$this->settings['initial_setup_products_exist'] = $exist;

					$this->add_error( __( 'Existing products were found at Faire. Run product linking to link faire products with WooCommerce before running product sync.', 'faire-for-woocommerce' ), );
				}
			}

			// Re-initialize fields to reflect our updated brand locale and currency.
			$this->init_form_fields();
			$this->init_settings();
		}
	}

	/**
	 * Determine if sync should be enabled
	 *
	 * @return boolean
	 */
	public function is_sync_enabled(): bool {

		// Add error if locale and curreny do not match.
		if ( $this->get_option( 'brand_locale' ) && $this->get_option( 'brand_currency' ) ) {
			if ( $this->plugin_settings->get_sync_enabled() === false ) {
				if ( $this->get_option( 'api_key' ) ) {
					$this->add_error(
						sprintf(
							'%s',
							__( 'Faire product and order sync disabled because locale and currency do not match WooCommerce.', 'faire-for-woocommerce' ),
						)
					);
				}
			} else {
				return true;
			}
		}

		return false;
	}

	/**
	 * Handles AJAX call to test API connection.
	 */
	public function ajax_test_api_connection() {
		// Check for nonce security.
		$nonce = isset( $_POST['nonce'] ) ?
			sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) :
			'';

		if (
			empty( $nonce ) ||
			! wp_verify_nonce( $nonce, 'faire_test_api_connection' )
		) {
			wp_send_json_error(
				__( 'Testing failed. Unauthorized request.', 'faire-for-woocommerce' ),
				401
			);
		}

		// Send a test request to the API.
		$api = new Faire_Api();
		try {
			$api->test_connection();
			// Connection works.
			wp_send_json_success(
				__( 'API connection is working OK.', 'faire-for-woocommerce' ),
				200
			);
		} catch ( Exception $e ) {
			wp_send_json_error(
				sprintf(
					'%s %s',
					__( 'Connection test failed.', 'faire-for-woocommerce' ),
					$e->getMessage(),
				),
				401
			);
		}
	}

	/**
	 * Retrieves all defined images sizes with their dimensions.
	 *
	 * @param int $min_width  Minimum width for the collected image sizes.
	 * @param int $min_height Minimum height for the collected image sizes.
	 *
	 * @return array List of image sizes.
	 */
	private function get_images_sizes_info( int $min_width = 0, int $min_height = 0 ): array {
		$sizes                     = array();
		$registered_image_subsizes = wp_get_registered_image_subsizes();
		$image_is_big_enough       =
			function( $width, $height ) use ( $min_width, $min_height ) {
				return $width >= $min_width && $height >= $min_height;
			};

		foreach ( $registered_image_subsizes as $key => $image_size ) {
			if (
				$image_is_big_enough( $image_size['width'], $image_size['height'] )
			) {
				$sizes[ $key ] = $image_size;
			}
		}

		return $sizes;
	}

	/**
	 * Builds options for the image size dropdown setting.
	 *
	 * @param array $images_sizes Available image sizes.
	 *
	 * @return array List of options.
	 */
	private function get_images_sizes_options( array $images_sizes ): array {
		$options = array();
		foreach ( $images_sizes as $name => $dimensions ) {
			$options[ $name ] = $name;
		}
		$options['original'] = __( 'Original', 'faire-for-woocommerce' );
		return $options;
	}

}
