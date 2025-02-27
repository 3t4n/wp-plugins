<?php
/**
 * Handles the plugin activation and deactivation process and admin notices for Stock Sync with Google Sheet for WooCommerce.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since 1.2.2
 */
// Namespace.
namespace StockSyncWithGoogleSheetForWooCommerce;

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( ! class_exists('\StockSyncWithGoogleSheetForWooCommerce\Install') ) {

	/**
	 * Class Install.
	 * Handles the plugin activation and deactivation process and admin notices for Stock Sync with Google Sheet for WooCommerce.
	 *
	 * @package StockSyncWithGoogleSheetForWooCommerce
	 */
	class Install extends Base {

		/**
		 * Instance of the class.
		 *
		 * @var self
		 */
		public static $instance;

		/**
		 * Initialize the class.
		 *
		 * @return void
		 */
		public static function init() {
			if ( ! self::$instance ) {
				self::$instance = new self();
			}

			// self::$instance->shop_recovery();
			$active_table = get_option('ssgsw_table_active', false);
			if ( ! $active_table ) {
				self::$instance->create_a_table();
			}
			$add_new_columns = get_option('ssgsw_table_active_new_columns_new_uniq', false);
			if ( ! $add_new_columns ) {
				self::$instance->add_new_columns();
			}

			register_activation_hook(SSGSW_FILE, [ self::$instance, 'activate' ]);
			register_deactivation_hook(SSGSW_FILE, [ self::$instance, 'deactivate' ]);

			add_action('pre_current_active_plugins', [ self::$instance, 'admin_notices' ]);

			self::$instance->app->reset_options(false);
		}

		/**
		 * Activate the plugin.
		 *
		 * @return void
		 */
		public function activate() {

			$this->reset_auto_redirection();
			$this->initialize_authorization_token();
			$sheet_url = get_option( 'ssgsw_spreadsheet_url', '');
			if ( empty($sheet_url) ) {
				update_option( 'ssgsw_new_user_activated_key5', '1' );
			}
			if ( ! ssgsw_get_option( 'hide_upgrade_notice' ) ) {
				set_transient( 'ssgsw_hide_upgrade_notice', true, DAY_IN_SECONDS * 7 );
			}
		}



		/**
		 * Create SSGSW table for Sheet update table optimization
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function add_new_columns() {
			global $wpdb;
			$table_name = $wpdb->prefix . 'ssgsw_products';
			$existing_columns = $wpdb->get_results("SHOW COLUMNS FROM $table_name", ARRAY_A);
			$existing_column_names = wp_list_pluck($existing_columns, 'Field');
			$alter_statements = [];

			if ( ! in_array('product_current_info', $existing_column_names) ) {
				$alter_statements[] = "ADD COLUMN product_current_info LONGTEXT DEFAULT '' AFTER product_information";
			}
			if ( ! in_array('product_info_previous', $existing_column_names) ) {
				$alter_statements[] = "ADD COLUMN product_info_previous LONGTEXT DEFAULT '' AFTER product_current_info";
			}
			if ( ! in_array('product_info_previous_2', $existing_column_names) ) {
				$alter_statements[] = "ADD COLUMN product_info_previous_2 LONGTEXT DEFAULT '' AFTER product_info_previous";
			}
			if ( ! in_array('current_tag', $existing_column_names) ) {
				$alter_statements[] = "ADD COLUMN current_tag VARCHAR(255) DEFAULT '' AFTER product_info_previous_2";
			}
			if ( ! in_array('previous_tag', $existing_column_names) ) {
				$alter_statements[] = "ADD COLUMN previous_tag VARCHAR(255) DEFAULT '' AFTER current_tag";
			}
			if ( ! in_array('previous_tag_2', $existing_column_names) ) {
				$alter_statements[] = "ADD COLUMN previous_tag_2 VARCHAR(255) DEFAULT '' AFTER previous_tag";
			}

			// Ensure product_id is INT and not excessively large.
			$wpdb->query("ALTER TABLE $table_name MODIFY COLUMN product_id INT NOT NULL");

			// Add the unique key with a character limit for VARCHAR if needed.
			$alter_statements[] = 'ADD UNIQUE KEY (product_id)';

			if ( ! empty($alter_statements) ) {
				foreach ( $alter_statements as $statement ) {
					$result = $wpdb->query("ALTER TABLE $table_name $statement;");
					if ( $result === false ) {
						echo 'No result set';
					} else {
						update_option('ssgsw_table_active_new_columns_new_uniq', 1);
					}
				}
			}
		}
		/**
		 * Create SSGSW table for formula value performance optimization
		 *
		 * @return void
		 * @version 1.0.0
		 */
		public function create_a_table() {
			global $wpdb;
			$wpdb->hide_errors();
			$table_name = $wpdb->prefix . 'ssgsw_products';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id int(11) unsigned NOT NULL AUTO_INCREMENT,
				product_id int(11),
				product_information LONGTEXT,
				date DATETIME DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY(id)
			)";
			include_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta($sql);
			update_option( 'ssgsw_table_active', 1 );
		}
		/**
		 * Shop recovery method for restorin product
		 */
		public function shop_recovery() {
			$sheet_url    = get_option( 'ssgsw_spreadsheet_url', '');
			$get_recovery = get_option( 'ssgsw_shop_recovery', false );
			if ( ! empty( $sheet_url ) && false === $get_recovery ) {
				global $wpdb;
				$query = $wpdb->prepare("
					UPDATE {$wpdb->prefix}posts
					SET post_type = 'product_variation'
					WHERE post_type = 'product'
					AND post_parent != %d
				", 0 );
				$result = $wpdb->query($query); //phpcs:ignore
				update_option( 'ssgsw_shop_recovery', true );
			}
		}
		/**
		 * Deactivate the plugin.
		 *
		 * @return void
		 */
		public function deactivate() {
			$this->reset_auto_redirection();
			if ( get_option('ssgsw_install_times') ) {
				delete_option('ssgsw_install_times');
			}
		}

		/**
		 * Reset auto redirection.
		 *
		 * @return void
		 */
		public function reset_auto_redirection() {
			ssgsw_update_option('redirect_to_admin_page', 1);
		}

		/**
		 * Initializes the authorization token.
		 *
		 * @return void
		 */
		public function initialize_authorization_token() {
			$token = ssgsw_get_option('token');
			if ( empty($token) ) {
				$token = bin2hex(random_bytes(14));
				ssgsw_update_option('token', $token);
			}
		}

		/**
		 * Prints admin notices.
		 *
		 * @return void
		 */
		public function admin_notices() {

			if ( ssgsw()->is_woocommerce_activated() ) {
				return;
			}

			if ( ! current_user_can('activate_plugins') ) {
				return;
			}

			$woocommerce = 'woocommerce/woocommerce.php';
			$plugin_name = __('Stock Sync with Google Sheet for WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce');

			if ( ssgsw()->is_woocommerce_installed() ) {
				$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $woocommerce . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $woocommerce);

				$message     = wp_sprintf( '<strong>%s</strong> requires <strong>WooCommerce</strong> plugin to be activated.', $plugin_name );
				$button_text = __('Activate WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce');
			} else {
				$activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=woocommerce'), 'install-plugin_woocommerce');
				$message        = wp_sprintf( '<strong>%s</strong> requires <strong>WooCommerce</strong> plugin to be installed and activated.', $plugin_name );
				$button_text    = __('Install WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce');
			}

			$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';

			printf('<div class="error"><p>%1$s %2$s</p></div>', wp_kses_post( $message ), wp_kses_post ( $button ) );
		}
	}

	// Initialize the class.
	Install::init();
}
