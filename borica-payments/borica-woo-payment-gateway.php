<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://borica.bg
 * @since             1.0.0
 * @package           Borica_Woo_Payment_Gateway
 *
 * @wordpress-plugin
 * Plugin Name:       BORICA Payments
 * Plugin URI:        https://3dsgate-dev.borica.bg/wordpressplugin
 * Description:       BORICA Payments works by redirecting customers to BORICA payment page where they enter their card details. To use this payment option you need to have a virtual POS.
 * Version:           2.0.1
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            BORICA AD
 * Developer URI:
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       borica
 * Domain Path:       /languages
 */

/**
 * Prevents direct access to the file.
 *
 * This conditional check ensures that the file is being accessed through WordPress.
 * If the `ABSPATH` constant is not defined, it means that the file is being accessed
 * directly, and the script will terminate by calling `exit()`. This is a security
 * measure to prevent unauthorized access to plugin or theme files.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Ensure the 'is_plugin_active_for_network' function is available.
 *
 * This check is necessary because the function 'is_plugin_active_for_network'
 * is not loaded by default in all contexts. By conditionally including
 * 'plugin.php' from the WordPress admin directory, we ensure that the
 * function is available when needed.
 *
 * @link https://developer.wordpress.org/reference/functions/is_plugin_active_for_network/
 */
if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
	require_once ABSPATH . '/wp-admin/includes/plugin.php';
}

/**
 * Checks if WooCommerce is active before executing Borica Payment Gateway code.
 *
 * This conditional block ensures that the Borica Payment Gateway plugin only runs if
 * WooCommerce is active. It checks whether WooCommerce is active in a network environment
 * or in a single site setup. If WooCommerce is not active, the Borica Payment Gateway
 * functionality will not be initialized.
 *
 * The following checks are performed:
 * - `is_plugin_active_for_network( 'woocommerce/woocommerce.php' )`: Checks if WooCommerce is active in a multisite network.
 * - `in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true )`: Checks if WooCommerce is active on a single site.
 *
 * If either of these conditions is true, the Borica Payment Gateway plugin's constants, hooks, and functions are initialized.
 */
