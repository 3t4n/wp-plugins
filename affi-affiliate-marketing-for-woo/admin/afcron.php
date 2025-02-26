<?php

namespace AffiAffiliate\Admin;

defined( 'ABSPATH' ) || exit;

use AffiAffiliate\Inc\ClassRank;
use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\QueryDB;

class AFCron {
	protected static $instance = null;

	private $data = array();


	protected $settings;
	protected $functions;
	protected $query;
	protected $ranks_data;

	/**
	 * Initialize class
	 */
	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct( $id = 0 ) {
		$this->settings  = Data::instance();
		$this->query     = QueryDB::instance();
		$this->functions = AFFunctions::instance();

//		if ( ! wp_next_scheduled( 'affi_execute_rank_cron' ) ) {
//			wp_schedule_event( time(), 'monthly', 'affi_execute_rank_cron' );
//		}
		add_action( 'affi_execute_rank_cron', [ $this, 'affi_execute_rank_cron' ] );

		add_action( 'affi_cron_rank_update', [ $this, 'update_affiliates_rank' ] );
		add_action( 'wp_ajax_schedule_update_affiliates_rank', [ $this, 'schedule_update_affiliates_rank' ] );
		add_action( 'wp_ajax_update_affiliates_rank_manual', [ $this, 'update_affiliates_rank_manual' ] );

		add_action( 'admin_init', [ $this, 'debug_update' ] );
	}

	public function affi_execute_rank_cron() {
		do_action( 'affi_cron_rank_update' );
	}

	public function schedule_update_affiliates_rank() {
		check_ajax_referer( 'affi_security', 'nonce' );

		if ( ! wp_next_scheduled( 'affi_execute_rank_cron' ) ) {
			wp_schedule_event( time(), 'monthly', 'affi_execute_rank_cron' );
		}
		foreach ( _get_cron_array() as $timestamp => $crons ) {
			if ( in_array( 'affi_execute_rank_cron', array_keys( $crons ) ) ) {
				$next_cron = $timestamp;
			}
		}
		//maybe save option
		$s_result = isset( $next_cron ) && $next_cron ? $next_cron : '';
		wp_send_json( $s_result );
	}

	public function update_affiliates_rank_manual() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$this->direct_update_affiliates_rank();

		wp_die();
	}

	private function check_rank( $affiliate_data = array() ) {
		if ( empty( $affiliate_data['earning'] ) ) {
			$affiliate_data['earning'] = 0;
		}
		$ranks             = $this->ranks_data;
		$aff_rank_before   = $affiliate_data['rank'];
		$current_rank      = $aff_rank_before;
		$current_rank_name = $before_rank_name = '';

		foreach ( $ranks as $key => $r_arr ) {
			$rank_reach = $r_arr['achievement'];
			if ( empty( $before_rank_name ) && $aff_rank_before == $r_arr['id'] ) {
				$before_rank_name = $r_arr['name'];
			}
			if ( floatval( $affiliate_data['earning'] ) > floatval( $rank_reach ) ) {
				$rank_id           = $r_arr['id'];
				$current_rank      = $rank_id;
				$current_rank_name = $r_arr['name'];
			}
		}

		$current_rank    = (int) $current_rank;
		$aff_rank_before = (int) $aff_rank_before;

		if ( $aff_rank_before !== $current_rank ) {
			$affiliate_id = $affiliate_data['id'];
			$this->query->update_affiliates_rank( $affiliate_id, $current_rank );
			$user_id = $affiliate_data['user_id'];

			AFNotifications::instance()->send_user_notification( $user_id, 'new_rank', [
				'rank_from' => $before_rank_name,
				'rank_to'   => $current_rank_name
			] );
//			send_admin_notification( $u_id, 'admin_on_aff_change_rank', $current_rank );//send notification to admin
//			$this->query->pay_bonus_for_rank( $uid, $current_rank );
		}

	}

	private function compare_rank( $u_data, $r_type, $r_value ) {
		if ( $r_type == 'referrals_number' ) {
			if ( $r_value <= $u_data['total_referrals'] ) {

				return 1;
			}
		} else if ( $r_type == 'total_amount' ) {
			if ( $r_value <= $u_data['total_amount'] ) {

				return 1;
			}
		}

		return 0;
	}

	private function set_new_rank( $affiliate_id, $rank_id, $aff_rank_before ) {
		$aff_data        = $this->query->get_affiliate_by_id( $affiliate_id );
		$current_rank    = (int) $aff_data->rank;
		$rank_id         = (int) $rank_id;
		$aff_rank_before = (int) $aff_rank_before;
		if ( $current_rank == $rank_id ) {
			/// affiliate already has this rank

			return;
		}
		/// CHANGE RANK
		$this->query->update_affiliates_rank( $affiliate_id, $rank_id );

		if ( $aff_rank_before === $rank_id ) {

			return;
		}
		/// SEND NOTIFICATIONS
		//send_user_notification($uid, 'rank_change', $rank_id);//send notification to user
		//send_admin_notification($uid, 'admin_on_aff_change_rank', $rank_id);//send notification to admin
	}

	//schedule this for update
	function update_affiliates_rank() {
		$this->ranks_data = $this->query->get_ranks();
		if ( $this->ranks_data ) {
			$this->ranks_data = affi_reorder_ranks( $this->ranks_data );
			$all_affiliates   = $this->query->get_all_affiliate_for_rank();
			if ( $all_affiliates ) {
				foreach ( $all_affiliates as $id => $aff_array ) {
					$this->check_rank( $aff_array );
				}
			}
		}
		AFNotifications::instance()->send_admin_notification( 'cron_job_send', [] );
	}

	function direct_update_affiliates_rank() {
		$this->ranks_data = $this->query->get_ranks();
		if ( $this->ranks_data ) {
			$this->ranks_data = affi_reorder_ranks( $this->ranks_data );
			$all_affiliates   = $this->query->get_all_affiliate_for_rank();
			if ( $all_affiliates ) {
				foreach ( $all_affiliates as $id => $aff_array ) {
					$this->check_rank( $aff_array );
				}
			}
		}
	}

	public function debug_update() {
		if ( isset( $_GET['debug'] ) && wc_clean( wp_unslash( $_GET['debug'] ) ) === 'affi_update_rank' ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$this->direct_update_affiliates_rank();
		}
	}
}

