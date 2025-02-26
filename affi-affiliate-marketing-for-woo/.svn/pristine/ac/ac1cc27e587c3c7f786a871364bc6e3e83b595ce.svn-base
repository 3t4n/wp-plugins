<?php

namespace AffiAffiliate\Admin;

defined( 'ABSPATH' ) || exit;

use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\QueryDB;

class AFAdmin {
	protected static $instance = null;
	protected $settings;
	protected $query;

	public function __construct() {
		$this->settings = Data::instance();
		$this->query    = QueryDB::instance();
		add_action( 'admin_menu', [ $this, 'admin_menu_page' ] );
		add_filter( 'set-screen-option', array( $this, 'save_screen_options' ), 10, 3 );

		$wc_current_version = get_option( 'woocommerce_version' );
		$hpos_custom_table  = ( get_option( 'woocommerce_feature_custom_order_tables_enabled' ) === 'yes' || get_option( 'woocommerce_custom_orders_table_enabled' ) === 'yes' ) && get_option( 'woocommerce_custom_orders_table_data_sync_enabled' ) === 'no';
		if ( $hpos_custom_table ) {
			add_filter( 'manage_woocommerce_page_wc-orders_columns', array( $this, 'add_order_columns' ) );
			add_action( 'manage_woocommerce_page_wc-orders_custom_column', array( $this, 'column_callback_order' ), 10, 2 );
		} else {
			add_filter( 'manage_edit-shop_order_columns', array( $this, 'add_order_columns' ) );
			add_action( 'manage_shop_order_posts_custom_column', array( $this, 'column_callback_order' ), 10, 2 );
		}

//		add_action('woocommerce_order_status_changed', array( $this, 'add_order_item_meta' ), 10, 3);
//		add_action ( 'save_post_shop_order',	array( $this, 'add_order_item_meta' ), 10, 3 );

		add_action( 'wp_ajax_affi_search_user', array( AFAffiliates::instance(), 'affi_search_user' ) );
		add_action( 'wp_ajax_affi_create_affiliate_user', array(
			AFAffiliates::instance(),
			'affi_create_affiliate_user'
		) );
		add_action( 'wp_ajax_affi_edit_affiliate_user', array( AFAffiliates::instance(), 'affi_edit_affiliate_user' ) );
		add_action( 'wp_ajax_affi_delete_affiliate_user', array(
			AFAffiliates::instance(),
			'affi_delete_affiliate_user'
		) );
		add_action( 'wp_ajax_affi_search_affiliate_user', array( AFPayout::instance(), 'affi_search_affiliate_user' ) );
		add_action( 'wp_ajax_affi_affiliate_payment_info', array(
			AFPayout::instance(),
			'affi_affiliate_payment_info'
		) );

		add_action( 'wp_ajax_affi_get_notification', array( AFNotifications::instance(), 'affi_get_notification' ) );
		add_action( 'wp_ajax_nopriv_affi_get_notification', array(
			AFNotifications::instance(),
			'affi_get_notification'
		) );
		add_action( 'wp_ajax_affi_create_notification', array(
			AFNotifications::instance(),
			'affi_create_notification'
		) );
		add_action( 'wp_ajax_nopriv_affi_create_notification', array(
			AFNotifications::instance(),
			'affi_create_notification'
		) );
		add_action( 'wp_ajax_affi_edit_notification', array( AFNotifications::instance(), 'affi_edit_notification' ) );
		add_action( 'wp_ajax_nopriv_affi_edit_notification', array(
			AFNotifications::instance(),
			'affi_edit_notification'
		) );
		add_action( 'wp_ajax_affi_delete_notification', array(
			AFNotifications::instance(),
			'affi_delete_notification'
		) );
		add_action( 'wp_ajax_nopriv_affi_delete_notification', array(
			AFNotifications::instance(),
			'affi_delete_notification'
		) );

		add_action( 'wp_ajax_affi_get_reports', [ AFReport::instance(), 'affi_get_reports' ] );
		add_action( 'wp_ajax_clear_db_overload_data', [ $this, 'clear_db_overload_data' ] );
	}

