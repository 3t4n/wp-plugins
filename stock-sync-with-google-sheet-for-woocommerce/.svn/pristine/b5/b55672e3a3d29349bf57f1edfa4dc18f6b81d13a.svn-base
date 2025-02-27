<?php
/**
 * Routes all the hooks to their respective actions and filters.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since 1.0.0
 */
// Namespace.
namespace StockSyncWithGoogleSheetForWooCommerce;

// Exit if accessed directly.
defined('ABSPATH') || exit();

if ( ! class_exists('\StockSyncWithGoogleSheetForWooCommerce\Hooks') ) {

	/**
	 * Routes all the hooks to their respective actions and filters.
	 *
	 * @package StockSyncWithGoogleSheetForWooCommerce
	 * @since 1.0.0
	 */
	class Hooks extends Base {
		/**
		 * The single instance of the class.
		 *
		 * @var Hooks
		 */
		public static $instance = null;
		/**
		 * Main plugin file
		 *
		 * @var string
		 */
		public $ult_version = 'stock-sync-with-google-sheet-for-woocommerce-ultimate/stock-sync-with-google-sheet-for-woocommerce-ultimate.php';

		/**
		 * Initializes the class.
		 */
		public static function init() {
			if ( ! self::$instance ) {
				self::$instance = new self();
			}

			self::$instance->add_filters();
			self::$instance->add_actions();
		}
		/**
		 * Actions to be added for the plugin.
		 *
		 * @since 1.0.0
		 */
		public function add_actions() {

			$this->init_appsero_client();

			add_action('admin_menu', [ $this, 'add_admin_menu' ]);
			add_action('admin_init', [ $this, 'redirect_to_admin_page' ], 1);
			add_action('current_screen', [ $this, 'redirect_to_admin_pag_sync' ], 10, 1);
			add_action('init', [ $this, 'check_ssgsw_synced' ], 99999);

			// Footer CSS for admin menu icon.
			add_action('admin_head', [ $this, 'admin_menu_icon_css' ]);

			// Admin enqueue scripts.
			add_action('admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ]);

			// Parse ID from Sheet URL and save for later use.
			add_action('ssgsw_updated_spreadsheet_url', [ $this, 'updated_spreadsheet_url_callback' ]);
			// add_action('ssgsw_updated_save_and_sync', [ $this, 'ssgsw_sync_sheet_callback' ]);
			add_action('admin_footer', [ $this, 'add_some_css' ] );
			/**
			 * Updating sheet hooks
			 */

			/**
			 * When a post type product is created or updated
			 */

			/**
			 * When stock is updated
			 */
			add_action('woocommerce_product_set_stock', [ $this, 'ssgs_woocommerce_product_set_stock' ], 10, 1);

			/**
			 * When product is moved to trash
			 */
			add_action('trashed_post', [ $this, 'trashed_post_callback' ], 10, 1);

			/**
			 * When product is restored from trash
			 */
			add_action('untrashed_post', [ $this, 'untashed_post_callback' ], 10, 1);

			/**
			 * When product is created, or updated or deleted
			 */
			add_action('save_post_product', [ $this, 'after_save_product' ], 10, 3 );
			add_action('woocommerce_order_status_changed', [ $this, 'woocommerce_order_status_changed' ], 10, 4);
			add_action('woocommerce_product_bulk_edit_save', [ $this, 'after_product_quick_edit' ], 10, 1 );
			// add_action('woocommerce_new_product_variation', [ $this,'after_save_product' ], 10, 2 );.
			add_action('woocommerce_update_product_variation', [ $this,'after_update_product_variation' ], 10, 2 );
			add_action('woocommerce_product_quick_edit_save', [ $this, 'after_product_quick_edit' ], 10, 1 );
			add_action('wp_ajax_sssgw_appscript_improved', [ $this, 'sssgw_appscript_improved' ] );
			add_action('wp_ajax_sssgw_already_updated', [ $this, 'ssgsw_already_updated_keyd' ] );
			add_action( "after_plugin_row_{$this->ult_version}",[ $this,'show_ult_update_notice' ], 10, 2);
			add_action('woocommerce_before_delete_product_variation', [ $this, 'trashed_post_callback' ]);
			add_action('admin_init', [ $this, 'add_custom_product_status' ]);
		}
		/**
		 * Add custom product statuses to WooCommerce.
		 *
		 * This function allows you to add custom product statuses to WooCommerce.
		 * Custom statuses can be used to organize or categorize products more effectively.
		 *
		 * Example Usage:
		 * You can hook this function into WooCommerce's filters to register custom statuses.
		 *
		 * @return void
		 */
		public function add_custom_product_status() {
			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$get_status_active = get_option('ssgsw_show_product_status', false);
			if ( ! $get_status_active ) {
				return false;
			}
			if ( ! ssgsw_is_license_valid() ) {
				return false;
			}
			$prev_count = get_option('ssgsw_product_status_count', 0);
			$dropdown = ssgsw_get_all_product_statuses();
			$status_count = count($dropdown);
			if ($status_count != $prev_count ) { //phpcs:ignore
				$google_colmun = new Column();
				$google_sheet = new Sheet();
				$new_colmun = count($google_colmun->get_column_names());
				$sync = $google_sheet->update_google_sheet_dropdowns(false, $new_colmun - 1, $new_colmun, $dropdown );
				if ( ! $sync ) {
					$sync = $google_sheet->update_google_sheet_dropdowns(false, $new_colmun - 1, $new_colmun, $dropdown );
				}
				update_option('ssgsw_product_status_count', $status_count );
			}
		}
		/**
		 * Show Ult update notice
		 */
		public function show_ult_update_notice( $args, $response ) {
			if ( $this->is_plugin_installed_ult() && $this->is_plugin_activated_ult() && $this->get_ult_version() ) {
				?>
				<tr class="plugin-update-tr active">
					<td colspan="4" class="plugin-update colspanchange">
						<div class="update-message notice inline notice-warning notice-alt" style="padding: 8px;">
						<span class="dashicons dashicons-update" style="color:#d63638; margin-right:5px"></span><?php echo esc_html__('There is a new version of Stock Sync with Google Sheet for WooCommerce Ultimate available.','stock-sync-with-google-sheet-for-woocommerce'); ?>
							<a target="_blank"  href="<?php echo esc_url('https://wppool.dev/my-account/?tab=downloads'); ?>" class="update-link" aria-label="<?php echo esc_html__('Update Stock Sync with Google Sheet for WooCommerce Ultimate now','stock-sync-with-google-sheet-for-woocommerce'); ?>">
								<?php echo esc_html__('Download 2.0.5 version','stock-sync-with-google-sheet-for-woocommerce'); ?>
							</a>
						</div>
					</td>
				</tr>
				<?php
			}
		}
		/**
		 * Checks if the plugin is installed
		 *
		 * @return bool
		 */
		public function is_plugin_installed_ult() {
			// Check if WooCommerce is installed in plugin folder.
			if ( file_exists( WP_PLUGIN_DIR . '/' . $this->ult_version ) ) {
				return true;
			}
			return false;
		}

		/**
		 * Checks if the plugin is activated
		 *
		 * @return bool
		 */
		public function is_plugin_activated_ult() {
			if ( is_plugin_active( $this->ult_version ) ) {
				return true;
			}

			return false;
		}
		/**
		 * Get Ult version number
		 */
		public function get_ult_version() {
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $this->ult_version );
			if ( $plugin_data ) {
				 $plugin_version = $plugin_data['Version'];
				if ( $plugin_version > '2.0.2' && $plugin_version < '2.0.5' ) {
					return true;
				} else {
					return false;
				}
			}
			return true;
		}
		/**
		 * AppScript setup again
		 */
		public function sssgw_appscript_improved() {
			if ( isset( $_POST ) ) {
				$security = isset($_POST['nonce']) ? sanitize_text_field( wp_unslash($_POST['nonce']) ) : '';
				if ( ! isset( $security ) || ! wp_verify_nonce( $security, 'ssgsw_nonce2' ) ) {
					wp_die( -1, 403 );
				}
				if ( ! current_user_can( 'manage_options' ) ) {
					return false;
				}
				if ( ! is_user_logged_in() ) {
					return false;
				}
				update_option('ssgsw_setup_step', 4 );
				wp_send_json([
					'url' => admin_url('admin.php?page=ssgsw-admin'),
				]);
			}
			die();
		}

		/**
		 * Hide Notice if already updated
		 */
		public function ssgsw_already_updated_keyd() {
			if ( isset( $_POST ) ) {
				$security = isset($_POST['nonce']) ? sanitize_text_field( wp_unslash($_POST['nonce']) ) : '';
				if ( ! isset( $security ) || ! wp_verify_nonce( $security, 'ssgsw_nonce2' ) ) {
					wp_die( -1, 403 );
				}
				if ( ! current_user_can( 'manage_options' ) ) {
					return false;
				}
				if ( ! is_user_logged_in() ) {
					return false;
				}
				update_option('ssgsw_new_user_activated_key5', '1' );
				update_option('ssgsw_already_updated_key5', '1' );
				wp_send_json([
					'success' => true,
				]);
			}

			die();
		}
		/**
		 * Saves post callback.
		 *
		 * @param int      $product_id Product ID.
		 * @param \WP_Post $products product object.
		 * @param int      $update save data.
		 * @return string
		 */
		public function after_save_product( $product_id, $products, $update ) {

			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}

			if ( 'product' === get_post_type($product_id) || 'product_variation' === get_post_type($product_id) ) {
				$product = new Product();
				$product->batch_update_delete_and_append2($product_id);
			}
		}

		/**
		 * Order status updated
		 *
		 * @param int      $order_id order_id ID.
		 * @param string   $old_status old status.
		 * @param string   $new_status new status data.
		 * @param \WP_Post $order order object.
		 *
		 * @return mixed
		 */
		public function woocommerce_order_status_changed( $order_id, $old_status, $new_status, $order ) {
			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}

			if ( 'completed' === $new_status ) {

				$items = $order->get_items();
				$product_ids = array();
				foreach ( $items as $item_id => $item ) {
					$product_id = $item->get_product_id();
					$product_ids[] = $product_id;
				}
				$product = new Product();

				foreach ( $product_ids as $product_id ) {
					$product->batch_update_delete_and_append2($product_id);
				}
			}
		}
		/**
		 * Saves post callback.
		 *
		 * @param \WP_Post $products product object.
		 * @return string
		 */
		public function after_product_quick_edit( $products ) {
			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$product = new Product();
			$product->batch_update_delete_and_append($products->get_id());
		}
		/**
		 * Update post callback.
		 *
		 * @param int      $product_id Product ID.
		 * @param \WP_Post $products product object.
		 * @return string
		 */
		public function after_update_product_variation( $product_id, $products ) {

			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$product = new Product();
			$product->batch_update_delete_and_append($product_id);
		}
		/**
		 * Public function add some css
		 */
		public function add_some_css() {
			?>
				<style>
					.ssgsw_appscript_notice3 {
						padding: 1px;
						background: #f6dade;
						text-align: center;
						border-radius: 1px;
						font-size: 14px !important;
						margin: none !important;
						position: relative;
						margin-top:5px;
						margin-bottom: 5px;
					};
					.ssgsw_remove_text_dec{
						text-decoration: none !important;
						font-size: 14px;
					}
					.ssgsw_appscript_notice3 a{
						text-decoration: none !important;
						font-size: 14px;
					};
					.ssgsw_appscript_notice3 p {
						font-size:14px !important;
					};
					.ssgsw_extra_strong {
						font-weight: 700 !important;
					}
					.ssgsw-wrapper .ssgs-check .check2:checked{
						background: #FC4486;
						border: none !important;
					}
					.ssgsw-wrapper .ssgs-check .check2{
						background: #E74F6A;
						border: none !important;
					}
					.ssgsw_list_option {
						position: absolute;
						right: 35px;
						top: 20px;
						z-index: 99;
						background-color: #f0f0f1;
						text-align: left !important;
						padding-left: 14px;
						padding-right: 20px;
					}
					.ssgsw_skip_next_time {
						font-weight: 600;
					}
					span.ssgsw_dismiss_notice {
						opacity: 0.7;
					}
					@media screen and (max-width: 782px) {
						.ssgsw_notice_dismiss {
							padding: 13px;
						}
					}
					.ssgsw_notice_dismiss {
						position: absolute;
						top: 0;
						right: 1px;
						border: none;
						margin: 0;
						padding: 9px;
						background: 0 0;
						color: #787c82;
						cursor: pointer;
					}
					.ssgsw_appscript_notice3 .notice-dismiss {
						display: none;
					}
					.ssgsw_remove_text_dec{
						color:#005ae0;
						cursor:pointer;
					}
					.ssgss_imporved_tooltip {
						cursor: pointer;
						position: relative;
						background: #e4e6eb;
						color: gray;
						display: flex;
						align-items: center;
						justify-content: center;
						width: 30px;
						height: 30px;
						box-sizing: border-box;
						border-radius: 42px;
						cursor: pointer;
						transition: all 0.2s ease;
					}
					.ssgss_imporved_tooltip:hover {
						background:#0C5F9A;
						color:#fff !important;
					}
					.ssgsw_appscript_notice {
						position: absolute;
						top: -14px;
						right: -10px;
						z-index: 9999;
						padding: 17px;
						color: #767676;
						opacity: 0.8;
					}
					.ssgsw_bulet_point_option {
						width: 10px;
						background-color: #ffba00;
						z-index: 9999;
						height: 10px;
						top: 20px;
						left: 38px;
						border-radius: 50%;
						position: absolute;
					}
					.ssgsw_dismiss_common {
						cursor: pointer;
					}
					.ssgsw_tooltip .ssgsw_tooltiptext {
						visibility: hidden;
						width: 220px;
						color: #fff;
						background: #141b38;
						text-align: center;
						border-radius: 6px;
						padding: 5px 0;
						position: absolute;
						z-index: 1;
						right: 40px;
						top: 20px;
					}
					.ssgsw_tooltip:hover .ssgsw_tooltiptext {
						visibility: visible;
					}
				</style>
			<?php
		}

		/**
		 * Filters to be added for the plugin.
		 *
		 * @since 1.0.0
		 */
		public function add_filters() {
			// Add promotional link to plugin action links.
			add_filter('plugin_action_links_' . plugin_basename(SSGSW_FILE), [ $this, 'add_plugin_action_links' ]);

			// Add promotional link to plugin meta links.
			add_filter('plugin_row_meta', [ $this, 'add_plugin_meta_links' ], 10, 2);

			add_filter('ssgsw_get_credentials', [ $this, 'ssgsw_get_credentials_callback' ]);

			add_filter('ssgs_get_column', [ $this, 'ssgsw_get_column_callback' ], 10, 3);
		}

		/**
		 * Add admin menu callback.
		 *
		 * @since 1.0.0
		 */
		public function add_admin_menu() {
			add_menu_page(
			__('Stock Sync with Google Sheet for WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce'),
			__('Stock Sync with Google Sheet', 'stock-sync-with-google-sheet-for-woocommerce'),
			'manage_options',
			'ssgsw-admin',
			[ $this, $this->app->is_setup_complete() ? 'render_admin_page' : 'render_setup_page' ],
			SSGSW_PUBLIC . 'images/logo.svg',
			56
			);

			if ( ! $this->app->is_setup_complete() ) {
				add_submenu_page(
				'ssgsw-admin',
				__('Stock Sync with Google Sheet for WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce'),
				__('Setup', 'stock-sync-with-google-sheet-for-woocommerce'),
				'manage_options',
				'ssgsw-admin',
				[ $this, 'render_setup_page' ],
				0
				);
			} else {
				add_submenu_page(
				'ssgsw-admin',
				__('Stock Sync with Google Sheet for WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce'),
				__('Settings', 'stock-sync-with-google-sheet-for-woocommerce'),
				'manage_options',
				'ssgsw-admin',
				[ $this, 'render_admin_page' ],
				99
				);
			}
			add_submenu_page(
				'ssgsw-admin',
				__('Stock Sync with Google Sheet for WooCommerce', 'stock-sync-with-google-sheet-for-woocommerce'),
				__('Log', 'stock-sync-with-google-sheet-for-woocommerce'),
				'manage_options',
				'ssgsw-admin-log',
				[ $this, 'render_log_page' ],
				99
			);
		}

		/**
		 * Render admin page callback.
		 *
		 * @since 1.0.0
		 */
		public function render_admin_page() {
			if ( $this->app->is_ultimate_activated() && ! $this->app->is_license_valid() ) {
				$this->load_template('dashboard/activate-license');
			}

			$this->load_template('dashboard/base');
		}
		/**
		 * Render admin page callback.
		 *
		 * @since 1.0.0
		 */
		public function render_log_page() {
			$this->load_template('dashboard/log');
		}
		/**
		 * Render setup page
		 */
		public function render_setup_page() {
			$this->app->reset_options(false);
			$this->load_template('setup/base');
		}
		/**
		 * Redirect to admin page
		 */
		public function redirect_to_admin_pag_sync($hook) {
			if ( ! $this->app->is_plugin_ready_setup() ) {
				update_option('ssgsw_version_3_12_sync', true);
				return;
			}
			if (headers_sent()) {
				return;
			}
			$version = get_option('ssgsw_version_3_12_sync', false);
			if(!$version) {
				update_option('ssgsw_license_sync', true);
				update_option('ssgsw_version_3_12_sync', true);
				wp_redirect(admin_url('admin.php?page=ssgsw-admin#settings'));
				exit();
			}
		
		}

		/**
		 * Redirect to admin page
		 */
		public function redirect_to_admin_page() {
			// $product_id = 2492;
			// $attribute_name = 'pa_a';
			// $slugs = ['f', 'l'];
			// $existing_taxonomy_ids = [];
			// // Check if the taxonomy exists
			// if (taxonomy_exists($attribute_name)) {
			// 	// Check if terms exist and create them if necessary
			// 	foreach ($slugs as $slug) {
			// 		$term = get_term_by('slug', $slug, $attribute_name);
			// 		if ($term && !is_wp_error($term)) {
			// 			$existing_taxonomy_ids[] = $term->term_id;
			// 		}
			// 	}
			// 	print_r($existing_taxonomy_ids);
				
			// 	// Set the terms for the parent product
			// 	wp_set_object_terms($product_id, $existing_taxonomy_ids, 'pa_a');
			// 	update_post_meta($product_id, '_product_attributes', [
			// 		$attribute_name => [
			// 			'name' => $attribute_name,
			// 			'value' => '', // Save the terms as a pipe-separated string
			// 			'position' => 1,
			// 			'is_visible' => 1,
			// 			'is_variation' => 1,
			// 			'is_taxonomy' => 1
			// 		]
			// 	]);
			// }



			$redirect_to_admin_page = ssgsw_get_option('redirect_to_admin_page', 0);
			if ( wp_validate_boolean( $redirect_to_admin_page ) ) {
				ssgsw_update_option('redirect_to_admin_page', 0);
				wp_safe_redirect( admin_url( 'admin.php?page=ssgsw-admin' ) );
				exit;
			}
			
		
		}

		/**
		 * Add plugin action links callback.
		 *
		 * @param array $links Plugin action links.
		 * @return array
		 */
		public function add_plugin_action_links( $links ) {

			if ( $this->app->is_setup_complete() ) {
				$links[] = '<a href="' . admin_url('admin.php?page=ssgsw-admin') . '">' . __('Settings', 'stock-sync-with-google-sheet-for-woocommerce') . '</a>';
			} else {
				$links[] = '<a href="' . admin_url('admin.php?page=ssgsw-admin') . '">' . __('Setup', 'stock-sync-with-google-sheet-for-woocommerce') . '</a>';
			}

			if ( ! $this->app->is_license_valid() ) {
				$links[] = wp_sprintf( '<a class="ssgsw-promo ssgsw-ultimate-button small" href="javascript:;"> <span class="ssgsw-ultimate-button">%s</span></a>', __('Get Ultimate', 'stock-sync-with-google-sheet-for-woocommerce') );
			}

			return $links;
		}

		/**
		 * Add plugin meta links callback.
		 *
		 * @param array  $links Plugin meta links.
		 * @param string $file Plugin file.
		 * @return array
		 */
		public function add_plugin_meta_links( $links, $file ) { //phpcs:ignore
			if ( ! plugin_basename( SSGSW_FILE ) ) {
				$links[] = wp_sprintf('<a target="_blank" href="https://wppool.dev/docs-category/stock-sync-with-google-sheet-for-woocommerce/"> <span class="dashicons dashicons-media-document" aria-hidden="true" style="font-size:16px;line-height:1.2"></span>%s</a>', __('Docs', 'stock-sync-with-google-sheet-for-woocommerce'));
				$links[] = wp_sprintf('<a target="_blank" href="https://wppool.dev/contact/"> <span class="dashicons dashicons-editor-help" aria-hidden="true" style="font-size:16px;line-height:1.2"></span>%s</a>', __('Support', 'stock-sync-with-google-sheet-for-woocommerce'));
			}
			return $links;
		}

		/**
		 * Admin menu icon css callback.
		 *
		 * @since 1.0.0
		 */
		public function admin_menu_icon_css() {
			printf('<style>%s</style>', '#adminmenu .toplevel_page_ssgsw-admin div.wp-menu-image img { 
				width: 18px;
				height: 18px;
			};');
		}


		/**
		 * Admin enqueue scripts callback.
		 *
		 * @param string $hook Current page hook.
		 * @since 1.0.0
		 */
		public function admin_enqueue_scripts( $hook ) {

			wp_enqueue_style('ssgsw-global-css', SSGSW_PUBLIC . 'css/global.css', [], SSGSW_VERSION);
			$pages = [ 'toplevel_page_ssgsw-admin', 'stock-sync-with-google-sheet_page_ssgsw-settings', 'edit.php', 'plugins.php', 'index.php', 'pages2', 'stock-sync-with-google-sheet_page_ssgsw-license' ];
			$pages2 = [ 'toplevel_page_ssgsw-admin', 'stock-sync-with-google-sheet_page_ssgsw-license' ];
			if ( ! in_array($hook, $pages) ) {
				return;
			}

			if ( in_array($hook, $pages) ) {
				wp_enqueue_script('ssgsw-notice-js', SSGSW_PUBLIC . 'js/notice.js', [ 'jquery' ], time(), true);
				wp_localize_script('ssgsw-notice-js', 'ssgsw_notice_data', [
					'ajax_url' => admin_url('admin-ajax.php'),
					'nonce'    => wp_create_nonce('ssgsw_nonce2'),
					'current_page' => $hook,
				]);
			}

			// check if we are on product edit page.
			if ( 'edit.php' === $hook && 'product' !== get_current_screen()->post_type ) {
				return;
			}

			wp_enqueue_style('ssgsw-admin-css', SSGSW_PUBLIC . 'css/admin.min.css', [], SSGSW_VERSION);
			if ( in_array( $hook, $pages2 ) ) {
				wp_enqueue_style('ssgsw-custom-css', SSGSW_PUBLIC . 'css/custom.css', [], SSGSW_VERSION);
			}

			wp_enqueue_style('ssgsw-select2-css', SSGSW_PUBLIC . 'css/select2.css', [], SSGSW_VERSION);
			wp_enqueue_script('ssgsw-select2-js', SSGSW_PUBLIC . 'js/select2.js', [ 'jquery' ], SSGSW_VERSION, true);
			wp_enqueue_script('ssgsw-admin-js', SSGSW_PUBLIC . 'js/admin.min.js', [ 'jquery' ], SSGSW_VERSION, true);
			// Localize script.
			wp_localize_script('ssgsw-admin-js', 'ssgsw_script', $this->app->localized_script());
		}

		/**
		 * Updated spreadsheet url callback.
		 *
		 * @param string $spreadsheet_url Spreadsheet url.
		 * @since 1.0.0
		 */
		public function updated_spreadsheet_url_callback( $spreadsheet_url ) {
			/**
			 * Get Sheet ID from Sheet URL Regex
			 */
			$sheet_id = preg_replace('/^.*\/d\/(.*)\/.*$/', '$1', $spreadsheet_url);

			/**
			 * Get Sheet ID from Sheet URL
			 */
			if (empty($sheet_id)) {
				$sheet_id = preg_replace('/^.*\/d\/(.*)$/', '$1', $spreadsheet_url);

				if (empty($sheet_id)) {
					$sheet_id = preg_replace('/^.*\/(.*)$/', '$1', $spreadsheet_url);
				}
			}

			error_log('Spreadsheet ID: ' . $sheet_id);
			ssgsw_update_option('spreadsheet_id', $sheet_id);
		}

		/**
		 * Get credentials callback.
		 *
		 * @param string $credentials Credentials.
		 * @return array
		 */
		public function ssgsw_get_credentials_callback( $credentials ) {
			$credentials = json_decode($credentials, true);

			return array_map('wp_unslash', $credentials);
		}
		/**
		 * Get column callback.
		 *
		 * @param mixed  $value Column value.
		 * @param string $key Column key.
		 * @param object $row Row object.
		 * @return mixed
		 */
		public function ssgsw_get_column_callback( $value, $key, $row ) {

			$column = new Column();

			if ( '_stock' === $key ) {

				if ( isset($row->_stock) && is_numeric($row->_stock) && $row->_stock != 0 ) { //phpcs:ignore
					return $row->_stock;
				}

				if ( isset($row->_stock_status) ) {
					if ( empty($row->_stock_status) ) {
						return __('In Stock', 'stock-sync-with-google-sheet-for-woocommerce');
					}
					return $column->get_stock_status($row->_stock_status);
				}
			}

			// ID.
			if ( 'ID' === $key || 'total_sales' === $key ) {
				return absint( $value );
			}

			// Price.
			if ( in_array( $key, [ '_sale_price', '_regular_price', '_price' ] ) ) {
				if ( $value > 0 ) {
					if ( is_string($value) ) {
						$number = floatval($value);
						return round($number, 2);
					} else {
						return round($value, 2);
					}
				}
				return $value;
			}
			if ( 'post_status' === $key) {
				if ($value === 'publish') {
					return 'Published';
				} elseif ($value === 'pending') {
					return 'Pending Review';
				}
				return ucfirst($value);
			}
			// Product Category.
			if ( 'product_cat' === $key ) {
				if ( ! $row->product_type ) {

					$cat_info = ssgsw_get_product_categories($row->ID);
					if ( $cat_info ) {
						return $column->get_items_by_comma($cat_info);
					}
					return $column->get_items_by_comma($value);
				} else {
					return $column->get_items_by_comma($value);
				}
			}
			if ( 'product_tag' === $key ) {
				return $column->get_items_by_comma($value);
			}
			// Product type.
			if ( 'product_type' === $key ) {
				return $column->get_product_type($value);
			}

			if ( 'post_excerpt' === $key ) {
				return $row->_variation_description ?? $value;
			}

			if ( '_product_attributes' === $key ) {
				if ( $value ) {
					$value = maybe_unserialize($value);
				
					$attributes = [];

					foreach ( $value as $attribute ) {
				
						if ( $attribute['is_taxonomy'] ) {
							$taxonomy_values = wp_get_post_terms( $row->ID, $attribute['name'], [ 'fields' => 'slugs' ] );
							
							if ( is_array($taxonomy_values) && ! empty($taxonomy_values ) ) {
								$url = [];
								foreach ( $taxonomy_values as $key => $urls ) {
									$url[ $key ] = urldecode($urls);
								}
								$attributes[]    = $attribute['name'] . ': ' . implode(' | ', $url);
							} else {
								$attributes[]    = $attribute['name'] . ': ' . '';
							}
						} elseif ( ! empty($attribute['value']) ) {
							$attributes[] = $attribute['name'] . ': ' . $attribute['value'];
						}
					}

					$attributes = array_filter($attributes);

					return implode(', ', $attributes);
				}
				$attributes = array_filter( (array) $row, function ( $key ) {
					return strpos($key, 'attribute_') !== false;
				}, ARRAY_FILTER_USE_KEY);
				$attributes = array_map(function ( $key, $value ) {
					if ( $value ) {
						return str_replace('attribute_', '', $key) . ': ' . $value;
					} else {
						return '';
					}
				}, array_keys($attributes), $attributes);

				$attributes = array_filter($attributes);

				return implode(', ', $attributes);
			}

			return (string) $value;
		}


		/**
		 * Save option freeze headers callback.
		 *
		 * @param mixed $value Freeze headers value.
		 * @return string
		 */
		public function ssgsw_save_option_freeze_headers_callback( $value ) {
			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$sheet   = new Sheet();
			$updated = $sheet->freeze_headers( true === wp_validate_boolean( $value ) );
			$this->send_json($updated);
		}

		/**
		 * Sync sheet callback.
		 *
		 * @return void
		 */
		public function ssgsw_sync_sheet_callback() {

			if ( isset( $GLOBALS['ssgs_sync_all_products'] ) && true === $GLOBALS['ssgs_sync_all_products'] ) {
				return;
			}
			$product = new Product();
			$product->sync_all();
		}

		/**
		 * Initiates Appsero Client.
		 *
		 * @return mixed
		 */
		public function init_appsero_client() {

			if ( ! class_exists( '\StockSyncWithGoogleSheetForWooCommerce\Appsero\Client' ) ) {
				require_once SSGSW_INCLUDES . '/appsero/src/Client.php';
			}

			$client = new \StockSyncWithGoogleSheetForWooCommerce\Appsero\Client( '2153b02c-08d6-45e0-8295-6afc39509fe5', 'Stock Sync with Google Sheet for WooCommerce', SSGSW_FILE );
			// Active insights.
			$client->insights()->init();

			// Init WPPOOL Plugin.
			if ( function_exists( 'wppool_plugin_init' ) ) {
				$default_image = SSGSW_URL . '/includes/wppool/background-image.png';
				$ssgs_plugin = wppool_plugin_init( 'stock_sync_with_google_sheet_for_woocommerce', $default_image );
				$image = SSGSW_URL . '/includes/wppool/SSGS.png';
				$from = '2024-11-21';
				$to = '2024-12-4';
				if ( $ssgs_plugin && is_object( $ssgs_plugin ) && method_exists( $ssgs_plugin, 'set_campaign' ) ) {
					$ssgs_plugin->set_campaign($image, $to, $from );
				}
			}
		}
		/**
		 * Set update when product stock update
		 *
		 * @param object $product product info.
		 */
		public function ssgs_woocommerce_product_set_stock( $product ) {

			if ( ! $this->app->is_plugin_ready_setup() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$product_id = $product->get_id();
			$product = new Product();
			$product->batch_update_delete_and_append($product_id);
		}
		/**
		 * Trashed post callback.
		 *
		 * @param int $post_id Post ID.
		 * @return string
		 */
		public function trashed_post_callback( $post_id ) {
			if ( 'product' === get_post_type($post_id) || 'product_variation' === get_post_type($post_id) ) {
				if ( ! $this->app->is_plugin_ready_setup() ) {
					return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
				}
				$product = new Product();

				// $product->delete_product_from_sheet($post_id);
			}
		}
		/**
		 * Un trashed post callback.
		 *
		 * @param int $post_id Post ID.
		 * @return string
		 */
		public function untashed_post_callback( $post_id ) {
			if ( 'product' === get_post_type($post_id) ) {
				if ( ! $this->app->is_plugin_ready_setup() ) {
					return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
				}
				$product = new Product();
				$product->batch_update_delete_and_append($post_id);
			}
		}
		/**
		 * Checks if ssgsw synced.
		 *
		 * @return void
		 */
		public function check_ssgsw_synced() {

			$ssgsw_synced = wp_validate_boolean( get_option('ssgsw_synced') );

			if ( $ssgsw_synced ) {
				return;
			}
			update_option('ssgsw_synced', true);
			$product = new Product();
			$product->sync_all();
		}
		/**
		 * Saves post callback.
		 *
		 * @param int      $post_id Post ID.
		 * @param \WP_Post $post Post object.
		 * @param bool     $update Whether this is an existing post being updated or not.
		 * @return string
		 */
		public function save_post_callback( $post_id, $post, $update ) { // phpcs:ignore
			$product = new Product();

			if ( 'product' === get_post_type($post_id) || 'product_variation' === get_post_type($post_id) ) {
				if ( ! $this->app->is_plugin_ready_setup() ) {
					return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
				}
				$product->batch_update_delete_and_append($post_id);
			}
		}
	}

	// Initiate the class.
	Hooks::init();
}
