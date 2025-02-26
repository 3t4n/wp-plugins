<?php

namespace AffiAffiliate\Admin;

defined( 'ABSPATH' ) || exit;

use AffiAffiliate\Inc\ClassAffiliates;
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\QueryDB;
use WP_User_Query;

class AFAffiliates {
	protected static $instance = null;

	public $data = array();


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

//		if ( $id ) {
//			global $wpdb;
//
//			$rs   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}affi_affiliates WHERE id = %s", $id );
//			$affiliates = $wpdb->get_row( $rs, ARRAY_A );
//			if ( ! is_array( $affiliates ) ) {
//				return;
//			}
//			foreach ( $affiliates as $key => $val ) {
//				$this->data[ $key ] = $val !== null ? $val : '';
//			}
//		}
	}

	/**
	 * Save changes made
	 *
	 * @return boolean
	 */
//	public function save() {
//		global $wpdb;
//		$data = $this->data;
//
//
//		$success = true;
//
//		if ( ! isset( $data['id'] ) ) {
//
//			$tic = self::insert( $data );
//			if ( $tic ) {
//				$this->data = $tic->data;
//				$success    = true;
//			} else {
//				$success = false;
//			}
//		} else {
//
//			unset( $data['id'] );
//			$success = $wpdb->update(
//				$wpdb->prefix . 'affi_affiliates',
//				$data,
//				array( 'id' => $this->data['id'] )
//			);
//		}
//
//		return (bool) $success;
//	}

	public static function update( $data ) {
		global $wpdb;

		// Insert ticket to DB.
		$success = $wpdb->update( $wpdb->prefix . 'affi_affiliates', $data, array( 'id' => $data['id'] ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public static function insert( $data ) {
		global $wpdb;

		// Insert ticket to DB.
		$success = $wpdb->insert( $wpdb->prefix . 'affi_affiliates', $data );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery

		if ( ! $success ) {
			return false;
		}

		return $wpdb->insert_id;
	}

	/**
	 * Delete record from database
	 *
	 * @param $aff - ticket object.
	 *
	 * @return boolean
	 */
	public static function delete( $aff ) {
		global $wpdb;

		$success = $wpdb->delete( $wpdb->prefix . 'affi_affiliates', array( 'id' => $aff->id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
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

	public static function get_affiliates( $args = array() ) {
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
		$query = "SELECT aff.*, us.user_nicename, us.user_login, us.user_email, rk.name FROM {$wpdb->prefix}affi_affiliates aff 
                    LEFT JOIN {$wpdb->base_prefix}users us ON user_id = us.ID
                    LEFT JOIN {$wpdb->prefix}affi_ranks rk ON rank = rk.id LIMIT %d OFFSET %d ";

		return $wpdb->get_results( $wpdb->prepare( $query, $args['limit'], $args['offset'] ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	public static function delete_affiliate( $id ) {
		global $wpdb;

		$success = $wpdb->delete( $wpdb->prefix . 'affi_affiliates', array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public function render_setting_page() {
		$action         = isset( $_REQUEST['action'] ) ? wc_clean( wp_unslash( $_REQUEST['action'] ) ) : false;// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$available_rank = AFRanks::get_ranks();
		$aff_options    = [
			[
				'type' => 'section_start',
			],
			[
				'id'      => 'affi_set_user_input',
				'title'   => esc_html__( 'User', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'select',
				'options' => [],
				'class'   => 'affi-set-user-input affi-set-user-select2',
			],
			[
				'id'      => 'affi_set_user_rank',
				'title'   => esc_html__( 'Rank', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'select',
				'options' => $available_rank,
				'class'   => 'affi-set-user-rank',
			],
			[ 'type' => 'section_end' ],
		];
		$aff_data       = [ 'affi_set_user_input' => '', 'affi_set_user_rank' => '' ];
		if ( $action && ( 'edit' === $action || 'new' === $action ) ) {
//			$rank_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';
//			self::load_edit_aff( $rank_id, $action );
		} else {
			printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
            <span class="page-title-action affi-affiliates-action">%s</span><hr class="wp-header-end">
            <form method="post" class="affi-affiliates-tabblenav-form">',
				esc_html__( "Affiliates", 'affi-affiliate-marketing-for-woo' ),
				esc_html__( "Add Affiliate", 'affi-affiliate-marketing-for-woo' ) );
			$aff_class = ClassAffiliates::get_instance();
			$aff_class->prepare_items();
			$aff_class->display();
			printf( '</form></div>' );
			?>
            <div class="vi-ui modal affi-affiliates-popup-container">
                <!--				<div class="affi-affiliates-popup-layout"></div>-->
                <i class="close icon"></i>
                <div class="header">
                    <div class="affi-affiliates-popup-title-wrap">
                        <div class="affi-affiliates-popup-title-new affi-hidden"><?php esc_html_e( 'New affiliate', 'affi-affiliate-marketing-for-woo' ); ?></div>
                        <div class="affi-affiliates-popup-title-edit affi-hidden"><?php esc_html_e( 'Edit affiliate', 'affi-affiliate-marketing-for-woo' ); ?></div>
                    </div>
                </div>
                <div class="content affi-affiliates-popup-wrap">
                    <div class="vi-ui form wrap_modal_content affi-affiliates-popup-detail-wrap">
                        <div class="field affi-aff-popup-line-wrap affi-aff-user-select affi-hidden">
                            <label for="affi_set_user_input"><?php esc_html_e( 'Select User', 'affi-affiliate-marketing-for-woo' ); ?></label>
                            <select class="vi-ui dropdown fluid affi-set-user-input affi-set-user-select2"
                                    name="affi_set_user_input" id="affi_set_user_input"
                                    data-placeholder="<?php esc_attr_e( 'Search for user', 'affi-affiliate-marketing-for-woo' ) ?>">
                            </select>
                        </div>
                        <div class="field affi-aff-popup-line-wrap affi-aff-user-edit affi-hidden">
                            <label for="affi_get_user_input"><?php esc_html_e( 'User', 'affi-affiliate-marketing-for-woo' ); ?></label>
                            <input class="vi ui disabled input" name="affi_get_user_input" id="affi_get_user_input"
                                   disabled type="text" data-id="" value="" readonly/>
                        </div>
                        <div class="field affi-affiliates-popup-line-wrap">
                            <label for="affi_set_user_rank"><?php esc_html_e( 'Rank', 'affi-affiliate-marketing-for-woo' ); ?></label>
                            <select class="affi-set-user-rank"
                                    name="affi_set_user_rank" id="affi_set_user_rank">
								<?php
								foreach ( $available_rank as $r_data ) {
									printf( '<option value="%s" selected="">%s</option>', esc_attr( $r_data['id'] ), esc_html( $r_data['name'] ) );
								}
								?>
                            </select>
                        </div>
                        <div class="field affi-aff-popup-line-wrap affi-aff-user-status affi-hidden">
                            <label for="affi_set_user_status"><?php esc_html_e( 'Status', 'affi-affiliate-marketing-for-woo' ); ?></label>
                            <select class="affi-set-user-status"
                                    name="affi_set_user_status" id="affi_set_user_status">
								<?php
								$available_status = [
									'pending'  => 'Pending',
									'approved' => 'Approved',
									'reject'   => 'Reject'
								];
								foreach ( $available_status as $s_key => $s_data ) {
									printf( '<option value="%s" selected="">%s</option>', esc_attr( $s_key ), esc_html( $s_data ) );
								}
								?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="actions affi-editing">
                    <div class="vi-ui button green affi-actions-button tiny affi-create-aff-user affi-hidden"
                         data-actions="create">
						<?php esc_html_e( 'Create', 'affi-affiliate-marketing-for-woo' ); ?>
                    </div>
                    <div class="vi-ui button blue affi-actions-button tiny affi-save-aff-user affi-hidden"
                         data-actions="save_edit">
						<?php esc_html_e( 'Save', 'affi-affiliate-marketing-for-woo' ); ?>
                    </div>
                </div>
            </div>
			<?php
		}
	}

	public function affi_search_user() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$keyword = isset( $_GET['keyword'] ) ? sanitize_text_field( wp_unslash( $_GET['keyword'] ) ) : '';

		$users = new WP_User_Query( array(
			'search'         => "*{$keyword}*",
			'search_columns' => array(
				'user_login',
				'user_nicename',
				'user_email',
				'display_name',
			),
//			'meta_query' => array(
//				'relation' => 'OR',
//				array(
//					'key'     => 'first_name',
//					'value'   => $keyword,
//					'compare' => 'LIKE'
//				),
//				array(
//					'key'     => 'last_name',
//					'value'   => $keyword,
//					'compare' => 'LIKE'
//				)
//			)
		) );

		$users_found = $users->get_results();
		$items       = array();
		if ( count( $users_found ) ) {
			foreach ( $users_found as $i_user ) {
				$item    = array(
					'id'   => $i_user->data->ID,
					'text' => $i_user->data->user_login . ' (' . $i_user->data->display_name . ')',
				);
				$items[] = $item;
			}
		}
		wp_send_json( $items );
	}

	public function affi_create_affiliate_user() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$user_id   = isset( $_POST['user_id'] ) ? absint( wc_clean( wp_unslash( $_POST['user_id'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$user_rank = isset( $_POST['user_rank'] ) ? sanitize_text_field( wp_unslash( $_POST['user_rank'] ) ) : '';

		$insert_id = self::insert( [
			'user_id'      => $user_id,
			'rank'         => $user_rank,
			'earning'      => 0,
			'balance'      => 0,
			'status'       => 'approved',
			'date_created' => current_time( 'U' )
		] );
		if ( $insert_id ) {
			AFNotifications::instance()->send_user_notification( $user_id, 'affiliate_register', [] );
		}

		wp_send_json( $insert_id );
	}

	public function affi_edit_affiliate_user() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$aff_id        = isset( $_POST['aff_id'] ) ? absint( wc_clean( wp_unslash( $_POST['aff_id'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$user_rank     = isset( $_POST['rank'] ) ? sanitize_text_field( wp_unslash( $_POST['rank'] ) ) : '';
		$user_status   = isset( $_POST['status'] ) ? sanitize_text_field( wp_unslash( $_POST['status'] ) ) : '';
		$old_status    = isset( $_POST['old_status'] ) ? sanitize_text_field( wp_unslash( $_POST['old_status'] ) ) : '';
		$reject_reason = isset( $_POST['reject_reason'] ) ? sanitize_text_field( wp_unslash( $_POST['reject_reason'] ) ) : '';

		$insert_id = self::update( [
			'id'     => $aff_id,
			'rank'   => $user_rank,
			'status' => $user_status,
		] );
		if ( $old_status != $user_status ) {
			$user_aff_data = $this->query->get_affiliate_by_id( $aff_id );
			$user_id       = (int) $user_aff_data->user_id;;
			switch ( $user_status ) {
				case 'approved':
					AFNotifications::instance()->send_user_notification( $user_id, 'affiliate_register', [] );
					break;
				case 'reject':
					AFNotifications::instance()->send_user_notification( $user_id, 'affiliate_reject', [ 'reject_reason' => $reject_reason ] );
					break;
				default:
			}
		}

		wp_send_json( $insert_id );
	}

	public function affi_delete_affiliate_user() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$aff_id = isset( $_POST['aff_id'] ) ? absint( wc_clean( wp_unslash( $_POST['aff_id'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		$delete_stt = self::delete( (object)[
			'id' => $aff_id,
		] );

		wp_send_json_success( $delete_stt );
	}
}