	function add_order_item_meta( $order_id, $old_status, $new_status ) {
		$key1     = 'affi_affiliate_id';
		$key2     = 'affi_affiliate_status';
		$key3     = 'affi_affiliate_rate';
		$value1   = 1;
		$value2   = 'success';
		$value3   = 6;
		$wc_order = wc_get_order( $order_id );
//        error_log('add_order_item_meta');
		$wc_order->update_meta_data( 'affi_affiliate_rate', $value3 );
		$wc_order->update_meta_data( 'affi_affiliate_status', $value2 );
		$wc_order->update_meta_data( 'affi_affiliate_id', $value1 );
		$wc_order->save_meta_data();
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function admin_menu_page() {
		global $submenu;

		$post_type_menus = [];
		if ( isset( $submenu['affi-affiliates-setting'] ) ) {
			$post_type_menus = $submenu['affi-affiliates-setting'];
			unset( $submenu['affi-affiliates-setting'] );
		}

		add_menu_page(
			esc_html__( 'AFFI - Affiliate', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'AFFI - Affiliate', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'manage_woocommerce' ),
			'affi-affiliates-setting',
			[ $this, 'callback_affiliates_setting' ],
			'dashicons-buddicons-forums',
			10
		);

		$st_affiliates = add_submenu_page(
			'affi-affiliates-setting',
			esc_html__( 'Affiliates', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'Affiliates', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'manage_woocommerce' ), // Role is Editor
			'affi-affiliates-setting',
			[ $this, 'callback_affiliates_setting' ],
			10
		);
		add_action( "load-$st_affiliates", array( $this, 'affiliates_screen_options' ) );
		$st_rank    = add_submenu_page(
			'affi-affiliates-setting',
			esc_html__( 'Rank', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'Rank', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'manage_woocommerce' ),// Role is Editor
			'affi-rank-setting',
			[ $this, 'callback_rank_setting' ],
			10
		);
		$st_report  = add_submenu_page(
			'affi-affiliates-setting',
			esc_html__( 'Report', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'Report', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'edit_pages' ),// Role is Editor
			'affi-report-setting',
			[ $this, 'callback_report_setting' ],
			10
		);
		$st_request = add_submenu_page(
			'affi-affiliates-setting',
			esc_html__( 'Request payout', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'Request payout', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'edit_pages' ),// Role is Editor
			'affi-request-payout',
			[ $this, 'callback_request_payout' ],
			10
		);
		add_action( "load-$st_request", array( $this, 'payout_screen_options' ) );
		$st_notify = add_submenu_page(
			'affi-affiliates-setting',
			esc_html__( 'Notifications', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'Notifications', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'edit_pages' ),// Role is Editor
			'affi-user-notify',
			[ $this, 'callback_user_notify' ],
			10
		);

		if ( ! empty( $post_type_menus ) ) {
			foreach ( $post_type_menus as $post_type_menu ) {
				$submenu['affi-affiliates-setting'][] = $post_type_menu;
			}
		}

		$settings = add_submenu_page(
			'affi-affiliates-setting',
			esc_html__( 'Settings', 'affi-affiliate-marketing-for-woo' ),
			esc_html__( 'Settings', 'affi-affiliate-marketing-for-woo' ),
			apply_filters( 'affi_menu_page_capability', 'manage_options' ),// Role is manage_options
			'affi-general-setting',
			[ $this, 'callback_settings_page' ],
			10
		);

		AffiEnv::set_page( 'setting_affiliates', $st_affiliates );
		AffiEnv::set_page( 'setting_rank', $st_rank );
		AffiEnv::set_page( 'setting_report', $st_report );
		AffiEnv::set_page( 'setting_request', $st_request );
		AffiEnv::set_page( 'setting_notify', $st_notify );
		AffiEnv::set_page( 'settings_page', $settings );
	}

	public function add_column_header( $cols ) {
		$cols['shortcode'] = esc_html__( 'Shortcode', 'affi-affiliate-marketing-for-woo' );

		return $cols;
	}

	public function add_column_content( $col, $post_id ) {

		switch ( $col ) {
			case 'shortcode':
				?>
                <div class="vi-ui icon fluid affi_shortcode_form_wrap"><input type="text"
                                                                              class="vi-ui input affi_shortcode_show"
                                                                              readonly
                                                                              value="[affi_forms ids=<?php echo "'" . esc_attr( $post_id ) . "'"; ?>]">
                    <i class="copy icon"></i><span class="affi_copied_tooltip" style="">Copied</span></div>
				<?php
				break;
		}

	}

	/**
	 * Add screen options to display the number of affiliates per page
	 */
	public function affiliates_screen_options() {
		$option = 'per_page';
		$args   = array(
			'label'   => esc_html__( 'Number of affiliates per page', 'affi-affiliate-marketing-for-woo' ),
			'default' => 20,
			'option'  => 'affi_affiliates_per_page'
		);
		add_screen_option( $option, $args );
	}

	/**
	 * Add screen options to display the number of payout per page
	 */
	public function payout_screen_options() {
		$option = 'per_page';
		$args   = array(
			'label'   => esc_html__( 'Number of payout per page', 'affi-affiliate-marketing-for-woo' ),
			'default' => 20,
			'option'  => 'affi_payout_per_page'
		);
		add_screen_option( $option, $args );
	}

	/**
	 * Save screen options to display the number of affiliates per page
	 *
	 * @param $status
	 * @param $option
	 * @param $value
	 *
	 * @return mixed
	 */
	public function save_screen_options( $status, $option, $value ) {
		if ( 'affi_affiliates_per_page' == $option || 'affi_payout_per_page' == $option ) {
			return $value;
		}

		return $status;
	}


	public function callback_affiliates_setting() {
		$affiliates_setting = AFAffiliates::instance();
		$affiliates_setting->render_setting_page();
	}

	public function callback_rank_setting() {
		$ranks_setting = AFRanks::instance();
		$ranks_setting->render_setting_page();
	}

	public function callback_report_setting() {
		$affiliates_setting = AFReport::instance();
		$affiliates_setting->render_setting_page();
	}

	public function callback_request_payout() {
		$affiliates_setting = AFPayout::instance();
		$affiliates_setting->render_setting_page();
	}

	public function callback_user_notify() {
		$notifications_setting = AFNotifications::instance();
		$notifications_setting->render_setting_page();
	}

	public function callback_settings_page() {
		$settings = AFSettings::instance();
		$settings->settings_page();
	}

	private function pro_option_field( $label ) {
		?>
        <p class="form-field ">
            <label for="crosssell_ids"><?php echo esc_html( $label ) ?></label>
            <a href="#" target="_blank"
               class="button"><?php echo esc_html__( 'Unlock this feature', 'affi-affiliate-marketing-for-woo' ) ?></a>
        </p>
		<?php
	}

	public function add_new_redirect() {
		$current_screen = get_current_screen();

		if ( ! empty( $current_screen->action ) && $current_screen->action == 'add' ) {
			global $post;
			$postid = $post->ID;
			wp_safe_redirect( admin_url( "post.php?post={$postid}&action=edit" ) );
			exit;
		}

	}

	public function add_order_columns( $columns ) {
		$columns['affi_status'] = esc_html__( 'Affiliate info', 'affi-affiliate-marketing-for-woo' );

		return $columns;
	}

	public function column_callback_order( $col_id, $order ) {

		if ( $col_id == 'affi_status' ) {
			if ( is_numeric( $order ) ) {
				$order = wc_get_order( $order );
			}
			$order_id  = $order->get_id();
			$order_stt = $order->get_status();
			$aff_id    = $order->get_meta( 'affi_affiliate_id', true );

			if ( $aff_id ) {
//				$email      = $order->get_billing_email();
				$aff_status = $order->get_meta( 'affi_affiliate_status', true );
				$aff_rate   = $order->get_meta( 'affi_affiliate_rate', true );
				$aff_user   = $this->query->get_aff_user_data_by_affiliate_id( $aff_id );
				if ( $aff_user ) {
					$display_name = $aff_user->display_name;
				} else {
					$display_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
				}

				echo "<div class='affi-order-affiliate affi-line-order-" . esc_attr( $order_id ) . "' data-status='" .
				     esc_attr( $aff_status ) . "'>" . esc_html($display_name) . "</div>";
				echo "<div class='affi-order-estimate '>" . esc_html_e( 'Estimate Value: ', 'affi-affiliate-marketing-for-woo' ) .
				     wp_kses_post( wc_price( (float) $aff_rate ) ) . "</div>";
			} else {
				esc_html_e( 'Direct', 'affi-affiliate-marketing-for-woo' );
			}
		}
	}

	public function clear_db_overload_data() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$type  = isset( $_POST['type'] ) ? sanitize_text_field( wp_unslash( $_POST['type'] ) ) : '';
		$range = isset( $_POST['range'] ) ? absint( wc_clean( wp_unslash( $_POST['range'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$d_now = current_time( 'U' );
		$d_now = $d_now - ( 86400 * (int) $range );

		switch ( $type ) {
			case 'payout':
				$success = $this->query->delete_payout_after_time( $d_now );
				break;
			case 'notify':
				$success = $this->query->delete_notify_after_time( $d_now );
				break;
			default:
				$success = false;
		}

		wp_send_json_success( $success );
	}
}
