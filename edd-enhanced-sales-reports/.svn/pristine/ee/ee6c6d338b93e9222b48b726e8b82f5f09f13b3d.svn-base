<?php
/**
 * Plugin Name:       EDD Enhanced Sales Reports
 * Plugin URI:        https://www.pluginsandsnippets.com/documentation/edd-enhanced-sales-report-plugin-documentation/
 * Description:       The EDD Enhanced Sales Reports Plugin (an add-on for Easy Digital Downloads plugin) offers an easy solution to better understand sales and profits of your EDD webshop. This eCommerce Reporting Plugin provides Enhanced Sales Reports to better analyse your sales and profits by countries/states, product, vendor, customer in a user friendly report. It is compatible with FES Frontend Submissions and EDD Commissions plugin. It can be of great help in performing data analytics and improving your store statistics by analysing purchases and revenue data.
 * Version:           1.1.12
 * Author:            Plugins & Snippets
 * Author URI:        https://www.pluginsandsnippets.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       edd-enhanced-sales-reports
 * Requires at least: 3.9
 * Tested up to:      6.5
 *
 * @package           EDD_Enhanced_Sales_Reports
 * @author            PluginsandSnippets.com
 * @copyright         All rights reserved Copyright (c) 2023, PluginsandSnippets.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EDD_Enhanced_Sales_Reports' ) ) {

	/**
	 * Main EDD_Enhanced_Sales_Reports class
	 *
	 * @since       1.0.0
	 */
	class EDD_Enhanced_Sales_Reports {

		/**
		 * The EDD_Enhanced_Sales_Reports instance
		 *
		 * @var         EDD_Enhanced_Sales_Reports $instance
		 * @since       1.0.0
		 */
		private static $instance;

		/**
		 * The EDD_Enhanced_Sales_Reports_Admin instance
		 *
		 * @var         EDD_Enhanced_Sales_Reports_Admin $admin_instance
		 * @since       1.0.0
		 */
		private static $admin_instance;

		/**
		 * Holds Message for Printing in Admin Notices
		 *
		 * @var         string $dependencies_message
		 * @since       1.0.0
		 */
		private static $dependencies_message;

		/**
		 * Constructor, currently does nothing.
		 */
		public function __construct() {

		}


		/**
		 * Get active instance
		 *
		 * @access      public
		 * @return      object self::$instance The one true EDD_Enhanced_Sales_Reports
		 * @since       1.0.0
		 */
		public static function instance() {

			if ( ! self::$instance ) {
				self::$instance = new EDD_Enhanced_Sales_Reports();
				self::$instance->setup_constants();

				if ( ! self::$instance->check_dependencies() ) {
					return self::$instance; // Dependencies Not Found.
				}

				self::$instance->includes();
				self::$instance->load_database();
				self::$instance->load_textdomain();

				self::$instance->hooks();

				// load admin.
				self::$admin_instance = new EDD_Enhanced_Sales_Reports_Admin();
			}

			return self::$instance;
		}

		/**
		 * Checks for any plugin dependencies, return true/false based on the checks
		 *
		 * @access      public
		 * @return      bool
		 * @since       1.0.0
		 */
		public function check_dependencies() {

			$url              = esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=easy-digital-downloads' ), 'install-plugin_easy-digital-downloads' ) );
			$edd_install_link = '<a href="' . $url . '">' . esc_html__( 'install it', 'edd-enhanced-sales-reports' ) . '</a>';

			$classes_to_check = array(
				// add a key-value pair similar to $classes_to_check if needed.
			);

			$functions_to_check = array(
				/* translators: %s Installation link */
				'edd_is_cart_empty' => EDD_ENHANCED_SALES_REPORTS_NAME . sprintf( esc_html__( ' requires Easy Digital Downloads version 3.0! Please %s to continue!', 'edd-enhanced-sales-reports' ), $edd_install_link ),
			);

			$dependencies_found = true;
			$message            = '';

			foreach ( $classes_to_check as $class_to_check => $class_message ) {
				if ( ! class_exists( $class_to_check ) ) {
					$message           .= '<p>' . $class_message . '</p>';
					$dependencies_found = false;
				}
			}

			foreach ( $functions_to_check as $function_name => $function_message ) {
				if ( ! function_exists( $function_name ) ) {
					$message           .= '<p>' . $function_message . '</p>';
					$dependencies_found = false;
				}
			}

			if ( ! $dependencies_found ) {

				self::$dependencies_message = $message;

				add_action( 'admin_notices', array( $this, 'print_dependency_message' ) );

				return false;
			}

			return true;

		}

		/**
		 * Prints the Dependencies message in admin notices
		 *
		 * @access      public
		 * @since       1.0.0
		 */
		public function print_dependency_message() {
			echo '<div class="notice notice-error">';
			echo wp_kses( self::$dependencies_message, array( 'a', 'br', 'strong', 'b', 'p', 'div' ) );
			echo '</div>';
		}

		/**
		 * Setup plugin constants
		 *
		 * @access      private
		 * @return      void
		 * @since       1.0.0
		 */
		private function setup_constants() {

			// Plugin related constants.
			define( 'EDD_ENHANCED_SALES_REPORTS_VER', '1.1.12' );
			define( 'EDD_ENHANCED_SALES_REPORTS_NAME', 'EDD Enhanced Sales Reports' );
			define( 'EDD_ENHANCED_SALES_REPORTS_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
			define( 'EDD_ENHANCED_SALES_REPORTS_URL', plugin_dir_url( __FILE__ ) );

			// Helper Constants.
			define( 'EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE', false );
			define( 'EDD_ENHANCED_SALES_REPORTS_SUBSCRIPTIONS_ACTIVE', false );
			define( 'EDD_ENHANCED_SALES_REPORTS_CACHE', trailingslashit( WP_CONTENT_DIR ) . 'edd-esr/' );

			// Action links constants.
			define( 'EDD_ENHANCED_SALES_REPORTS_DOCUMENTATION_URL', 'https://www.pluginsandsnippets.com/documentation/edd-enhanced-sales-report-plugin-documentation/' );
			define( 'EDD_ENHANCED_SALES_REPORTS_OPEN_TICKET_URL', 'https://www.pluginsandsnippets.com/open-ticket/' );
			define( 'EDD_ENHANCED_SALES_REPORTS_SUPPORT_URL', 'https://www.pluginsandsnippets.com/support/' );
			define( 'EDD_ENHANCED_SALES_REPORTS_REVIEW_URL', 'https://wordpress.org/plugins/edd-enhanced-sales-reports/#reviews' );

			// Licensing related constants.
			define( 'EDD_ENHANCED_SALES_REPORTS_API_URL', 'https://www.pluginsandsnippets.com/' );
			define( 'EDD_ENHANCED_SALES_REPORTS_PURCHASES_URL', 'https://www.pluginsandsnippets.com/purchases/' );
			define( 'EDD_ENHANCED_SALES_REPORTS_STORE_PRODUCT_ID', 00 );
			define( 'EDD_ENHANCED_SALES_REPORTS_LIC_KEY', 'edd_enhanced_sales_reports_license_key' );
			define( 'EDD_ENHANCED_SALES_REPORTS_LIC_KEY_SLUG', 'edd-enhanced-sales-reports' );

			// Helper for min non-min script styles.
			define( 'EDD_ENHANCED_SALES_REPORTS_LOAD_NON_MIN_SCRIPTS', true );

			// Endpoint for Receiving Subscription Requests.
			define( 'EDD_ENHANCED_SALES_REPORTS_SUBSCRIBE_URL', 'https://www.pluginsandsnippets.com/?ps-subscription-request=1' );
		}

		/**
		 * Load necessary files
		 *
		 * @access      private
		 * @return      void
		 * @since       1.0.0
		 */
		private function load_database() {
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/database/database.php';

			edd_enhanced_sales_reports_create_tables();
		}

		/**
		 * Returns the admin class instance
		 *
		 * @access      public
		 * @return      EDD_Enhanced_Sales_Reports_Admin
		 * @since       1.0.0
		 */
		public static function get_admin_instance() {
			return self::$admin_instance;
		}

		/**
		 * Include necessary files
		 *
		 * @access      private
		 * @return      void
		 * @since       1.0.0
		 */
		private function includes() {
			// Include Files.
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/class-edd-enhanced-sales-reports-filtering.php';
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/class-edd-enhanced-sales-reports-admin.php';
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/database/class-edd-enhanced-sales-reports-migration.php';
		}

		/**
		 * Run action and filter hooks
		 *
		 * @access      private
		 * @return      void
		 *
		 * @since       1.0.0
		 */
		private function hooks() {

			add_action( 'edd_payment_saved', array( $this, 'update_lookup_table_upon_payment_save' ), 10, 2 );

			if ( ! $this->data_migration_run() ) {
				update_option( 'edd_enhanced_sales_reports_migrated', 1, false );
				edd_enhanced_sales_reports_activation();
			}
		}

		/**
		 * Internationalization
		 *
		 * @access      public
		 * @return      void
		 * @since       1.0.0
		 */
		public function load_textdomain() {
			// Set filter for language directory.
			$lang_dir = EDD_ENHANCED_SALES_REPORTS_DIR . '/languages/';
			$lang_dir = apply_filters( 'edd_enhanced_sales_reports_languages_directory', $lang_dir );

			// Traditional WordPress plugin locale filter.
			$locale = apply_filters( 'plugin_locale', get_locale(), 'edd-enhanced-sales-reports' );
			$mofile = sprintf( '%1$s-%2$s.mo', 'edd-enhanced-sales-reports', $locale );

			// Setup paths to current locale file.
			$mofile_local  = $lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/edd-enhanced-sales-reports/' . $mofile;

			if ( file_exists( $mofile_global ) ) {
				// Look in global /wp-content/languages/edd-enhanced-sales-reports/ folder.
				load_textdomain( 'edd-enhanced-sales-reports', $mofile_global );
			} elseif ( file_exists( $mofile_local ) ) {
				// Look in local /wp-content/plugins/edd-enhanced-sales-reports/languages/ folder.
				load_textdomain( 'edd-enhanced-sales-reports', $mofile_local );
			} else {
				// Load the default language files.
				load_plugin_textdomain( 'edd-enhanced-sales-reports', false, $lang_dir );
			}
		}

		/**
		 * Update Payment Data for an order upon edd_payment_saved hook
		 *
		 * @access      public
		 *
		 * @param int         $payment_id The ID of Payment to update.
		 * @param EDD_Payment $edd_payment The instance of edd_payment.
		 *
		 * @return      void
		 * @since       1.0.0
		 */
		public function update_lookup_table_upon_payment_save( $payment_id, $edd_payment ) {
			global $wpdb;

			$lookup_table = $wpdb->prefix . 'enhanced_sales_report';

			$payment_id = intval( $payment_id );
			$wpdb->query( $wpdb->prepare( "DELETE FROM `" . $lookup_table . "` WHERE order_id=%d", $payment_id ) ); // phpcs:ignore

			$migrator = new EDD_Enhanced_Sales_Reports_Migration();
			$migrator->migrate_edd_orders_to_lookup( array( $payment_id ) );
		}

		/**
		 * Returns true or false depending upon whether the initial migration has run or not.
		 *
		 * @access      public
		 *
		 * @return      bool
		 * @since       1.0.0
		 */
		public function data_migration_run() {
			return '1' === get_option( 'edd_enhanced_sales_reports_migrated' );
		}

	}
}

