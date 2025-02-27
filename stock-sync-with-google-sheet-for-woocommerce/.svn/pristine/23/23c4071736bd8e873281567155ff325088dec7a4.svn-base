<?php
/**
 * Handles ajax requests for Stock Sync With Google Sheet For WooCommerce admin.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since 1.0.0
 */
// Namespace.
namespace StockSyncWithGoogleSheetForWooCommerce;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( __NAMESPACE__ . '\Ajax') ) {

	/**
	 * Class Ajax.
	 * Handles ajax requests for Stock Sync With Google Sheet For WooCommerce admin.
	 *
	 * @package StockSyncWithGoogleSheetForWooCommerce
	 * @since 1.0.0
	 */
	class Ajax extends Base {

		/**
		 * Contains an instance of this class, if available.
		 *
		 * @var Ajax
		 */
		public static $instance;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since 1.0.0
		 */
		public static function init() {
			if ( ! self::$instance ) {
				self::$instance = new self();
			}
			self::$instance->add_ajax_actions();
		}


		/**
		 * Add ajax actions.
		 *
		 * @since 1.0.0
		 */
		public function add_ajax_actions() {
			$actions = [
				'update_options'       => [ $this, 'update_options_callback' ],
				'reset_options'        => [ $this, 'reset_options_callback' ],
				'init_sheet'           => [ $this, 'init_sheet_callback' ],
				'sync_sheet'           => [ $this, 'sync_sheet_callback' ],
				'sync_batch_to_sheet'  => [ $this, 'sync_batch_to_sheet_callback' ],
				'reset_sheet'          => [ $this, 'reset_sheet_callback' ],
				'reset_sheet_setting'  => [ $this, 'reset_sheet_setting' ],
				'activate_woocommerce' => [ $this, 'activate_woocommerce_callback' ],
				'hide_upgrade_notice'  => [ $this, 'hide_notice_callback' ],
			];

			foreach ( $actions as $action => $callback ) {
				add_action('wp_ajax_' . SSGSW_PREFIX . $action, $callback);
			}
		}

		/**
		 * Save options callback
		 */
		public function update_options_callback() {

			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			/**
			 * Get body from request
			 */
			if ( ! isset($body->options) ) {
				$this->send_json(false, __('Options not set', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			$option_keys = array_keys($this->app->get_default_options());

			foreach ( $option_keys as $key ) {
				$value = $body->options[ $key ] ?? null;

				if ( isset($value) ) {
					ssgsw_update_option($key, $value);
				}
			}

			$this->send_json(true, __('Options saved', 'stock-sync-with-google-sheet-for-woocommerce'));
		}

		/**
		 * Reset options callback
		 */
		public function reset_options_callback() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			$this->app->reset_options(true);

			$this->send_json(true, __('Options reset', 'stock-sync-with-google-sheet-for-woocommerce'));
		}

		/**
		 * Check sheet access callback
		 */
		public function init_sheet_callback() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			try {

				$sheet = new Sheet();

				$sheet_initialized = $sheet->initialize();

				if ( $sheet_initialized ) {
					$this->send_json(true, __('Sheet initialized', 'stock-sync-with-google-sheet-for-woocommerce'));
				} else {
					ssgsw_update_option('setup_step', 3);
					$this->send_json(false, $sheet_initialized);
				}
			} catch ( \Throwable $e ) {
				
				ssgsw_update_option('setup_step', 3);
				$this->send_json(false, $e->getMessage());
			}
		}
		/**
		 * Sync batch processing data
		 */
		public function sync_batch_to_sheet_callback() {

			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {

				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}
			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}
			$product = new Product();

			try {
				ssgsw_start_sync();
				$update = $product->sync_batch_all($body->offset, $body->batchSize, $body->index_number);
				if ( is_array($update) && $update['success'] ) {
					ssgsw_end_sync();
					$this->send_json(true, $update );
				} else {
					ssgsw_end_sync();
					$this->send_json(false, $update);
				}
			} catch ( \Exception $e ) {
				ssgsw_end_sync();
				$this->send_json(false, $e->getMessage());
			}
		}
		/**
		 * Update sheet callback
		 */
		public function sync_sheet_callback() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				ssgsw_end_sync();
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				ssgsw_end_sync();
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}
			if ( ! $this->app->is_plugin_ready() ) {
				ssgsw_end_sync();
				$this->send_json(false, __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce'));
			}
			try {
				update_option('ssgsw_license_sync', false);

				ssgsw_start_sync();
				$get_product_count = ssgsw_count_all_product();
				if ( ! $get_product_count || $get_product_count == 0 ) { //phpcs:ignore
					ssgsw_end_sync();
					$this->send_json(false, sprintf(
						'%s <a style="text-decoration:none;" href="%s">%s <i class="ssgs-arrow-right"></i></a>',
						__('No products found!', 'stock-sync-with-google-sheet-for-woocommerce'),
						esc_url(admin_url('edit.php?post_type=product')),
						__('Add New Product', 'stock-sync-with-google-sheet-for-woocommerce')
					));
				}
				ssgsw_end_sync();
				$this->send_json(true, $get_product_count);
			} catch ( \Exception $e ) {
				ssgsw_end_sync();
				$this->send_json(false, $e->getMessage());
			}
		}
		/**
		 * Reset sheet callback
		 */
		public function reset_sheet_setting() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			$sheet = new Sheet();
			$reset = $sheet->reset_all_sheet_information_batch();

			$this->send_json(true, $reset);

			if ( true === $reset ) {
				$this->send_json(true, __('Sheet reset', 'stock-sync-with-google-sheet-for-woocommerce'));
			} else {
				$this->send_json(false, $reset);
			}
		}
		/**
		 * Reset sheet callback
		 */
		public function reset_sheet_callback() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			$sheet = new Sheet();
			$reset = $sheet->reset_sheet();

			$this->send_json(true, $reset);

			if ( true === $reset ) {
				$this->send_json(true, __('Sheet reset', 'stock-sync-with-google-sheet-for-woocommerce'));
			} else {
				$this->send_json(false, $reset);
			}
		}

		/**
		 * Activate WooCommerce callback
		 */
		public function activate_woocommerce_callback() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			$this->app->activate_woocommerce();

			$this->send_json(true, __('WooCommerce activated', 'stock-sync-with-google-sheet-for-woocommerce'));
		}

		/**
		 * Hide notice callback
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function hide_notice_callback() {
			// Check nonce.
			$body = $this->get_body();
			if ( ! isset($body->nonce) || ! wp_verify_nonce($body->nonce, 'ssgsw_nonce') ) {
				$this->send_json(false, __('Invalid nonce', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			// Check permission.
			if ( ! current_user_can('manage_options') ) {
				$this->send_json(false, __('You do not have permission to do this', 'stock-sync-with-google-sheet-for-woocommerce'));
			}

			ssgsw_update_option('hide_upgrade_notice', true);

			$this->send_json(true, __('Notice hidden', 'stock-sync-with-google-sheet-for-woocommerce'));
		}
	}

	/**
	 * Initialize Ajax
	 */

	Ajax::init();
}
