<?php

namespace AffiAffiliate\Admin;

defined( 'ABSPATH' ) || exit;

use AffiAffiliate\Inc\ClassPayout;
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\QueryDB;
use WP_User_Query;

class AFPayout {
	protected static $instance = null;

	private $data = array();


	protected $settings;
	protected $functions;
	protected $query;

	/**
	 * Initialize class
	 */
	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct( $id = 0 ) {
		$this->settings  = Data::instance();
		$this->functions = AFFunctions::instance();
		$this->query     = QueryDB::instance();
	}

	public static function update( $id, $data ) {
		global $wpdb;

		$success = $wpdb->update( $wpdb->prefix . 'affi_payouts', $data, array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public static function insert( $data ) {
		global $wpdb;

		// Insert ticket to DB.
		$success = $wpdb->insert( $wpdb->prefix . 'affi_payouts', $data );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery

		if ( ! $success ) {
			return false;
		}

		return new AFAffiliates( $wpdb->insert_id );
	}

	/**
	 * Delete record from database
	 *
	 * @param $ticket - ticket object.
	 *
	 * @return boolean
	 */
	public static function delete( $refid ) {
		global $wpdb;

		$success = $wpdb->delete( $wpdb->prefix . 'affi_payouts', array( 'id' => $refid ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	/**
	 * Set data to create new object using direct data. Used in find method
	 *
	 * @param array $data - data to set for object.
	 *
	 * @return void
	 */
	public function set_data( $data ) {

		foreach ( $data as $var_name => $val ) {
			$this->data[ $var_name ] = $val !== null ? $val : '';
		}
	}

	public static function get_payouts( $args = array() ) {
		global $wpdb;
		$args = wp_parse_args( $args, array(
			'fields'  => '*',
			'where'   => '',
			'limit'   => 30,
			'offset'  => 0,
			'orderby' => 'data_created',
			'order'   => 'DESC',
		) );
		if ( isset( $args['fields'] ) && is_array( $args['fields'] ) ) {
			$args['fields'] = implode( ', ', $args['fields'] );
		}
		$query = "SELECT ref.*, us.user_nicename, us.user_email FROM {$wpdb->prefix}affi_payouts ref 
                    LEFT JOIN {$wpdb->base_prefix}users us ON user_id = us.ID LIMIT %d OFFSET %d ";

		return $wpdb->get_results( $wpdb->prepare( $query, $args['limit'], $args['offset'] ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	public static function get_payout_by_id( $id ) {
		global $wpdb;
		$query = "SELECT ref.*, us.user_login, us.display_name FROM {$wpdb->prefix}affi_payouts ref
                    LEFT JOIN {$wpdb->base_prefix}users us ON ref.user_id = us.ID WHERE ref.id=%d LIMIT 1";

		return $wpdb->get_results( $wpdb->prepare( $query, $id ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	public static function request_payout_count() {
		global $wpdb;

		$query = "SELECT COUNT(*) as aff_count FROM {$wpdb->prefix}affi_payouts WHERE 1";

		$query_data = $wpdb->get_results( $wpdb->prepare( $query ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( is_array( $query_data ) && isset( $query_data[0] ) ) {
			if ( isset( $query_data[0]['aff_count'] ) ) {

				return intval( $query_data[0]['aff_count'] );
			}
		}

		return 0;
	}

	public static function delete_affiliate( $id ) {
		global $wpdb;

		$success = $wpdb->delete( $wpdb->prefix . 'affi_payouts', array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public function render_setting_page() {
		$action = isset( $_REQUEST['action'] ) ? wc_clean( wp_unslash( $_REQUEST['action'] ) ) : false;// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		if ( $action && 'remove' === $action ) {
			$referral_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			if ( $referral_id ) {
				self::delete( $referral_id );
			}
			wp_safe_redirect( 'admin.php?page=affi-request-payout' );
		}
		if ( $action && isset( $_POST['affi_save_request_payout'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
			$data_payout = [
				'user_id'     => isset( $_POST['affi_referral_user'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_user'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'amount'      => isset( $_POST['affi_referral_amount'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_amount'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'type'        => isset( $_POST['affi_referral_type'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_type'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'payment'     => isset( $_POST['affi_referral_payment'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_payment'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'fee'         => isset( $_POST['affi_referral_fee'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_fee'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'status'      => isset( $_POST['affi_referral_status'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_status'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				'description' => isset( $_POST['affi_referral_description'] ) ? wc_clean( wp_unslash( $_POST['affi_referral_description'] ) ) : '',// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			];
			if ( empty( $data_payout['user_id'] ) || empty( $data_payout['amount'] ) ) {
				$notice = esc_html__( 'Please input require fields', 'affi-affiliate-marketing-for-woo' );
				self::load_edit_payout( '', 'new', $notice );
			} else {
				$referral_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				if ( $referral_id ) {
					$data_payout['date_modified'] = current_time( 'U' );
					$old_data_payout = self::get_payout_by_id( $referral_id );
					$payout_edit = self::update( $referral_id, $data_payout );
					if ( $data_payout['status'] == 'approved' && $payout_edit ) {
						$aff_info    = $this->query->get_affiliate_by_user_id( $data_payout['user_id'] );
						$aff_balance = (float) $aff_info['balance'];
						$aff_balance = $aff_balance + (float) $data_payout['amount'];
						if ( ! $old_data_payout || ! is_array( $old_data_payout ) || ! isset( $old_data_payout[0] ) ||
                             ! is_array( $old_data_payout[0] ) || ! isset( $old_data_payout[0]['status'] ) || $old_data_payout[0]['status'] != 'approved' ) {
							AFAffiliates::update( [ 'id' => $aff_info['id'], 'balance' => $aff_balance ] );
						}

						AFNotifications::instance()->send_user_notification( $data_payout['user_id'], 'withdraw', [ 'd_status' => $data_payout['status'] ] );
					} else {
						AFNotifications::instance()->send_user_notification( $data_payout['user_id'], 'payment_action', [ 'd_status' => $data_payout['status'] ] );
					}
					self::load_edit_payout( $referral_id, $action );
				} else {
					$data_payout['date_created'] = current_time( 'U' );

					$payout_new = self::affi_create_request_payout( $data_payout );
					if ( $data_payout['status'] == 'approved' && $payout_new ) {
						$aff_info    = $this->query->get_affiliate_by_user_id( $data_payout['user_id'] );
						$aff_balance = (float) $aff_info['balance'];
						$aff_balance = $aff_balance + (float) $data_payout['amount'];
						AFAffiliates::update( [ 'id' => $aff_info['id'], 'balance' => $aff_balance ] );

						AFNotifications::instance()->send_user_notification( $data_payout['user_id'], 'withdraw', [ 'd_status' => $data_payout['status'] ] );
					} else {
						AFNotifications::instance()->send_user_notification( $data_payout['user_id'], 'payment_action', [ 'd_status' => $data_payout['status'] ] );
					}
					wp_safe_redirect( 'admin.php?page=affi-request-payout' );
				}
			}
		} elseif ( $action && ( 'edit' === $action || 'new' === $action ) ) {
			$referral_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			if ( 'new' === $action && isset( $_REQUEST['user_id'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$n_user_id = isset( $_REQUEST['user_id'] ) ? wc_clean( wp_unslash( $_REQUEST['user_id'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				self::load_edit_payout( $n_user_id, $action );
			} else {
				self::load_edit_payout( $referral_id, $action );
			}
		} else {
			printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
            <a href="admin.php?page=affi-request-payout&amp;action=new" class="page-title-action affi-page-title-action">%s</a><hr class="wp-header-end">
            <form method="post" class="affi-payout-tabblenav-form">',
				esc_html__( "Request payout", 'affi-affiliate-marketing-for-woo' ),
				esc_html__( "Add Payout", 'affi-affiliate-marketing-for-woo' ) );
			$payout_class = ClassPayout::get_instance();
			$payout_class->prepare_items();
			$payout_class->display();
			printf( '</form></div>' );
		}
	}

	function villatheme_debug_log( $message ) {
		$file = trailingslashit( plugin_dir_path( __FILE__ ) ) . "debug.log";
		if ( ! file_exists( $file ) ) {
			fopen( $file, "a" );
		}
		$current = file_get_contents( $file );
		$current .= date( 'Y-m-d h:i:s' ) . ": " . $message . "\n";
		file_put_contents( $file, $current );
	}

	function load_edit_payout( $referral_id, $action, $notice = '' ) {
		if ( ! $referral_id && $action == 'edit' ) {
			printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
                <a href="admin.php?page=affi-request-payout&amp;action=edit" class="page-title-action affi-page-title-action">%s</a><hr class="wp-header-end"></div>',
				esc_html__( "Not available payout", 'affi-affiliate-marketing-for-woo' ),
				esc_html__( "New payout", 'affi-affiliate-marketing-for-woo' ) );

			return;
		}
		if ( $notice ) {
			printf( '<div class="notice notice-error"><p>%s</p></div>',
				esc_html( $notice ) );
		}
		if ( $action == 'new' ) {
			$st_title  = esc_html__( "New payout", 'affi-affiliate-marketing-for-woo' );
			$sv_title  = esc_html__( "Add payout", 'affi-affiliate-marketing-for-woo' );
			$i_user_id = '';
			if ( $referral_id ) {
				$i_user_id   = $referral_id;
				$i_user_data = $this->query->get_user_data_by_id( $referral_id );
				$i_aff_data  = $this->query->get_affiliate_by_user_id( $referral_id );
				if ( isset( $_REQUEST['user_amount'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$i_user_amount = isset( $_REQUEST['user_amount'] ) ? wc_clean( wp_unslash( $_REQUEST['user_amount'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				}
			}
			$payout_data = [
				'id'                        => '',
				'affi_referral_user'        => $i_user_id,
				'affi_referral_type'        => 'admin',
				'affi_referral_amount'      => isset( $i_user_amount ) ? $i_user_amount : 0,
				'affi_referral_fee'         => 0,
				'affi_referral_status'      => '',
				'affi_referral_payment'     => isset( $i_aff_data ) && isset( $i_aff_data['payment_info'] ) ? $i_aff_data['payment_info'] : '',
				'affi_referral_description' => '',
				'date_created'              => ''
			];
			if ( ! empty( $i_user_data ) && isset( $i_user_data['user_login'] ) && isset( $i_user_data['display_name'] ) ) {
				$payout_data['select2'] = [
					$i_user_id,
					$i_user_data['user_login'] . ' (' . $i_user_data['display_name'] . ')'
				];
			}
		} else {
			$get_payout_data = self::get_payout_by_id( $referral_id );
			if ( empty( $get_payout_data ) || ! is_array( $get_payout_data ) || ! isset( $get_payout_data[0] ) || empty( $get_payout_data[0] ) ) {
				printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
                <a href="admin.php?page=affi-request-payout&amp;action=edit" class="page-title-action affi-page-title-action">%s</a><hr class="wp-header-end"></div>',
					esc_html__( "Not available payout", 'affi-affiliate-marketing-for-woo' ),
					esc_html__( "New payout", 'affi-affiliate-marketing-for-woo' ) );

				return;
			}
			$get_payout_data = $get_payout_data[0];
			$payout_data     = [
				'id'                        => $get_payout_data['id'],
				'affi_referral_user'        => $get_payout_data['user_id'],
				'affi_referral_type'        => $get_payout_data['type'],
				'affi_referral_amount'      => $get_payout_data['amount'],
				'affi_referral_fee'         => $get_payout_data['fee'],
				'affi_referral_status'      => $get_payout_data['status'],
				'affi_referral_payment'     => $get_payout_data['payment'],
				'affi_referral_description' => $get_payout_data['description'],
				'select2'                   => [
					$get_payout_data['user_id'],
					$get_payout_data['user_login'] . ' (' . $get_payout_data['display_name'] . ')'
				],
				'date_created'              => $get_payout_data['date_created']
			];
			$st_title        = esc_html__( "Edit Affiliate Payout", 'affi-affiliate-marketing-for-woo' );
			$sv_title        = esc_html__( "Save Payout", 'affi-affiliate-marketing-for-woo' );
		}
		printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1><form method="post" class="vi-ui form affi-affiliate-payout-edit">', $st_title );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		$payout_options = [
			[
				'type' => 'section_start',
			],
			[
				'id'       => 'affi_referral_user',
				'type'     => 'select2',
				'name'     => 'affi_referral_user',
				'required' => true,
				'title'    => esc_html__( 'Affiliate User', 'affi-affiliate-marketing-for-woo' ),
//				'desc'     => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'class'    => 'vi-ui dropdown fluid affi-set-user-input affi-set-user-select2',
			],
			[
				'id'       => 'affi_referral_type',
				'type'     => 'text',
				'name'     => 'affi_referral_type',
				'rowClass' => 'field',
				'readonly' => true,
				'title'    => esc_html__( 'Type', 'affi-affiliate-marketing-for-woo' ),
//				'desc'     => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'       => 'affi_referral_amount',
				'type'     => 'number',
				'required' => true,
				'name'     => 'affi_referral_amount',
				'title'    => esc_html__( 'Amount', 'affi-affiliate-marketing-for-woo' ),
//				'desc'     => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'       => 'affi_referral_fee',
				'type'     => 'number',
				'name'     => 'affi_referral_fee',
				'rowClass' => 'field',
				'readonly' => true,
				'title'    => esc_html__( 'Fee', 'affi-affiliate-marketing-for-woo' ),
//				'desc'     => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'      => 'affi_referral_status',
				'type'    => 'select',
				'name'    => 'affi_referral_status',
				'title'   => esc_html__( 'Status', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'options' => [
					'pending'  => esc_html__( 'Pending', 'affi-affiliate-marketing-for-woo' ),
					'approved' => esc_html__( 'Approved', 'affi-affiliate-marketing-for-woo' )
				],
				'class'   => 'vi-ui dropdown fluid affi-dropdown',
			],
			[
				'id'       => 'affi_referral_payment',
				'type'     => 'textarea',
				'readonly' => true,
				'name'     => 'affi_referral_payment',
				'title'    => esc_html__( 'Payment', 'affi-affiliate-marketing-for-woo' ),
			],
			[
				'id'    => 'affi_referral_description',
				'type'  => 'textarea',
				'name'  => 'affi_referral_description',
				'title' => esc_html__( 'Description', 'affi-affiliate-marketing-for-woo' ),
			],
			[ 'type' => 'section_end' ],
		];
		wp_nonce_field( 'affi_security', '_affi_security' ); ?>
        <div class="affi-edit-container-wrap">
            <div class="vi-ui attached segment affi-payout-detail-wrap">
				<?php
				AFSettings_Helper::output_fields( $payout_options, $payout_data );
				?>
                <p class="affi-save-settings-container">
                    <button type="submit" class="vi-ui button primary affi-save-request-payout"
                            name="affi_save_request_payout" value="affi_save_request_payout">
						<?php echo esc_html( $sv_title ); ?>
                    </button>
                </p>
            </div>
        </div>
		<?php
		printf( '</form></div>' );
	}

	public function affi_search_affiliate_user() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$keyword = isset( $_GET['keyword'] ) ? sanitize_text_field( wp_unslash( $_GET['keyword'] ) ) : '';

		$users       = new WP_User_Query( array(
			'search'         => "*{$keyword}*",
			'search_columns' => array(
				'user_login',
				'user_nicename',
				'user_email',
				'display_name',
			),
		) );
		$users_found = $users->get_results();

		global $wpdb;
		$query      = "SELECT user_id FROM {$wpdb->prefix}affi_affiliates WHERE 1";
		$users_data = $wpdb->get_results( $wpdb->prepare( $query ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		$affs_data  = [];
		foreach ( $users_data as $aff_data ) {
			$affs_data[] = $aff_data['user_id'];
		}

		$items = array();
		if ( count( $users_found ) ) {
			foreach ( $users_found as $i_user ) {
				if ( in_array( $i_user->data->ID, $affs_data ) ) {
					$item    = array(
						'id'   => $i_user->data->ID,
						'text' => $i_user->data->user_login . ' (' . $i_user->data->display_name . ')',
					);
					$items[] = $item;
				}
			}
		}
		wp_send_json( $items );
	}

	public function affi_create_request_payout( $data_payout ) {
		$insert_id = self::insert( [
			'user_id'      => $data_payout['user_id'],
			'amount'       => $data_payout['amount'],
			'type'         => $data_payout['type'],
			'payment'      => $data_payout['payment'],
			'fee'          => $data_payout['fee'],
			'status'       => $data_payout['status'],
			'description'  => $data_payout['description'],
			'date_created' => current_time( 'U' )
		] );

		return $insert_id;
	}

	public function affi_affiliate_payment_info() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$aff_id = isset( $_POST['aff_id'] ) ? absint( wc_clean( wp_unslash( $_POST['aff_id'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		global $wpdb;
		$query = "SELECT payment_info FROM {$wpdb->prefix}affi_affiliates WHERE user_id=%d LIMIT 1";

		$rs_data = $wpdb->get_results( $wpdb->prepare( $query, $aff_id ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		$payment_info = ! empty( $rs_data ) && isset( $rs_data[0] ) ? $rs_data[0]['payment_info'] : '';
		wp_send_json_success( $payment_info );
	}
}