/**
 * The main function responsible for returning the one true EDD_Enhanced_Sales_Reports
 * instance to functions everywhere
 *
 * @return      \EDD_Enhanced_Sales_Reports The one true EDD_Enhanced_Sales_Reports
 *
 * @since       1.0.0
 * @todo        Inclusion of the activation code below isn't mandatory, but
 *              can prevent any number of errors, including fatal errors, in
 *              situations where your extension is activated but EDD is not
 *              present.
 */
function edd_enhanced_sales_reports_plugin_template_load() {
	return EDD_Enhanced_Sales_Reports::instance();
}
add_action( 'plugins_loaded', 'edd_enhanced_sales_reports_plugin_template_load' );


/**
 * The activation hook is called outside of the singleton because WordPress doesn't
 * register the call from within the class, since we are preferring the plugins_loaded
 * hook for compatibility, we also can't reference a function inside the plugin class
 * for the activation function. If you need an activation function, put it here.
 *
 * @return      void
 * @since       1.0.0
 */
function edd_enhanced_sales_reports_activation() {
	/* Activation functions here */
	wp_schedule_single_event( time() + 120, 'edd_enhanced_sales_reports_run_migration' );

	update_option( 'edd_enhanced_sales_reports_installed_at', time(), false );

	// Deactivate Pro Version if it is active.
	if ( class_exists( 'EDD_Enhanced_Sales_Reports_Pro' ) ) {
		deactivate_plugins( plugin_basename( EDD_ENHANCED_SALES_REPORTS_PRO_DIR . 'edd-enhanced-sales-reports-pro.php' ) );
	}
}
register_activation_hook( __FILE__, 'edd_enhanced_sales_reports_activation' );

/**
 * Loads Helper Functions.
 *
 * @since       1.0.0
 */
function edd_enhanced_sales_reports_load_functions() {
	require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/functions.php';
}
add_action( 'init', 'edd_enhanced_sales_reports_load_functions' );

/**
 * Executes the Initial Migration Script.
 *
 * @since       1.0.0
 */
function edd_enhanced_sales_reports_run_migration_execute() {
	$migrator = new EDD_Enhanced_Sales_Reports_Migration();
	$migrator->migrate_edd_orders_to_lookup();
	update_option( 'edd_enhanced_sales_reports_migrated', 1, false );
}
add_action( 'edd_enhanced_sales_reports_run_migration', 'edd_enhanced_sales_reports_run_migration_execute' );
