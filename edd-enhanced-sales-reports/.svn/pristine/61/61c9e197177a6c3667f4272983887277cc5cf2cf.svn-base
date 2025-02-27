<?php
/**
 * Main Admin Class
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EDD_Enhanced_Sales_Reports_Admin' ) ) {

	/**
	 * Main EDD_Enhanced_Sales_Reports_Admin class
	 *
	 * @since       1.0.0
	 */
	class EDD_Enhanced_Sales_Reports_Admin {

		/**
		 * Holds a printable message.
		 *
		 * @var         string $message
		 * @since       1.0.0
		 */
		private $message       = '';

		/**
		 * Keeps a status for whether there is a message for printing or not.
		 *
		 * @var         bool $message
		 * @since       1.0.0
		 */
		private $message_error = false;

		/**
		 * Bootstraps the admin section
		 */
		public function __construct() {
			$this->hooks();
			$this->review_notice_callout();
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

			add_action( 'admin_menu', array( $this, 'create_reporting_menu' ), 10 );
			add_action( 'admin_menu', array( $this, 're_order_menu_items' ), 50 );

			add_action( 'plugin_row_meta', array( $this, 'add_action_links' ), 10, 2 );
			add_action( 'admin_footer', array( $this, 'add_deactive_modal' ) );
			add_action(
				'wp_ajax_edd_enhanced_sales_reports_deactivation',
				array(
					$this,
					'edd_enhanced_sales_reports_deactivation',
				)
			);

			add_action(
				'wp_ajax_edd_esr_get_select_options',
				array(
					$this,
					'get_dynamic_select_options',
				)
			);

			add_action( 'plugin_action_links', array( $this, 'edd_enhanced_sales_reports_action_links' ), 10, 2 );

			add_action(
				'edd_enhanced_sales_reports_after_settings_title',
				array(
					$this,
					'subscription_callout',
				),
				10,
				2
			);

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			add_action( 'admin_footer', array( $this, 'subscription_popup' ) );
			add_action(
				'wp_ajax_edd_enhanced_sales_reports_handle_subscription_request',
				array(
					$this,
					'process_subscription',
				)
			);
			add_action(
				'wp_ajax_edd_enhanced_sales_reports_subscription_popup_shown',
				array(
					$this,
					'subscription_shown',
				)
			);

			add_action( 'wp_ajax_edd_enhanced_sales_reports_fetch_top_products', array( $this, 'fetch_top_products' ) );
			add_action(
				'wp_ajax_edd_enhanced_sales_reports_fetch_top_customers',
				array(
					$this,
					'fetch_top_customers',
				)
			);

			add_action( 'wp_ajax_edd_enhanced_sales_reports_populate_lookup', array( $this, 'populate_lookup' ) );
			add_action( 'wp_ajax_edd_enhanced_sales_reports_get_filtered', array( $this, 'fetch_filtered' ) );

			add_action( 'admin_notices', array( $this, 'existing_data_load_notice' ) );

			add_action( 'wp_dashboard_setup', array( $this, 'register_dashboard_widget' ) );

			add_action(
				'edd_customer_before_tables',
				array(
					$this,
					'link_to_ordered_products_from_customer_profile',
				)
			);

			add_filter( 'edd_payments_table_columns', array( $this, 'add_products_column_to_payments_table' ) );
			add_filter( 'edd_payments_table_column', array( $this, 'add_products_list_to_column' ), 10, 3 );
		}

		/**
		 * Admin Enqueue style and scripts
		 *
		 * @access      public
		 * @return      void
		 *
		 * @since       1.0.0
		 */
		public function enqueue_admin_scripts() {
			global $pagenow;
			$page_id = get_current_screen()->id;

			if ( EDD_ENHANCED_SALES_REPORTS_LOAD_NON_MIN_SCRIPTS ) {
				$suffix = '';
			} else {
				$suffix = '.min';
			}

			if ( edd_enhanced_sales_reports_is_admin_page( 'index.php' ) || edd_enhanced_sales_reports_is_admin_page( 'admin.php' ) || edd_enhanced_sales_reports_is_admin_page( 'plugins.php' ) ) {
				wp_enqueue_style( 'edd_enhanced_sales_reports_admin_style', EDD_ENHANCED_SALES_REPORTS_URL . 'assets/css/admin' . $suffix . '.css', array(), EDD_ENHANCED_SALES_REPORTS_VER );
				wp_enqueue_script( 'edd_enhanced_sales_reports_admin_script', EDD_ENHANCED_SALES_REPORTS_URL . 'assets/js/admin' . $suffix . '.js', array(), EDD_ENHANCED_SALES_REPORTS_VER, true );
			}

			$main_page = edd_enhanced_sales_reports_get_admin_page_by_name();

			if ( edd_enhanced_sales_reports_is_admin_page( 'plugins.php' ) ) {
				wp_enqueue_style(
					'edd_enhanced_sales_reports_deactivation_style',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/css/deactivation' . $suffix . '.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_deactivation_script',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/js/deactivation' . $suffix . '.js',
					array( 'jquery' ),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);
			}

			if ( 'y' !== get_option( 'edd_enhanced_sales_reports_subscription_shown' ) ) {
				wp_enqueue_style(
					'edd_enhanced_sales_reports_subscription_style',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/css/subscription' . $suffix . '.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_subscription_script',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/js/subscription' . $suffix . '.js',
					array( 'jquery' ),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);
			}

			// check if we are on reporting page.
			if ( isset( $_GET['page'] ) && 'edd-enhanced-sales-reports' === $_GET['page'] || 'index.php' === $pagenow ) {
				wp_enqueue_style(
					'edd_enhanced_sales_reports_daterangepicker',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/daterangepicker/css/daterangepicker.min.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);

				wp_enqueue_style(
					'edd_enhanced_sales_reports_reporting',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/css/report' . $suffix . '.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);

				wp_enqueue_style(
					'edd_enhanced_sales_reports_select2',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/select2/css/select2.min.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);
				wp_enqueue_style(
					'edd_enhanced_sales_reports_datatables',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/datatables/datatables.min.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_momentjs',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/momentjs/moment.min.js',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_datatables',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/datatables/datatables.min.js',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_select2',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/select2/js/select2.full.min.js',
					array( 'jquery' ),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_chartjs',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/chartjs/dist/chart.min.js',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_daterangepicker',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/vendor/daterangepicker/js/daterangepicker.min.js',
					array( 'edd_enhanced_sales_reports_momentjs', 'jquery' ),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_reporting',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/js/reporting' . $suffix . '.js',
					array(
						'edd_enhanced_sales_reports_momentjs',
						'edd_enhanced_sales_reports_daterangepicker',
						'edd_enhanced_sales_reports_chartjs',
						'jquery',
					),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);

				wp_enqueue_style(
					'edd_enhanced_sales_reports_settings_style',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/css/settings' . $suffix . '.css',
					array(),
					EDD_ENHANCED_SALES_REPORTS_VER
				);

				wp_enqueue_script(
					'edd_enhanced_sales_reports_settings_script',
					EDD_ENHANCED_SALES_REPORTS_URL . 'assets/js/settings' . $suffix . '.js',
					array( 'jquery' ),
					EDD_ENHANCED_SALES_REPORTS_VER,
					true
				);
			}
		}

		/**
		 * Shows a notice to user if there is no data in Lookup table but
		 * there are orders present in edd_orders table
		 *
		 * @return void
		 */
		public function existing_data_load_notice() {
			global $wpdb;

			$total_records = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}enhanced_sales_report" );

			$total_records = intval( $total_records );

			if ( 1 < $total_records ) {
				return; // already have some records in database.
			}

			// check if there is any data in EDD Tables.
			$total_edd_records = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}edd_orders" );
			$total_edd_records = intval( $total_edd_records );

			if ( 1 > $total_records ) {
				return; // no data in EDD Tables either.
			}

			echo "<div id='edd-enhanced-sales-reports-review' class='notice notice-info is-dismissible'><p>" .

				 esc_html__( 'EDD Enhanced Reports Pro requires existing order data to be imported for accurate reporting.', 'edd-enhanced-sales-reports' )
				 .
				 '<br><a target="_blank" href="' . esc_attr( admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=settings' ) ) . '" class="button-secondary">' . esc_html__( 'Import Now', 'edd-enhanced-sales-reports' ) . '</a>' .
				 '</p></div>';
		}

		/**
		 * Add support link
		 *
		 * @param array  $plugin_meta An array of the plugin's metadata, including the version, author, author URI, and plugin URI.
		 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
		 *
		 * @since 1.0.0
		 */
		public function add_action_links( $plugin_meta, $plugin_file ) {
			static $this_plugin;

			if ( empty( $this_plugin ) ) {
				$this_plugin = 'edd-enhanced-sales-reports/edd-enhanced-sales-reports.php';
			}

			if ( $plugin_file === $this_plugin ) {

				array_push( $plugin_meta, '<a href="' . EDD_ENHANCED_SALES_REPORTS_DOCUMENTATION_URL . '" target="_blank">' . esc_html__( 'Documentation', 'edd-enhanced-sales-reports' ) . '</a>' );

				array_push( $plugin_meta, '<a href="' . EDD_ENHANCED_SALES_REPORTS_OPEN_TICKET_URL . '" target="_blank">' . esc_html__( 'Open Support Ticket', 'edd-enhanced-sales-reports' ) . '</a>' );

				array_push( $plugin_meta, '<a href="' . EDD_ENHANCED_SALES_REPORTS_REVIEW_URL . '" target="_blank">' . esc_html__( 'Post Review', 'edd-enhanced-sales-reports' ) . '</a>' );
			}

			return $plugin_meta;
		}

		/**
		 * Show Subscription Modal, if not shown already
		 *
		 * @return void
		 * @since 1.0.2
		 * @access public
		 */
		public function subscription_callout() {
			require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/subscription-callout.php';
		}

		/**
		 * Show Subscription Modal, if not shown already
		 *
		 * @since 1.0.2
		 * @access public
		 */
		public function subscription_popup() {

			$show_popup = ( time() > ( intval( get_option( 'edd_enhanced_sales_reports_installed_at' ) ) + DAY_IN_SECONDS * 2 ) );

			if ( $show_popup && 'y' !== get_option( 'edd_enhanced_sales_reports_subscription_shown' ) ) {
				require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/subscription-popup.php';
			}
		}

		/**
		 * Processes the subscription request
		 *
		 * @return void
		 * @since 1.0.2
		 * @access public
		 */
		public function process_subscription() {

			check_ajax_referer( 'edd_enhanced_sales_reports_subscribe', 'security' );

			if ( isset( $_POST['email'] ) && filter_var( wp_unslash( $_POST['email'] ), FILTER_VALIDATE_EMAIL ) ) {
				$email = sanitize_email( wp_unslash( $_POST['email'] ) );
			} else {
				$email = get_option( 'admin_email' );
			}

			wp_remote_post(
				EDD_ENHANCED_SALES_REPORTS_SUBSCRIBE_URL,
				array(
					'body' => array(
						'email'       => $email,
						'plugin_name' => EDD_ENHANCED_SALES_REPORTS_NAME,
						'domain'      => home_url( '/' ),
					),
				)
			);

			update_option( 'edd_enhanced_sales_reports_subscription_shown', 'y', false );

			wp_send_json(
				array(
					'processed' => 1,
				)
			);
		}

		/**
		 * Update the flag for susbscription popup
		 *
		 * @return void
		 * @since 1.0.2
		 * @access public
		 */
		public function subscription_shown() {

			update_option( 'edd_enhanced_sales_reports_subscription_shown', 'y', false );

			wp_send_json(
				array(
					'processed' => 1,
				)
			);
		}

		/**
		 * Add Reporting Menu
		 *
		 * @return void
		 * @since 1.0.0
		 * @access public
		 */
		public function create_reporting_menu() {
			add_submenu_page(
				'edit.php?post_type=download',
				esc_html__( 'Enhanced Sales Reports Pro', 'edd-enhanced-sales-reports' ),
				esc_html__( 'Enhanced Reports', 'edd-enhanced-sales-reports' ),
				'manage_options',
				'edd-enhanced-sales-reports',
				array( $this, 'generate_reporting_page' )
			);
		}

		/**
		 * Rearranges Admin Menu Items.
		 */
		public function re_order_menu_items() {
			global $submenu;

			$edd_reports_index            = 0;
			$enhanced_sales_reports_index = 0;

			foreach ( $submenu as $page => $items ) {
				if ( 'edit.php?post_type=download' === $page ) {

					foreach ( $items as $sub_index => $sub_item ) {
						if ( 'edd-reports' === $sub_item['2'] ) {
							$edd_reports_index = $sub_index;
						}
						if ( 'edd-enhanced-sales-reports' === $sub_item['2'] ) {
							$enhanced_sales_reports_index = $sub_index;
						}
					}

					if ( ! empty( $edd_reports_index ) && ! empty( $enhanced_sales_reports_index ) ) {
						$new_items                   = array();
						$enhanced_sales_reports_item = $submenu['edit.php?post_type=download'][ $enhanced_sales_reports_index ];

						foreach ( $items as $sub_index => $sub_item ) {
							if ( 'edd-enhanced-sales-reports' === $sub_item['2'] ) {
								continue;
							}
							$new_items[] = $sub_item;
							if ( $sub_index == $edd_reports_index ) {
								$new_items[] = $enhanced_sales_reports_item;
							}
						}

						// This is a required feature in the plugin for better usability.
						$submenu[ $page ] = $new_items; // phpcs:ignore
					}
				}
			}
		}

		/**
		 * Generates reporting page in admin paenel
		 *
		 * @return void
		 */
		public function generate_reporting_page() {
			require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting-page.php';
		}

		/**
		 * Loads Settings page
		 *
		 * @return void
		 */
		public function edd_enhanced_sales_reports_load_main_page() {
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/promos-configuration.php';
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/settings.php';
		}

		/**
		 * Shows a notice in admin panel prompting user to leave a review
		 *
		 * @return void
		 */
		private function review_notice_callout() {
			// AJAX action hook to disable the 'review request' notice.
			add_action( 'wp_ajax_edd_enhanced_sales_reports_review_notice', array( $this, 'dismiss_review_notice' ) );

			if ( ! get_option( 'edd_enhanced_sales_reports_review_time' ) ) {
				$review_time = time() + 7 * DAY_IN_SECONDS;
				add_option( 'edd_enhanced_sales_reports_review_time', $review_time, '', false );
			}

			if (
				is_admin() &&
				get_option( 'edd_enhanced_sales_reports_review_time' ) &&
				get_option( 'edd_enhanced_sales_reports_review_time' ) < time() &&
				! get_option( 'edd_enhanced_sales_reports_dismiss_review_notice' )
			) {
				add_action( 'admin_notices', array( $this, 'notice_review' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'notice_review_script' ) );
			}
		}

		/**
		 * Disables the notice about leaving a review.
		 */
		public function dismiss_review_notice() {
			update_option( 'edd_enhanced_sales_reports_dismiss_review_notice', true, false );
			wp_die();
		}

		/**
		 * Ask the user to leave a review for the plugin.
		 */
		public function notice_review() {

			global $current_user;
			wp_get_current_user();
			$user_n = '';

			if ( ! empty( $current_user->display_name ) ) {
				$user_n = ' ' . $current_user->display_name;
			}

			echo "<div id='edd-enhanced-sales-reports-review' class='notice notice-info is-dismissible'><p>" .
				/* translators: %1$s User Name, %2$s Plugin Name*/
				 sprintf( esc_html__( 'Hi%1$s, Thank you for using %2$s. Please don\'t forget to rate our plugin. We sincerely appreciate your feedback.', 'edd-enhanced-sales-reports' ), esc_html( $user_n ), '<b>' . esc_html( EDD_ENHANCED_SALES_REPORTS_NAME ) . '</b>' )
				 .
				 '<br><a target="_blank" href="' . esc_attr( EDD_ENHANCED_SALES_REPORTS_REVIEW_URL ) . '" class="button-secondary">' . esc_html__( 'Post Review', 'edd-enhanced-sales-reports' ) . '</a>' .
				 '</p></div>';
		}

		/**
		 * Adds a link to Ordered Products Report Filtered for This customer
		 *
		 * @param \EDD_Customer $customer Customer object.
		 * */
		public function link_to_ordered_products_from_customer_profile( $customer ) {
			echo '<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-ordered-products&customer_id=' . esc_attr( $customer->id ) . '&filter_date_range=' . esc_attr( edd_enhanced_sales_reports_get_oldest_order_date() ) . '+-+' . esc_attr( edd_enhanced_sales_reports_get_latest_order_date() ) . '" class="button" style="float:right;">' . esc_html__( 'Ordered Products', 'edd-enhanced-sales-reports' ) . '</a>';
		}

		/**
		 * Add Products column to Payments Table provided that
		 * setting is not disabled
		 *
		 * @param array $columns Current columns array.
		 *
		 * @return array|mixed
		 */
		public function add_products_column_to_payments_table( $columns ) {

			$settings = edd_enhanced_sales_reports_get_settings();

			if ( 0 == $settings['show_products_in_payments'] ) {
				return $columns;
			}

			$new_columns = array();

			foreach ( $columns as $column_key => $column_title ) {
				if ( 'amount' == $column_key ) {
					$new_columns['products'] = __( 'Product(s)', 'edd-enhanced-sales-reports' );
				}

				$new_columns[ $column_key ] = $column_title;
			}

			return $new_columns;
		}

		/**
		 * Prints product name in the custom products column
		 * on Payment History Table
		 *
		 * @param string $value Current Value.
		 * @param int    $order_id The Order ID being parsed.
		 * @param string $column_name Internal name for the column.
		 *
		 * @return mixed|string
		 */
		public function add_products_list_to_column( $value, $order_id, $column_name ) {

			if ( 'products' === $column_name ) {
				global $wpdb;
				$products = $wpdb->get_results( $wpdb->prepare( "SELECT product_name, quantity FROM {$wpdb->prefix}edd_order_items WHERE order_id=%d", $order_id ) );

				$value = '';
				foreach ( $products as $product ) {
					$value .= '<div>' . esc_html( $product->product_name ) . ' x ' . esc_html( $product->quantity ) . '</div>';
				}
			}

			return $value;
		}

		/**
		 * Loads the inline script to dismiss the review notice.
		 */
		public function notice_review_script() {

			if ( EDD_ENHANCED_SALES_REPORTS_LOAD_NON_MIN_SCRIPTS ) {
				$suffix = '';
			} else {
				$suffix = '.min';
			}

			wp_enqueue_script(
				'edd_enhanced_sales_reports_deactivation_script',
				EDD_ENHANCED_SALES_REPORTS_URL . 'assets/js/review' . $suffix . '.js',
				array( 'jquery' ),
				EDD_ENHANCED_SALES_REPORTS_VER,
				true
			);
		}

		/**
		 * Add deactivate modal layout.
		 */
		public function add_deactive_modal() {
			global $pagenow;

			if ( 'plugins.php' !== $pagenow ) {
				return;
			}

			include EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/deactivation-form.php';
		}

		/**
		 * Called after the user has submitted his reason for deactivating the plugin.
		 *
		 * @since  1.0.0
		 */
		public function edd_enhanced_sales_reports_deactivation() {

			check_ajax_referer( 'edd_enhanced_sales_reports_deactivation_nonce', 'edd_enhanced_sales_reports_deactivation_nonce' );

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die();
			}

			if ( isset( $_POST['reason'] ) ) {
				$reason_id = sanitize_text_field( wp_unslash( $_POST['reason'] ) );
			} else {
				$reason_id = 1;
			}

			if ( empty( $reason_id ) ) {
				wp_die();
			}

			if ( isset( $_POST['reason_detail'] ) ) {
				$reason_info = sanitize_text_field( wp_unslash( $_POST['reason_detail'] ) );
			} else {
				$reason_info = esc_html__( 'Unknown reason', 'edd-enhanced-sales-reports' );
			}

			if ( '1' == $reason_id ) {
				$reason_text = 'I only needed the plugin for a short period';
			} elseif ( '2' == $reason_id ) {
				$reason_text = 'I found a better plugin';
			} elseif ( '3' == $reason_id ) {
				$reason_text = 'The plugin broke my site';
			} elseif ( '4' == $reason_id ) {
				$reason_text = 'The plugin suddenly stopped working';
			} elseif ( '5' == $reason_id ) {
				$reason_text = 'I no longer need the plugin';
			} elseif ( '6' == $reason_id ) {
				$reason_text = 'It\'s a temporary deactivation. I\'m just debugging an issue.';
			} elseif ( '7' == $reason_id ) {
				$reason_text = 'Other';
			}

			$cuurent_user = wp_get_current_user();

			$options = array(
				'plugin_name'       => EDD_ENHANCED_SALES_REPORTS_NAME,
				'plugin_version'    => EDD_ENHANCED_SALES_REPORTS_VER,
				'reason_id'         => $reason_id,
				'reason_text'       => $reason_text,
				'reason_info'       => $reason_info,
				'display_name'      => $cuurent_user->display_name,
				'email'             => get_option( 'admin_email' ),
				'website'           => get_site_url(),
				'blog_language'     => get_bloginfo( 'language' ),
				'wordpress_version' => get_bloginfo( 'version' ),
				'php_version'       => PHP_VERSION,
			);

			$to      = 'info@pluginsandsnippets.com';
			$subject = 'Plugin Uninstallation';

			$body  = '<p>Plugin Name: ' . EDD_ENHANCED_SALES_REPORTS_NAME . '</p>';
			$body .= '<p>Plugin Version: ' . EDD_ENHANCED_SALES_REPORTS_VER . '</p>';
			$body .= '<p>Reason: ' . $reason_text . '</p>';
			$body .= '<p>Reason Info: ' . $reason_info . '</p>';
			$body .= '<p>Admin Name: ' . $cuurent_user->display_name . '</p>';
			$body .= '<p>Admin Email: ' . get_option( 'admin_email' ) . '</p>';
			$body .= '<p>Website: ' . get_site_url() . '</p>';
			$body .= '<p>Website Language: ' . get_bloginfo( 'language' ) . '</p>';
			$body .= '<p>WordPress Version: ' . get_bloginfo( 'version' ) . '</p>';
			$body .= '<p>PHP Version: ' . PHP_VERSION . '</p>';

			$headers = array( 'Content-Type: text/html; charset=UTF-8' );

			wp_mail( $to, $subject, $body, $headers );
			wp_die();
		}

		/**
		 * Add a link to the settings page to the plugins list
		 *
		 * @param array  $links Action Links.
		 * @param string $file path to plugin file.
		 * @since  1.0.0
		 */
		public function edd_enhanced_sales_reports_action_links( $links, $file ) {

			static $this_plugin;

			if ( empty( $this_plugin ) ) {
				$this_plugin = 'edd-enhanced-sales-reports/edd-enhanced-sales-reports.php';
			}

			if ( $file == $this_plugin ) {
				/* translators: %1$s Opening Anchor for Settings Page, %2$s Closing Anchor for Settings */
				$settings_link = sprintf( esc_html__( '%1$s Settings %2$s', 'edd-lpct' ), '<a href="' . admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=settings' ) . '">', '</a>' );

				/* translators: %1$s Opening Anchor for Reports Page, %2$s Closing Anchor for Reports */
				$reports_url = sprintf( esc_html__( '%1$s Reports %2$s', 'edd-lpct' ), '<a href="' . admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports' ) . '">', '</a>' );

				/* translators: %1$s Opening Anchor for Pro Version */
				$pro_version_url = sprintf( esc_html__( '%1$s Upgrade to Pro %2$s', 'edd-lpct' ), '<a href="https://www.pluginsandsnippets.com/downloads/edd-enhanced-sales-reports-pro/" target="_blank" style="color:#10c026;font-weight:bold;">', '</a>' );

				array_unshift( $links, $reports_url );
				array_unshift( $links, $settings_link );

				if ( ! class_exists( 'EDD_Enhanced_Sales_Reports_Pro' ) ) {
					array_unshift( $links, $pro_version_url );
				}
			}

			return $links;
		}

		/**
		 * Helper function to run the database migration script.
		 */
		public function populate_lookup() {
			global $wpdb;

			$lookup_table = $wpdb->prefix . 'enhanced_sales_report';

			$migrator = new EDD_Enhanced_Sales_Reports_Migration();
			$migrator->migrate_edd_orders_to_lookup();

			// $lookup_table is false flagged by PHPCS.
			$total_orders       = $wpdb->get_var( "SELECT count(id) FROM {$lookup_table}" ); // phpcs:ignore
			$total_order_amount = $wpdb->get_var( "SELECT SUM(product_sub_total) FROM {$lookup_table}" ); // phpcs:ignore

			$message = esc_html__( 'Lookup Table has been populated successfully', 'edd-enhanced-sales-reports' );

			$message .= "\n" . esc_html__( 'Total Orders in Database: ', 'edd-enhanced-sales-reports' ) . $total_orders;
			$message .= "\n" . esc_html__( 'Total Earnings from Orders: ', 'edd-enhanced-sales-reports' ) . number_format( $total_order_amount, 2 );

			$response = array(
				'message' => $message,
			);
			wp_send_json( $response );
		}

		/**
		 * Returns database result for all reports after applying most filters.
		 *
		 * @param string $start_date Start date for the report.
		 * @param string $end_date End date for the report.
		 *
		 * @return array|object|null
		 */
		public static function get_report_data( $start_date, $end_date ) {
			global $wpdb;

			$query_placeholders = array(
				$start_date,
				$end_date . ' 23:59:59',
			);

			$query =
				"SELECT *
				FROM {$wpdb->prefix}enhanced_sales_report
				WHERE order_date BETWEEN %s AND %s
				";

			if ( isset( $_GET['filter_products'] ) && ! empty( $_GET['filter_products'] ) ) {
				$products    = map_deep( wp_unslash( $_GET['filter_products'] ), 'sanitize_text_field' );
				$product_ids = array();
				foreach ( $products as $product_id ) {
					$product_ids[] = intval( $product_id );
				}

				$query .= ' AND product_id IN (' . implode( ',', $product_ids ) . ')';
			}

			if ( isset( $_GET['filter_vendors'] ) && ! empty( $_GET['filter_vendors'] ) ) {
				$vendors    = map_deep( wp_unslash( $_GET['filter_vendors'] ), 'sanitize_text_field' );
				$vendor_ids = array();
				foreach ( $vendors as $vendor_id ) {
					$vendor_ids[] = intval( $vendor_id );
				}

				$query .= ' AND author_id IN (' . implode( ',', $vendor_ids ) . ')';
			}
			if ( isset( $_GET['filter_countries'] ) && ! empty( $_GET['filter_countries'] ) ) {
				$countries = map_deep( wp_unslash( $_GET['filter_countries'] ), 'sanitize_text_field' );
				foreach ( $countries as &$country ) {
					$country = "'" . esc_sql( $country ) . "'";
				}
				$query .= ' AND billing_country IN (' . implode( ',', $countries ) . ')';
			}

			if ( isset( $_GET['sale_type'] ) ) {
				if ( 'free' === $_GET['sale_type'] ) {
					$query .= ' AND product_amount=0';
				} elseif ( 'paid' === $_GET['sale_type'] ) {
					$query .= ' AND product_amount>0';
				}
			}

			if ( isset( $_GET['customer_id'] ) && ! empty( $_GET['customer_id'] ) ) {
				$query .= ' AND customer_id=%d';

				$query_placeholders[] = intval( wp_unslash( $_GET['customer_id'] ) );
			}

			if ( isset( $_GET['gateway'] ) && ! empty( $_GET['gateway'] ) && 'all' !== $_GET['gateway'] ) {
				$gateway_options = self::get_gateways_options();
				if ( array_key_exists( sanitize_text_field( wp_unslash( $_GET['gateway'] ) ), $gateway_options ) ) {
					$query .= ' AND gateway=%s';
					$query_placeholders[] = esc_sql( sanitize_text_field( wp_unslash( $_GET['gateway'] ) ) );
				}
			}

			if ( isset( $_GET['tax'] ) && ! empty( $_GET['tax'] ) && 'all' !== $_GET['tax'] ) {
				$tax_options = array( 'with_tax', 'no_tax' );
				if ( in_array( $_GET['tax'], $tax_options ) ) {
					if ( 'with_tax' === $_GET['tax'] ) {
						$query .= ' AND tax>0';
					} else {
						$query .= ' AND tax=0';
					}
				}
			}

			if ( isset( $_GET['subscriptions'] ) && ! empty( $_GET['subscriptions'] ) && 'all' !== $_GET['subscriptions'] ) {
				$subscription_options = array( 'subscriptions', 'no_subscriptions' );
				if ( in_array( $_GET['subscriptions'], $subscription_options ) ) {
					if ( 'no_subscriptions' === $_GET['subscriptions'] ) {
						$query .= ' AND subscription_id=0';
					} else {
						$query .= ' AND subscription_id=1';
					}
				}
			}

			if ( isset( $_GET['commission'] ) && ! empty( $_GET['commission'] ) && 'both' !== $_GET['commission'] ) {
				if ( 'has_commissions' === $_GET['commission'] ) {
					$query .= ' AND commission > 0';
				} else {
					$query .= ' AND commission <= 0';
				}
			}

			if ( isset( $_GET['customer_type'] ) && ! empty( $_GET['customer_type'] ) && 'both' !== $_GET['customer_type'] ) {
				if ( 'new' === $_GET['customer_type'] ) {
					$query .= ' AND is_existing_customer=0';
				} else {
					$query .= ' AND is_existing_customer=1';
				}
			}

			if ( isset( $GLOBALS['edd_sales_reports_limit_subscriptions'] ) ) {
				$query .= " AND order_id IN (SELECT DISTINCT subscription_id FROM {$wpdb->prefix}enhanced_sales_report WHERE subscription_id<>0)";
			}

			if ( ( isset( $_GET['earnings_from'] ) && ! empty( $_GET['earnings_from'] ) ) || ( isset( $_GET['earnings_to'] ) && ! empty( $_GET['earnings_to'] ) ) ) {
				$range_start = 0;
				$range_end   = 9999999999999999;

				if ( isset( $_GET['earnings_from'] ) && ! empty( $_GET['earnings_from'] ) ) {
					$range_start = floatval( $_GET['earnings_from'] );
				}

				if ( isset( $_GET['earnings_to'] ) && ! empty( $_GET['earnings_to'] ) ) {
					$range_end = floatval( $_GET['earnings_to'] );
				}

				if ( $range_start > $range_end ) {
					$range_start = $range_end;
				}

				$GLOBALS['edd_enhanced_sales_reports_earnings_range'] = array( $range_start, $range_end );
			}

			// $query has all variables sanitzited sanitized already.
			return $wpdb->get_results( $wpdb->prepare( $query, $query_placeholders ) ); // phpcs:ignore
		}

		/**
		 * Returns database result for subscription report after applying most filters.
		 *
		 * @param string $start_date start date for report.
		 * @param string $end_date end date for report.
		 * @param string $renewal_start_date renewal minimum date.
		 * @param string $renewal_end_date renewal maximum date.
		 *
		 * @return array|object|null
		 */
		public static function get_subscription_report_data( $start_date, $end_date, $renewal_start_date, $renewal_end_date ) {
			global $wpdb;

			$start_date         = esc_sql( $start_date );
			$end_date           = esc_sql( $end_date );
			$renewal_start_date = esc_sql( $renewal_start_date );
			$renewal_end_date   = esc_sql( $renewal_end_date );

			$query =
				"SELECT S.*
				FROM {$wpdb->prefix}edd_subscriptions S
				WHERE S.created BETWEEN '{$start_date}' AND '{$end_date} 23:59:59'
				AND S.expiration BETWEEN '{$renewal_start_date}' AND '{$renewal_end_date} 23:59:59'
				";

			if ( isset( $_GET['filter_products'] ) && ! empty( $_GET['filter_products'] ) ) {
				$products    = map_deep( wp_unslash( $_GET['filter_products'] ), 'sanitize_text_field' );
				$product_ids = array();
				foreach ( $products as $product_id ) {
					$product_ids[] = intval( $product_id );
				}

				$query .= ' AND S.product_id IN (' . implode( ',', $product_ids ) . ')';
			}

			if ( isset( $_GET['customer_id'] ) && ! empty( $_GET['customer_id'] ) ) {
				$query .= ' AND customer_id=' . intval( $_GET['customer_id'] );
			}

			if ( isset( $_GET['billing_cycle'] ) && ! empty( $_GET['billing_cycle'] ) ) {
				$query .= ' AND period=' . intval( $_GET['billing_cycle'] );
			}

			if ( isset( $_GET['status'] ) && ! empty( $_GET['status'] ) ) {
				$query .= ' AND status="' . esc_sql( sanitize_text_field( wp_unslash( $_GET['status'] ) ) ) . '"';
			}

			if ( ( isset( $_GET['renewal_amount_from'] ) && ! empty( $_GET['renewal_amount_from'] ) ) || ( isset( $_GET['renewal_amount_to'] ) && ! empty( $_GET['renewal_amount_to'] ) ) ) {
				$range_start = 0;
				$range_end   = 9999999999999999;

				if ( isset( $_GET['renewal_amount_from'] ) && ! empty( $_GET['renewal_amount_from'] ) ) {
					$range_start = floatval( $_GET['renewal_amount_from'] );
				}

				if ( isset( $_GET['renewal_amount_to'] ) && ! empty( $_GET['renewal_amount_to'] ) ) {
					$range_end = floatval( $_GET['renewal_amount_to'] );
				}

				if ( $range_start > $range_end ) {
					$range_start = $range_end;
				}

				$query .= " AND recurring_amount BETWEEN {$range_start} AND {$range_end}";
			}

			if ( ( isset( $_GET['renewal_days_from'] ) && ! empty( $_GET['renewal_days_from'] ) ) || ( isset( $_GET['renewal_days_to'] ) && ! empty( $_GET['renewal_days_to'] ) ) ) {
				$range_start = - 99999999;
				$range_end   = 9999999;

				if ( isset( $_GET['renewal_days_from'] ) && ! empty( $_GET['renewal_days_from'] ) ) {
					$range_start = intval( $_GET['renewal_days_from'] );
				}

				if ( isset( $_GET['renewal_days_to'] ) && ! empty( $_GET['renewal_days_to'] ) ) {
					$range_end = intval( $_GET['renewal_days_to'] );
				}

				if ( $range_start > $range_end ) {
					$range_start = $range_end;
				}

				$query .= " AND DATEDIFF( expiration, NOW() ) BETWEEN {$range_start} AND {$range_end}";
			}

			if ( isset( $_GET['renewal_month'] ) && ! empty( $_GET['renewal_month'] ) && 'all' !== $_GET['renewal_month'] ) {
				$query .= " AND MONTH(expiration)='" . intval( $_GET['renewal_month'] ) . "'";
			}

			if ( ( isset( $_GET['subscription_amount_from'] ) && ! empty( $_GET['subscription_amount_from'] ) ) || ( isset( $_GET['subscription_amount_to'] ) && ! empty( $_GET['subscription_amount_to'] ) ) ) {
				$range_start = 0;
				$range_end   = 9999999999999999;

				if ( isset( $_GET['subscription_amount_from'] ) && ! empty( $_GET['subscription_amount_from'] ) ) {
					$range_start = floatval( $_GET['subscription_amount_from'] );
				}

				if ( isset( $_GET['subscription_amount_to'] ) && ! empty( $_GET['subscription_amount_to'] ) ) {
					$range_end = floatval( $_GET['subscription_amount_to'] );
				}

				if ( $range_start > $range_end ) {
					$range_start = $range_end;
				}

				$range_start = esc_sql( $range_start );
				$range_end   = esc_sql( $range_end );

				$query .= " AND initial_amount BETWEEN {$range_start} AND {$range_end}";
			}

			// all components of query are individually sanitized above.
			return $wpdb->get_results( $query ); // phpcs:ignore
		}

		/**
		 * Returns name of vendors for provided.
		 *
		 * @param array $vendor_ids IDs of vendors for which data is required.
		 *
		 * @return array
		 */
		public static function get_vendor_names( $vendor_ids ) {
			global $wpdb;

			if ( empty( $vendor_ids ) ) {
				return array();
			}

			foreach ( $vendor_ids as &$vendor_id ) {
				$vendor_id = intval( $vendor_id );
			}

			$query =
				"SELECT ID, display_name, user_login
				FROM {$wpdb->users}
				WHERE ID IN (" . implode( ',', $vendor_ids ) . ')';

			// $vendor_ids are typecasted to integers already above.
			$vendor_data  = $wpdb->get_results( $query ); // phpcs:ignore
			$vendor_array = array();

			foreach ( $vendor_data as $vendor_row ) {
				if ( empty( $vendor_row->display_name ) ) {
					$vendor_array[ $vendor_row->ID ] = $vendor_row->user_login;
				} else {
					$vendor_array[ $vendor_row->ID ] = $vendor_row->display_name;
				}
			}

			foreach ( $vendor_ids as $vendor_id ) {
				if ( ! array_key_exists( $vendor_id, $vendor_array ) ) {
					$vendor_array[ $vendor_id ] = __( '(Unknown)', 'edd-enhanced-sales-reports' );
				}
			}

			return $vendor_array;
		}

		/**
		 * Returns customer names for provided customer ids
		 *
		 * @param array   $customer_ids Ids of customers for which names are required.
		 * @param boolean $append_email Whether or not email should be appended.
		 *
		 * @return array
		 */
		public static function get_customer_names( $customer_ids, $append_email = false ) {
			global $wpdb;

			if ( empty( $customer_ids ) ) {
				return array();
			}

			foreach ( $customer_ids as &$customer_id ) {
				$customer_id = intval( $customer_id );
			}

			$query =
				"SELECT id, name, email
				FROM {$wpdb->prefix}edd_customers
				WHERE id IN (" . implode( ',', $customer_ids ) . ')';

			// $customer_ids in $query are typecasted to integers already.
			$customers_data  = $wpdb->get_results( $query ); // phpcs:ignore
			$customers_array = array();

			foreach ( $customers_data as $customer ) {
				$customers_array[ $customer->id ] = $customer->name;
				if ( $append_email ) {
					$customers_array[ $customer->id ] .= ' (' . $customer->email . ')';
				}
			}

			// generate names of customers that are not present in edd_customers.
			$other_customers =
				"SELECT DISTINCT customer_id, email
				FROM {$wpdb->prefix}enhanced_sales_report
				WHERE customer_id NOT IN (
					SELECT id
					FROM {$wpdb->prefix}edd_customers
					WHERE id IN (" . implode( ',', $customer_ids ) . ')
				)';

			// $customer_ids in query are already typecasted to integers.
			$other_customers = $wpdb->get_results( $other_customers ); // phpcs:ignore
			foreach ( $other_customers as $customer ) {
				$customers_array[ $customer->customer_id ] = $customer->email;
			}

			foreach ( $customer_ids as $customer_id ) {
				if ( ! isset( $customers_array[ $customer_id ] ) ) {
					$customers_array[ $customer_id ] = '(ID: ' . $customer_id . ')';
				}
			}

			return $customers_array;
		}

		/**
		 * Returns IDs of vendors against provided User IDs.
		 *
		 * @param array $user_ids IDs of users for which vendor ids are needed.
		 *
		 * @return array
		 */
		public static function get_fes_vendor_ids( $user_ids ) {
			global $wpdb;

			// if FES is not active, then bail off.
			if ( ! class_exists( 'EDD_Front_End_Submissions' ) ) {
				return array();
			}

			if ( empty( $user_ids ) ) {
				return array();
			}

			foreach ( $user_ids as &$user_id ) {
				$user_id = intval( $user_id );
			}

			$mapping = array();

			// $user_ids are typecasted to integers already.
			$vendors = $wpdb->get_results( "SELECT id, user_id FROM {$wpdb->prefix}fes_vendors WHERE user_id IN (" . implode( ',', $user_ids ) . ')' ); // phpcs:ignore

			foreach ( $vendors as $vendor ) {
				$mapping[ $vendor->user_id ] = $vendor->id;
			}

			return $mapping;
		}

		/**
		 * Returns names of Gateways from database.
		 *
		 * @return array
		 */
		public static function get_gateways_options() {
			global $wpdb;

			$gateway_options = array();
			$gateways        = $wpdb->get_col( "SELECT DISTINCT gateway FROM {$wpdb->prefix}enhanced_sales_report" );

			foreach ( $gateways as $gateway ) {
				$gateway_options[ $gateway ] = ucwords( str_replace( '_', ' ', $gateway ) );
			}

			return $gateway_options;
		}

		/**
		 * Returns names of products for provided IDs.
		 *
		 * @param array $product_ids IDs of products for which names are needed.
		 *
		 * @return array
		 */
		public static function get_product_names( $product_ids ) {
			global $wpdb;

			if ( empty( $product_ids ) ) {
				return array();
			}

			$products_array = array();

			foreach ( $product_ids as &$product_id ) {
				$product_id = intval( $product_id );

				$products_array[ $product_id ] = __( 'ID: ', 'edd-enhanced-sales-reports' ) . $product_id;
			}

			$query =
				"SELECT ID, post_title
				FROM {$wpdb->posts}
				WHERE ID IN (" . implode( ',', $product_ids ) . ')';

			// $product_ids are typecasted to integers already.
			$products_data = $wpdb->get_results( $query ); // phpcs:ignore

			foreach ( $products_data as $product ) {
				if ( empty( $product->post_title ) ) {
					continue;
				}

				$products_array[ $product->ID ] = $product->post_title;
			}

			return $products_array;
		}

		/**
		 * Registers Dashboard Widget.
		 *
		 * @return void
		 */
		public function register_dashboard_widget() {
			wp_add_dashboard_widget(
				'edd_enhanced_sales_reports_dashboard_widget',
				__( 'Enhanced Sales Report Summary', 'edd-enhanced-sales-reports' ),
				array( $this, 'edd_enhanced_sales_reports_generate_dashboard_widget' )
			);
		}

		/**
		 * Generates markup for Dashboard Widget.
		 *
		 * @return void
		 */
		public function edd_enhanced_sales_reports_generate_dashboard_widget() {
			require_once EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/dashboard-widget.php';
		}

		/**
		 * Tells whether provided range is a valid range or not.
		 *
		 * @param string $range Name of range.
		 *
		 * @return bool
		 */
		private function is_valid_dashboard_range( $range ) {
			$valid_intervals = array(
				'today',
				'yesterday',
				'last_7_days',
				'last_30_days',
				'this_month',
				'last_month',
				'this_year',
				'last_year',
				'lifetime',
			);

			return in_array( $range, $valid_intervals );
		}

		/**
		 * Returns start and end date for provided range.
		 *
		 * @param string $range Range for which dates are required.
		 *
		 * @return array|int[]
		 */
		private function get_start_end_date_by_range_name( $range ) {
			$start = time();
			$end   = time();

			switch ( $range ) {
				case 'yesterday':
					$end = strtotime( 'yesterday' );
					$start = strtotime( 'yesterday' );
					break;

				case 'last_7_days':
					$start = strtotime( '-7 days' );
					break;

				case 'last_30_days':
					$start = strtotime( '-30 days' );
					break;

				case 'this_month':
					$start = strtotime( 'first day of this month' );
					$end   = strtotime( 'last day of this month' );
					break;

				case 'last_month':
					$start = strtotime( 'first day of last month' );
					$end   = strtotime( 'last day of last month' );
					break;

				case 'this_year':
					$start = strtotime( gmdate( 'Y-01-01' ) );
					$end   = strtotime( gmdate( 'Y-12-31' ) );
					break;

				case 'last_year':
					$start = strtotime( ( gmdate( 'Y' ) - 1 ) . '-01-01' );
					$end   = strtotime( ( gmdate( 'Y' ) - 1 ) . '-12-31' );
					break;

				case 'lifetime':
					$start = 0;
					$end   = 0;
			}

			if ( ! empty( $start ) ) {
				$range = array(
					gmdate( 'Y-m-d', $start ),
					gmdate( 'Y-m-d', $end ),
				);
			} else {
				$range = array(
					0, // start date.
					0, // end date.
				);
			}

			return $range;
		}

		/**
		 * Returns filtered data from generated cache files.
		 *
		 * @return void
		 */
		public function fetch_filtered() {
			if ( isset( $_GET['cache'] ) ) {
				$cache      = basename( sanitize_text_field( wp_unslash( $_GET['cache'] ) ) );
			} else {
				wp_die();
			}

			$cache_file = EDD_ENHANCED_SALES_REPORTS_CACHE . $cache;

			$type = ( isset( $_GET['type'] ) ? sanitize_text_field( wp_unslash( $_GET['type'] ) ) : 'by-products' );

			switch ( $type ) {
				case 'by-ordered-products':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_ordered_products( $cache_file ) );
					break;

				case 'by-orders':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_orders( $cache_file ) );
					break;

				case 'by-country':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_country( $cache_file ) );
					break;

				case 'by-state':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_state( $cache_file ) );
					break;

				case 'by-customer':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_customer( $cache_file ) );
					break;

				case 'by-vendor':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_vendor( $cache_file ) );
					break;

				case 'by-subscriptions':
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_subscriptions( $cache_file ) );
					break;

				default:
					wp_send_json( EDD_Enhanced_Sales_Reports_Filtering::by_products( $cache_file ) );
					break;
			}
		}

		/**
		 * Returns Top Products provided for given interval in post data.
		 *
		 * @return void
		 */
		public function fetch_top_products() {
			global $wpdb;
			$lookup_table = $wpdb->prefix . 'enhanced_sales_report';
			$interval     = 'today';

			check_ajax_referer( 'edd_enhanced_sales_reports_top_products_nonce', 'security' );

			if ( isset( $_POST['interval'] ) && $this->is_valid_dashboard_range( sanitize_text_field( wp_unslash( $_POST['interval'] ) ) ) ) {
				$interval = sanitize_text_field( wp_unslash( $_POST['interval'] ) );
			}

			$output = array(
				'table' => '',
			);

			$range = $this->get_start_end_date_by_range_name( $interval );
			$where = '';
			if ( ! empty( $range[0] ) ) {
				$where = "WHERE DATE(order_date) >= '{$range[0]}' AND DATE(order_date) <= '{$range[1]}'";
			}

			$top_products =
				"SELECT product_id, product_name, COUNT(DISTINCT order_id) as total_orders, SUM( product_sub_total ) as total_sales
				FROM {$lookup_table}
				$where
				GROUP BY product_id
				ORDER BY total_sales DESC
				LIMIT 10";
			$top_products = $wpdb->get_results( $top_products ); // phpcs:ignore

			$markup = '';

			if ( count( $top_products ) > 0 ) {
				$currency = edd_currency_symbol();

				foreach ( $top_products as $product ) {
					$markup .=
						'<tr>
							<td><a href="' . admin_url( 'post.php?post=' . $product->product_id . '&action=edit' ) . '">' . $product->product_id . '</a></td>
							<td><a href="' . admin_url( 'post.php?post=' . $product->product_id . '&action=edit' ) . '">' . edd_enhanced_sales_reports_strip_product_option( $product->product_name ) . '</a></td>
							<td class="edd-esr-align-right"><a href="' . admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-orders&filter_date_range=2010-01-01+-+' . gmdate( 'Y-m-d' ) . '&filter_products[]=' . $product->product_id ) . '">' . number_format( $product->total_orders, 0 ) . '</a></td>
							<td class="edd-esr-align-right">' . $currency . number_format( $product->total_sales, 0 ) . '</td>
						</tr>';
				}
			} else {
				$markup = '<tr><td colspan="4">' . __( 'Not enough data', 'edd-enhanced-sales-reports' ) . '</td></tr>';
			}

			$output['table'] = $markup;

			wp_send_json( $output );
		}

		/**
		 * Returns top customers for ajax call.
		 *
		 * @return void
		 */
		public function fetch_top_customers() {
			global $wpdb;

			$lookup_table = $wpdb->prefix . 'enhanced_sales_report';
			$interval     = 'today';
			$admin_url    = admin_url( '/' );

			check_ajax_referer( 'edd_enhanced_sales_reports_top_customers_nonce', 'security' );

			if ( isset( $_POST['interval'] ) && $this->is_valid_dashboard_range( sanitize_text_field( wp_unslash( $_POST['interval'] ) ) ) ) {
				$interval = sanitize_text_field( wp_unslash( $_POST['interval'] ) );
			}

			$output = array(
				'table' => '',
			);

			$range = $this->get_start_end_date_by_range_name( $interval );

			$range[0] = esc_sql( $range[0] );
			$range[1] = esc_sql( $range[1] );

			$where = '';
			if ( ! empty( $range[0] ) ) {
				$where = " AND DATE(order_date) >= '{$range[0]}' AND DATE(order_date) <= '{$range[1]}'";
			}

			$top_customers =
				"SELECT customer_id, product_name, COUNT(DISTINCT order_id) as total_orders, SUM( product_sub_total ) as total_sales
				FROM {$lookup_table}
				WHERE customer_id <> 0
				{$where}
				GROUP BY customer_id
				ORDER BY total_sales DESC
				LIMIT 10";

			// query parts are individually sanitized above.
			$top_customers = $wpdb->get_results( $top_customers ); // phpcs:ignore

			$markup = '';

			if ( count( $top_customers ) > 0 ) {
				$currency = edd_currency_symbol();

				$customer_ids = array();
				foreach ( $top_customers as $customer ) {
					$customer_ids[] = intval( $customer->customer_id );
				}

				$customers_ids_map = array();

				if ( ! empty( $customer_ids ) ) {
					// $customer_ids are typecasted to integers above.
					$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore

					foreach ( $customers_query as $customer ) {
						$customers_ids_map[ $customer->id ] = $customer->name;
					}
				}

				foreach ( $top_customers as $customer ) {
					$customer_url = $admin_url . 'edit.php?post_type=download&page=edd-customers&view=overview&id=' . $customer->customer_id;
					$markup      .=
						'<tr>
							<td><a href="' . $customer_url . '">' . $customer->customer_id . '</a></td>
							<td><a href="' . $customer_url . '">' . ( isset( $customers_ids_map[ $customer->customer_id ] ) ? $customers_ids_map[ $customer->customer_id ] : __( '(Unknown)', 'edd-enhanced-sales-reports' ) ) . '</a></td>
							<td class="edd-esr-align-right"><a href="' . admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-orders&filter_date_range=2010-01-01+-+' . gmdate( 'Y-m-d' ) . '&customer_id=' . $customer->customer_id ) . '">' . number_format( $customer->total_orders, 0 ) . '</a></td>
							<td class="edd-esr-align-right">' . $currency . number_format( $customer->total_sales, 0 ) . '</td>
						</tr>';
				}
			} else {
				$markup = '<tr><td colspan="4">' . __( 'Not enough data', 'edd-enhanced-sales-reports' ) . '</td></tr>';
			}

			$output['table'] = $markup;

			wp_send_json( $output );
		}

		/**
		 * Returns filtered ajax results for customers dropdown in filters for select2.
		 *
		 * @return void
		 */
		public static function get_dynamic_select_options() {

			global $wpdb;

			$customers_table = "{$wpdb->prefix}edd_customers";
			$lookup_table    = "{$wpdb->prefix}enhanced_sales_report";
			$st              = '';

			check_admin_referer( 'edd_enhanced_sales_reports_reporting_lookup_nonce', 'security' );

			if ( isset( $_POST['q'] ) && ! empty( $_POST['q'] ) ) {
				$st = esc_sql( sanitize_text_field( wp_unslash( $_POST['q'] ) ) );
			}

			if ( isset( $_POST['type'] ) ) {
				$type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
			} else {
				$type = '';
			}

			$limit  = 30;
			$offset = 0;

			$page = 1;

			if ( isset( $_POST['page'] ) ) {
				$page = intval( $_POST['page'] );

				if ( 1 > $page ) {
					$page = 1;
				}
			}

			$offset = ( $page - 1 ) * $limit;

			$query =
				"SELECT DISTINCT L.customer_id, L.email, C.name
				FROM {$lookup_table} L
				LEFT JOIN {$customers_table} C ON C.id=L.customer_id ";

			if ( ! empty( $st ) ) {
				$query .= " WHERE L.email LIKE '%{$st}%' OR C.name LIKE '%{$st}%' ";
			}

			$count_query = str_replace( 'DISTINCT L.customer_id, L.email, C.name', 'COUNT(DISTINCT L.customer_id)', $query );

			// Query variables are sanitized already above individually.
			$total_matches = $wpdb->get_var( $count_query ); // phpcs:ignore
			$total_pages   = ceil( $total_matches / $limit );

			$query .= " LIMIT {$offset}, {$limit}";

			// Query variables are sanitized already above individually.
			$customers = $wpdb->get_results( $query ); //phpcs:ignore

			$results = array();

			foreach ( $customers as $customer ) {

				if ( ! is_null( $customer->name ) && ! empty( $customer->name ) ) {
					$customer_name = $customer->name . ' (' . $customer->email . ')';
				} else {
					$customer_name = $customer->email;
				}

				$results[] = array(
					'id'   => $customer->customer_id,
					'text' => $customer_name,
				);
			}

			$output = array(
				'results'    => $results,
				'pagination' => array(
					'more' => $page < $total_pages,
				),
			);

			wp_send_json( $output );
		}
	}
}