if (
	( is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) ||
	in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true )
) {
	/**
	 * Borica Payment Gateway Constants
	 *
	 * This file defines constants used throughout the Borica Payment Gateway plugin.
	 * These constants include directory paths, URLs, transaction types, and configuration
	 * settings related to the Borica payment gateway integration.
	 *
	 * Constants:
	 * - `BORICA_PLUGIN_DIR`: Absolute path to the Borica plugin directory.
	 * - `BORICA_INCLUDES_DIR`: Absolute path to the includes directory within the plugin.
	 * - `BORICA_LOG_DIR`: Absolute path to the log directory within the plugin.
	 * - `BORICA_IMAGES_URI`: URL to the images directory for the Borica plugin.
	 * - `BORICA_CSS_URI`: URL to the CSS directory for the Borica plugin.
	 * - `BORICA_JS_URI`: URL to the JS directory for the Borica plugin.
	 * - `BORICA_TEST_URL`: URL for the Borica test environment.
	 * - `BORICA_PRODUCTION_URL`: URL for the Borica production environment.
	 * - `BORICA_MOD_VERSION`: Current version of the Borica module.
	 * - `BORICA_CHECK_PAYMENT_STATUS_TIME`: Time in hours to check the payment status.
	 * - `BORICA_DROP_PAYMENT_TIME`: Time in minutes to drop the payment if not completed.
	 * - `BORICA_TRTYPE_CHECK_STATUS`: Transaction type code for checking payment status.
	 * - `BORICA_TRTYPE_AUTHORIZATION`: Transaction type code for payment authorization.
	 * - `BORICA_TRTYPE_DROP_STATUS`: Transaction type code for dropping the payment status.
	 * - `BORICA_COUNTRY`: Default country code (BG for Bulgaria).
	 * - `BORICA_LANG`: Default language code (BG for Bulgarian).
	 * - `BORICA_ADDENDUM`: Additional data fields (AD,TD) to include in transactions.
	 */

	// Define Borica plugin directory path.
	define( 'BORICA_PLUGIN_DIR', untrailingslashit( __DIR__ ) );

	// Define includes directory path.
	define( 'BORICA_INCLUDES_DIR', BORICA_PLUGIN_DIR . '/includes' );

	// Define URL for Borica plugin images.
	define( 'BORICA_IMAGES_URI', WP_CONTENT_URL . '/plugins/borica-payments/images' );

	// Define URL for Borica plugin CSS files.
	define( 'BORICA_CSS_URI', WP_CONTENT_URL . '/plugins/borica-payments/css' );

	// Define URL for Borica plugin JS files.
	define( 'BORICA_JS_URI', WP_CONTENT_URL . '/plugins/borica-payments/js' );

	// Define Borica test environment URL.
	define( 'BORICA_TEST_URL', 'https://3dsgate-dev.borica.bg/cgi-bin/cgi_link' );

	// Define Borica production environment URL.
	define( 'BORICA_PRODUCTION_URL', 'https://3dsgate.borica.bg/cgi-bin/cgi_link' );

	// Define current version of the Borica module.
	define( 'BORICA_MOD_VERSION', '2.0.1' );

	// Define time in hours to check payment status.
	define( 'BORICA_CHECK_PAYMENT_STATUS_TIME', 24 );

	// Define time in minutes to drop payment if not completed.
	define( 'BORICA_DROP_PAYMENT_TIME', 720 );

	// Define transaction type code for checking payment status.
	define( 'BORICA_TRTYPE_CHECK_STATUS', 90 );

	// Define transaction type code for payment authorization.
	define( 'BORICA_TRTYPE_AUTHORIZATION', 1 );

	// Define transaction type code for dropping the payment status.
	define( 'BORICA_TRTYPE_DROP_STATUS', 24 );

	// Define default country code (BG for Bulgaria).
	define( 'BORICA_COUNTRY', 'BG' );

	// Define default language code (BG for Bulgarian).
	define( 'BORICA_LANG', 'BG' );

	// Define additional data fields (AD, TD) to include in transactions.
	define( 'BORICA_ADDENDUM', 'AD,TD' );

	/** Includes */
	require_once BORICA_INCLUDES_DIR . '/functions.php';
	require_once BORICA_INCLUDES_DIR . '/admin.php';

	/**
	 * Adds the HTTP Strict Transport Security (HSTS) header to enforce HTTPS connections.
	 *
	 * This function is hooked into the 'send_headers' action in WordPress, ensuring that
	 * the HSTS header is sent with every response. The HSTS header forces browsers to use
	 * HTTPS connections for future requests, helping to prevent protocol downgrade attacks.
	 *
	 * @hook send_headers
	 * 
	 * @return void
	 */
	add_action('send_headers', 'borica_add_hsts_header');

		/**
	 * Filter whether to auto-update specific plugins.
	 *
	 * This filter hook is applied to determine if a plugin should be auto-updated.
	 * The callback function borica_disable_auto_update_for_plugin() checks the plugin slug
	 * and disables auto-update for a specific plugin by returning false.
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_filter/
	 *
	 * @param bool   $update Whether the plugin should be auto-updated. Default true.
	 * @param object $item   An object containing plugin data, including slug, name, and more.
	 *
	 * @return bool False to prevent auto-update, true to allow auto-update.
	 */
	add_filter('auto_update_plugin', 'borica_disable_auto_update_for_plugin', 10, 2);

	/**
	 * Hooks the Borica text domain loading function into the 'init' action.
	 *
	 * This action hook triggers the `borica_load_textdomain` function during the WordPress initialization phase.
	 * The `borica_load_textdomain` function is responsible for loading the text domain for the Borica Payment Gateway
	 * plugin, which allows the plugin to be fully localized and translated into different languages.
	 *
	 * @see borica_load_textdomain()
	 */
	add_action( 'init', 'borica_load_textdomain' );

	/**
	 * Hooks the BORICA payment gateway implementation function into the 'wp_loaded' action.
	 *
	 * This action hook triggers the `borica_woo_payment_gateway_impl` function when WordPress has
	 * fully loaded, which is typically after all plugins have been loaded and the theme has been
	 * initialized. The `borica_woo_payment_gateway_impl` function processes payment responses
	 * from the BORICA gateway.
	 *
	 * @see borica_woo_payment_gateway_impl()
	 */
	add_action( 'wp_loaded', 'borica_woo_payment_gateway_impl' );

	/**
	 * Registers the activation hook to create necessary database tables for the BORICA payment gateway.
	 *
	 * This hook triggers the `borica_create_tables` function when the plugin is activated. The
	 * `borica_create_tables` function is responsible for creating the necessary database tables
	 * required by the BORICA payment gateway to store transaction data and other relevant
	 * information.
	 *
	 * @see borica_create_tables()
	 *
	 * @param string $file The main plugin file. The `__FILE__` constant is used to refer to the current plugin file.
	 */
	register_activation_hook( __FILE__, 'borica_create_tables' );

	/**
	 * Registers the deactivation hook to remove or clean up database tables for the BORICA payment gateway.
	 *
	 * This hook triggers the `borica_remove_tables` function when the plugin is deactivated. The
	 * `borica_remove_tables` function is responsible for removing or cleaning up the database tables
	 * and other resources that were created by the BORICA payment gateway plugin.
	 *
	 * @see borica_remove_tables()
	 *
	 * @param string $file The main plugin file. The `__FILE__` constant is used to refer to the current plugin file.
	 */
	register_deactivation_hook( __FILE__, 'borica_remove_tables' );

	/**
	 * Filters the allowed HTTP origins to include those necessary for the Borica Payment Gateway.
	 *
	 * This filter hook adds the `borica_add_allowed_origins` function to the `allowed_http_origins` filter,
	 * which allows the Borica Payment Gateway to specify additional HTTP origins that are permitted to
	 * interact with the WordPress site. This is particularly useful for ensuring that requests from Borica
	 * servers are recognized as legitimate and not blocked by CORS (Cross-Origin Resource Sharing) policies.
	 *
	 * @see borica_add_allowed_origins()
	 *
	 * @param array $origins An array of allowed HTTP origins.
	 * @return array Modified array of allowed HTTP origins including those necessary for Borica.
	 */
	add_filter( 'allowed_http_origins', 'borica_add_allowed_origins' );

	/**
	 * Enqueues custom scripts and styles for the Borica Payment Gateway on the frontend.
	 *
	 * This action hook binds the `borica_add_meta` function to the `wp_enqueue_scripts` action,
	 * which is responsible for enqueuing scripts and styles on the frontend of the WordPress site.
	 * The `borica_add_meta` function enqueues the necessary CSS and JavaScript files that are required
	 * for the Borica Payment Gateway's functionality and user interface.
	 *
	 * @see borica_add_meta()
	 */
	add_action( 'wp_enqueue_scripts', 'borica_add_meta' );

	/**
	 * Enqueues custom scripts and styles for the Borica Payment Gateway in the WordPress admin area.
	 *
	 * This action hook binds the `borica_add_meta_admin` function to the `admin_enqueue_scripts` action,
	 * which is responsible for enqueuing scripts and styles in the WordPress admin dashboard.
	 * The `borica_add_meta_admin` function enqueues the necessary CSS and JavaScript files required
	 * for the Borica Payment Gateway's functionality and interface within the WordPress admin area.
	 *
	 * @see borica_add_meta_admin()
	 */
	add_action( 'admin_enqueue_scripts', 'borica_add_meta_admin' );

	/**
	 * Enqueues custom scripts and styles for the Borica Payment Gateway in the WordPress admin area.
	 *
	 * This action hook binds the `borica_add_meta_admin` function to the `admin_enqueue_scripts` action,
	 * which is responsible for enqueuing scripts and styles in the WordPress admin dashboard.
	 * The `borica_add_meta_admin` function enqueues the necessary CSS and JavaScript files required
	 * for the Borica Payment Gateway's functionality and interface within the WordPress admin area.
	 *
	 * @see borica_add_meta_admin()
	 */
	add_action( 'admin_menu', 'borica_admin_actions' );

	/**
	 * Hook to add a "Settings" link to the plugin action links on the Plugins page.
	 *
	 * This filter hooks into the 'plugin_action_links_{plugin_file}' filter to append
	 * a "Settings" link for the Borica plugin. It uses the 'borica_add_settings_link'
	 * function to add the link to the action links for the plugin.
	 *
	 * @see borica_add_settings_link() The function that adds the "Settings" link.
	 */
	add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'borica_add_settings_link');

	/**
	 * Loads the Borica Payment Gateway plugin classes after all plugins are loaded.
	 *
	 * This action hook binds the `borica_load_class_plugin` function to the `plugins_loaded` action,
	 * which triggers after all active plugins have been loaded. By setting the priority to 0, this
	 * function ensures that the Borica Payment Gateway classes are loaded early in the plugin
	 * initialization process, but after all other plugins are available.
	 *
	 * The `borica_load_class_plugin` function is responsible for including and initializing the
	 * core classes required for the Borica Payment Gateway to function properly.
	 *
	 * @see borica_load_class_plugin()
	 */
	add_action( 'plugins_loaded', 'borica_load_class_plugin', 0 );

	/**
	 * Adds the Borica Payment Gateway to the list of available WooCommerce payment gateways.
	 *
	 * This filter hook binds the `borica_add_gateway` function to the `woocommerce_payment_gateways` filter,
	 * which is used to modify the list of payment gateways available in WooCommerce. The `borica_add_gateway`
	 * function adds the Borica Payment Gateway class to this list, making it selectable and usable as a
	 * payment option in the WooCommerce settings.
	 *
	 * @see borica_add_gateway()
	 *
	 * @param array $gateways An array of available WooCommerce payment gateway class names.
	 * @return array Modified array of available payment gateways including the Borica gateway.
	 */
	add_filter( 'woocommerce_payment_gateways', 'borica_add_gateway' );

	/**
	 * Hook to restore the WooCommerce cart when an order is canceled.
	 *
	 * This action hook attaches the `borica_restore_cart_on_order_cancel` function
	 * to the `woocommerce_order_status_cancelled` action. When an order is marked
	 * as "cancelled" in WooCommerce, this hook will trigger the function, which
	 * restores the items from the canceled order back into the user's cart.
	 *
	 * @hooked borica_restore_cart_on_order_cancel
	 *
	 * @param int $order_id The ID of the order that was canceled.
	 *
	 * @return void
	 */
	add_action( 'woocommerce_order_status_cancelled', 'borica_restore_cart_on_order_cancel', 10, 1 );

	/**
	 * Adds a custom meta box for Borica Payment Gateway to the WooCommerce order edit screen.
	 *
	 * This filter hook binds the `borica_add_meta_box` function to the `add_meta_boxes` filter,
	 * which allows the addition of custom meta boxes in the WordPress admin interface.
	 * The `borica_add_meta_box` function adds a meta box specific to the Borica Payment Gateway
	 * on the WooCommerce order edit screen, providing additional information or options
	 * related to Borica transactions.
	 *
	 * @see borica_add_meta_box()
	 *
	 * @param string $post_type The post type where meta boxes are being added.
	 * @return void
	 */
	add_filter( 'add_meta_boxes', 'borica_add_meta_box' );

	/**
	 * Declares compatibility with WooCommerce Cart and Checkout blocks.
	 *
	 * This function checks if the WooCommerce `FeaturesUtil` class exists. If it does, it uses the `declare_compatibility`
	 * method to declare compatibility with the 'cart_checkout_blocks' feature. This ensures that the plugin or theme
	 * using this function is compatible with the WooCommerce blocks introduced in newer versions of WooCommerce.
	 *
	 * @return void
	 */
	function borica_declare_cart_checkout_blocks_compatibility() {
		if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
		}
	}
	add_action('before_woocommerce_init', 'borica_declare_cart_checkout_blocks_compatibility');

	/**
	 * Registers a custom payment method type for WooCommerce Blocks.
	 *
	 * This function is hooked into the 'woocommerce_blocks_loaded' action and is responsible for registering
	 * the 'Borica' payment gateway with the WooCommerce Blocks Payment Method Registry.
	 *
	 * The function first checks if the necessary WooCommerce Blocks `AbstractPaymentMethodType` class exists.
	 * If it does, the function includes the required class file and then registers the custom payment method
	 * via the WooCommerce Blocks' PaymentMethodRegistry.
	 *
	 * The payment method registration is done within the 'woocommerce_blocks_payment_method_type_registration' action.
	 *
	 * @return void
	 */
	add_action( 'woocommerce_blocks_loaded', 'borica_register_order_approval_payment_method_type' );
	function borica_register_order_approval_payment_method_type() {
		if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
			return;
		}
		require_once plugin_dir_path(__FILE__) . 'class-borica-payment-gateway-blocks.php';
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new Borica_Payment_Gateway_Blocks );
			}
		);
	}

	/**
	 * Hooks the `borica_add_transaction_id_to_order` function to process the transaction ID for Borica payment gateway.
	 *
	 * This action is triggered after an order is processed during checkout. It executes the function
	 * `borica_add_transaction_id_to_order`, which sets the order ID as the transaction ID for orders
	 * using the "borica_woo_payment_gateway" payment method.
	 *
	 * @hook woocommerce_checkout_order_processed
	 * @param int $order_id The ID of the order being processed.
	 * @param array $data Optional. An array of checkout data submitted by the user.
	 *
	 * @return void
	 */
	add_action('woocommerce_checkout_order_processed', 'borica_add_transaction_id_to_order', 10, 2);

	/** Test bgn keys api */
	add_action( 'wp_ajax_borica_testkeysbgn', 'borica_testkeysbgn' );
	add_action( 'wp_ajax_nopriv_borica_testkeysbgn', 'borica_testkeysbgn' );

	/** Production bgn keys api */
	add_action( 'wp_ajax_borica_productionkeysbgn', 'borica_productionkeysbgn' );
	add_action( 'wp_ajax_nopriv_borica_productionkeysbgn', 'borica_productionkeysbgn' );

	/** Test eur keys api */
	add_action( 'wp_ajax_borica_testkeyseur', 'borica_testkeyseur' );
	add_action( 'wp_ajax_nopriv_borica_testkeyseur', 'borica_testkeyseur' );

	/** Production eur keys api */
	add_action( 'wp_ajax_borica_productionkeyseur', 'borica_productionkeyseur' );
	add_action( 'wp_ajax_nopriv_borica_productionkeyseur', 'borica_productionkeyseur' );

	/** Borica payment send api */
	add_action( 'wp_ajax_borica_send', 'borica_send' );
	add_action( 'wp_ajax_nopriv_borica_send', 'borica_send' );

	/** Get log information api */
	add_action( 'wp_ajax_borica_log', 'borica_log' );
	add_action( 'wp_ajax_nopriv_borica_log', 'borica_log' );

	/** Check payment api */
	add_action( 'wp_ajax_borica_check_payment', 'borica_check_payment' );
	add_action( 'wp_ajax_nopriv_borica_check_payment', 'borica_check_payment' );

	/** Drop payment api */
	add_action( 'wp_ajax_borica_drop_payment', 'borica_drop_payment' );
	add_action( 'wp_ajax_nopriv_borica_drop_payment', 'borica_drop_payment' );
}
