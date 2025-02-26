<?php
	/*
	* Plugin Name:       ANKA Commerce
	* Description:       Accept payments through ANKA Pay using Credit Cards, Mobile Money, Nigerian Bank Transfer, and PayPal on your WooCommerce store or Payment buttons.
	* Version:           1.1.2
	* Text Domain:       anka-commerce
	* Domain Path:       /languages
	* License:           GPL-3.0+
	*/

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	define( 'ANKA_COMMERCE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	define( 'ANKA_COMMERCE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	define( 'ANKA_COMMERCE_VERSION', '1.1.2' );
	define( 'ANKA_COMMERCE_DB_VERSION', '1.1.0' );

	require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/migration/anka-commerce-migrations.php';
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	/**
	 * ANKA Commerce plugin bootstrapping.
	 */
	class Anka_Commerce_Anka_Pay {
		/**
		 * Plugin initialization.
		 */
		public static function init() {
			// Load WooCommerce-related features if WooCommerce is active.
			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/woocommerce/class-anka-commerce-woocommerce.php';
				self::initialize_woocommerce_features();
			}

			// Load Payment Button features.
			require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/payment-button/class-anka-commerce-payment-button.php';
			self::initialize_payment_button_features();

			// Load the plugin textdomain.
			add_action( 'plugins_loaded', array( __CLASS__, 'anka_commerce_load_plugin_textdomain' ) );

			// Update plugin version in the database.
			add_action( 'plugins_loaded', array( __CLASS__, 'anka_commerce_update_database' ) );

			// Register the uninstall hook to run rollback_all_migrations when the plugin is uninstalled.
			register_uninstall_hook(__FILE__, array('Anka_Commerce_Anka_Pay', 'uninstall'));
		}

		/**
		 * Initialize Payment Button features.
		 */
		public static function initialize_payment_button_features() {
			// Include Payment Button-related files.
			add_action('plugins_loaded', array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_includes'));

			// Admin menu for managing payment buttons.
			add_action('admin_menu', array('Anka_Commerce_Payment_Button_Admin_Setting', 'anka_commerce_payment_button_admin_menu'));

			// Shortcode for displaying payment buttons.
			add_shortcode('anka_pay_button', array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_render_shortcode'));

			// Enqueue scripts and styles.
			add_action( 'wp_enqueue_scripts', array( 'Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_enqueue_scripts' ) );

			// Register the activation hook to create the success page when the plugin is activated.
			register_activation_hook(__FILE__, array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_create_success_page'));

			// Register Anka Pay payment button block for Gutenberg.
			add_action('init', array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_guttenberg_register_block'));

			// Register REST API route for payment button list.
			add_action('rest_api_init', array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_register_rest_api_route'));

			// Add settings link on plugin page for Payment Button.
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_settings_link'));
		}

		/**
		 * Initialize WooCommerce features.
		 */
		public static function initialize_woocommerce_features() {
			// Include WooCommerce-related files.
			add_action( 'plugins_loaded', array( 'Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_includes' ), 0 );

			// Enqueue scripts and styles.
			add_action( 'wp_enqueue_scripts', array( 'Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_enqueue_scripts' ) );

			// Add the ANKA Pay gateway to WooCommerce.
			add_filter( 'woocommerce_payment_gateways', array( 'Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_add_gateway' ) );

			// Registers WooCommerce Blocks integration.
			add_action( 'woocommerce_blocks_loaded', array( 'Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_gateway_block_support' ) );

			// Declare compatibility with WooCommerce Blocks.
			add_action( 'before_woocommerce_init', array( 'Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_cart_checkout_blocks_compatibility' ) );

			// Handle direct checkout redirection.
			add_action('template_redirect', array('Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_direct_checkout_redirection'));

			// Register REST API route to get payment method icon url
			add_action('rest_api_init', array('Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_register_rest_api_route'));

			// Add settings link on plugin page for WooCommerce.
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), array('Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_settings_link'));
		}

		/**
     * Run plugin activation logic.
     */
    public static function activate() {
			require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/migration/anka-commerce-migrations.php';
			run_all_migrations();
		}

    /**
     * Run plugin uninstallation logic.
     */
    public static function uninstall() {
			require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/migration/anka-commerce-migrations.php';
			rollback_all_migrations();
		}

		/**
		 * Load plugin textdomain.
		 */
		public static function anka_commerce_load_plugin_textdomain() {
			load_plugin_textdomain( 'anka-commerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		/**
		 * Update plugin version in the database.
		 */
		public static function anka_commerce_update_database() {
			$installed_db_version = get_option('anka_commerce_db_version');

			if ($installed_db_version !== ANKA_COMMERCE_DB_VERSION) {
				self::activate();
				Anka_Commerce_Payment_Button::anka_commerce_payment_button_create_success_page();

				update_option('anka_commerce_db_version', ANKA_COMMERCE_DB_VERSION);
			}
		}
	}

	Anka_Commerce_Anka_Pay::init();

?>
