<?php

namespace AffiAffiliate\Admin;

defined( 'ABSPATH' ) || exit;

use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\QueryDB;
use DateTime;

class AFReport {
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

	public function render_setting_page() {
		if ( isset( $_GET['tab'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) );// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$this->report_header( $tab );
			echo "<div class='affi-affiliates-maketing-reports vlt-container'>";
			switch ( $tab ) {
				case 'referrals':
					$this->report_referrals();
					break;
				case 'clicks':
					$this->report_clicks();
					break;
				case 'payout':
					$this->report_payout();
					break;
			}
			echo "</div>";
		} else {
			$this->report_header( 'affiliates' );
			$this->report_general();
		}
	}

	public function report_header( $active ) {
		?>
        <div class="wrap"><h1
                    class="wp-heading-inline"><?php esc_html_e( 'Reports', 'affi-affiliate-marketing-for-woo' ) ?></h1>
        </div>
        <div class="affi-reports-control-bar">
            <a class="item <?php echo esc_attr($active == 'affiliates' ? 'active' : '') ?>"
               href="<?php echo esc_url( admin_url( 'admin.php?page=affi-report-setting' ) ) ?>"><?php esc_html_e( 'Affiliates', 'affi-affiliate-marketing-for-woo' ) ?></a>
            <a class="item <?php echo esc_attr($active == 'referrals' ? 'active' : '') ?>"
               href="<?php echo esc_url( admin_url( 'admin.php?page=affi-report-setting&tab=referrals' ) ) ?>"><?php esc_html_e( 'Referrals', 'affi-affiliate-marketing-for-woo' ) ?></a>
            <a class="item <?php echo esc_attr($active == 'clicks' ? 'active' : '') ?>"
               href="<?php echo esc_url( admin_url( 'admin.php?page=affi-report-setting&tab=clicks' ) ) ?>"><?php esc_html_e( 'Clicks', 'affi-affiliate-marketing-for-woo' ) ?></a>
            <a class="item <?php echo esc_attr($active == 'payout' ? 'active' : '') ?>"
               href="<?php echo esc_url( admin_url( 'admin.php?page=affi-report-setting&tab=payout' ) ) ?>"><?php esc_html_e( 'Payout', 'affi-affiliate-marketing-for-woo' ) ?></a>
        </div>
		<?php
	}

//container
	public function report_general() {
		?>
        <div class="vi-ui bottom attached active tab affi-general-reports-container affi-affiliate-reports-container"
             data-tab="general">
            <div class="affi-select-time-range affi-row">
				<?php
				$start     = $end = $selected = '';
				$button    = 'button';
				$type_view = 'affiliates';
				include_once AffiEnv::get( 'templates_dir' ) . 'af-date-picker.php';
				?>
            </div>
            <div class="affi-general-reports-group affi-row"></div>
            <div class="affi-chart-container">
                <canvas id="general_affiliates_chart"></canvas>
            </div>
        </div>

		<?php
	}

	public function report_referrals() {
		//list table
//		$this->prepare_items();
		?>
        <form method="get" class="affi-filter-form">
            <input type="hidden" name="page"
                   value="<?php echo esc_attr( isset( $_REQUEST['page'] ) ? wc_clean( wp_unslash( $_REQUEST['page'] ) ) : '' );// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized ?>"/>
            <input type="hidden" name="tab"
                   value="<?php echo esc_attr( isset( $_REQUEST['tab'] ) ? wc_clean( wp_unslash( $_REQUEST['tab'] ) ) : '' );// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized ?>"/>
			<?php
			//            $this->search_box( 'Search', 'cart_logs_product' );
			//            $this->display();
			?>
        </form>
        <div class="vi-ui bottom attached active tab affi-general-reports-container affi-referrals-reports-container"
             data-tab="referrals">
            <div class="affi-select-time-range affi-row">
				<?php
				$start     = $end = $selected = '';
				$button    = 'button';
				$type_view = 'referrals';
				include_once AffiEnv::get( 'templates_dir' ) . 'af-date-picker.php';
				?>
            </div>
            <div class="affi-general-reports-group affi-row"></div>
            <div class="affi-chart-container">
                <canvas id="referrals_log_chart"></canvas>
            </div>
        </div>
		<?php
	}

	public function report_clicks() {
//list table
		?>
        <div class="vi-ui bottom attached active tab affi-general-reports-container affi-clicks-reports-container"
             data-tab="clicks">
            <div class="affi-select-time-range affi-row">
				<?php
				$start     = $end = $selected = '';
				$button    = 'button';
				$type_view = 'clicks';
				include_once AffiEnv::get( 'templates_dir' ) . 'af-date-picker.php';
				?>
            </div>
            <div class="affi-general-reports-group affi-row"></div>
            <div class="affi-chart-container">
                <canvas id="clicks_event_chart"></canvas>
            </div>
        </div>

		<?php
	}

	public function report_payout() {
		?>
        <div class="vi-ui bottom attached active tab affi-general-reports-container affi-payout-reports-container"
             data-tab="payout">
            <div class="affi-select-time-range affi-row">
				<?php
				$start     = $end = $selected = '';
				$button    = 'button';
				$type_view = 'payouts';
				include_once AffiEnv::get( 'templates_dir' ) . 'af-date-picker.php';
				?>
            </div>
            <div class="affi-general-reports-group affi-row"></div>
            <div class="affi-chart-container">
                <canvas id="payout_request_chart"></canvas>
            </div>
        </div>

		<?php
	}

	public function affi_get_reports() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$report_type = isset( $_POST['report_type'] ) ? wc_clean( wp_unslash( $_POST['report_type'] ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		if ( ! $report_type ) {
			wp_die();
		}

		if ( isset( $_POST['data'] ) ) {
			$data                = wc_clean( wp_unslash( $_POST['data'] ) );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$report_info['type'] = isset( $_POST['report_type'] ) ? wc_clean( wp_unslash( $_POST['report_type'] ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

			if ( isset( $data['time_option'] ) ) {
				$end = current_time( 'timestamp' );
				switch ( $data['time_option'] ) {
					case 'today':
						$start = strtotime( 'midnight', $end );
						$end   = strtotime( 'tomorrow', $start ) - 1;
						$this->get_report_data( $start, $end, $report_info, 'P1H', 'H' );
						break;
					case 'yesterday':
						$start = strtotime( 'midnight', $end - 86400 );
						$end   = strtotime( 'tomorrow', $start ) - 1;
						$this->get_report_data( $start, $end, $report_info, 'P1H', 'H' );
						break;
					case '7days':
						$start = $end - 7 * 86400;
						$this->get_report_data( $start, $end, $report_info, 'P1D', 'M-d' );
						break;
					case '30days':
						$start = $end - 30 * 86400;
						$this->get_report_data( $start, $end, $report_info, 'P1D', 'M-d' );
						break;
					case '90days':
						$start = $end - 90 * 86400;
						$this->get_report_data( $start, $end, $report_info, 'P7D', 'W', 'Week' );
						break;
					case '365days':
						$start = $end - 365 * 86400;
						$this->get_report_data( $start, $end, $report_info, 'P1M', "M y" );
						break;
				}
			}

			if ( isset( $data['from_date'] ) || isset( $data['to_date'] ) ) {
				if ( $data['to_date'] - $data['from_date'] < 86400 ) {
					$this->get_report_data( $data['from_date'], $data['to_date'], $report_info, 'P1H', "H" );
				} else {
					$this->get_report_data( $data['from_date'], $data['to_date'], $report_info, 'P1D', "M-d" );
				}
			}
		}

		wp_die();
	}

	public function get_report_data( $start, $end, $report_info, $format_step, $format_view, $prefix = '' ) {
		$response        = $chart_data = $cashier_data = $_referrals_data = $_clicks_data = $affs_data = $_affs_data = array();
		$referrals_total = $click_total = [];

		if ( $format_view == 'H' ) {
			$timeline_data = array_fill( 0, 24, 0 );
		} else {
			$timeline_data = $this->get_array_time_range( $start, $end, $format_step, $format_view, $prefix );
		}
		$prefix = $prefix ? $prefix . ' ' : '';
		if ( 'W' == $format_view && 'P7D' == $format_step ) {
			$timeline_data[ $prefix . '14' ] = 0;
		}
		switch ( $report_info['type'] ) {
			case 'referrals':
				$referrals_data = $this->query_order_referral( $start, $end );
//				$referrals_data  = $this->query->get_referrals_in_period( $start, $end );
//				$referrals_url   = $this->query->get_referrals_group_url_in_period( $start, $end );
				$referrals_t_time = $timeline_data;
				$referrals_s_time = $timeline_data;
				$referrals_count  = count( $referrals_data );
				$referrals_total  = 0;
				$referrals_earn   = 0;
				$referrals_affs   = [];
				$referrals_aff    = 0;
				$referrals_set    = 0;
				$referrals_nm     = '';

				foreach ( $referrals_data as $re_item ) {
					$timestamp = $re_item['time'];
					$time      = $this->format_time_view( $format_view, $timestamp, $prefix );
					if ( ! isset( $referrals_t_time[ $time ] ) ) {
						$referrals_t_time[ $time ] = 0;
					}
					if ( ! isset( $referrals_s_time[ $time ] ) ) {
						$referrals_s_time[ $time ] = 0;
					}
					if ( ! isset( $referrals_affs[ $re_item['aff_id'] ] ) ) {
						$referrals_affs[ $re_item['aff_id'] ] = 0;
					}
					$referrals_t_time[ $time ] += floatval( $re_item['aff_rate'] );
					if ( $re_item['aff_status'] == 'success' ) {
						$referrals_s_time[ $time ]            += floatval( $re_item['aff_rate'] );
						$referrals_total                      += $re_item['value'];
						$referrals_earn                       += $re_item['aff_rate'];
						$referrals_affs[ $re_item['aff_id'] ] += 1;
					}
				}
				foreach ( $referrals_affs as $k_aff => $v_aff ) {
					if ( $referrals_set < $v_aff ) {
						$referrals_set = $v_aff;
						$referrals_aff = $k_aff;
					}
				}
				if ( ! empty( $referrals_aff ) ) {
					$referrals_nm = $this->query->get_username_by_affiliate_id( intval( $referrals_aff ) );
				}
				$s_re_data['label'] = array_keys( $referrals_s_time );
				$s_re_data['value'] = array_values( $referrals_s_time );
				$t_re_data['label'] = array_keys( $referrals_t_time );
				$t_re_data['value'] = array_values( $referrals_t_time );
				$response['ref']    = [ 'total' => $t_re_data, 'success' => $s_re_data ];
				$response['count']  = $referrals_count;
				$response['total']  = $referrals_total;
				$response['earn']   = $referrals_earn;
				$response['aff']    = $referrals_nm;
				break;
			case 'clicks':
				//separate query to get count with big data
				$clicks_total = $this->query->get_clicks_total_in_period( $start, $end );
				$clicks_data  = $this->query->get_clicks_in_period( $start, $end );
				$clicks_url   = $this->query->get_clicks_group_url_in_period( $start, $end );
				$clicks_time  = $timeline_data;
				$most_url     = '';
				foreach ( $clicks_data as $cl_item ) {
					$cl_time   = $cl_item['date'];
					$timestamp = $cl_time;
					$time      = $this->format_time_view( $format_view, $timestamp, $prefix );
					if ( ! isset( $clicks_time[ $time ] ) ) {
						$clicks_time[ $time ] = 0;
					}
					$clicks_time[ $time ] += 1;
				}
				foreach ( $clicks_url as $_url ) {
					$most_url = $_url['url'];
				}

				//Response report
				$_cl_data['label'] = array_keys( $clicks_time );
				$_cl_data['value'] = array_values( $clicks_time );
				$response['visit'] = $_cl_data;
				$response['total'] = $clicks_total;
				$response['url']   = $most_url ? $most_url : esc_html__( 'No data', 'affi-affiliate-marketing-for-woo' );
				break;
			case 'payouts':
				$payout_results = $this->query->get_payout_range_count( $start, $end );
				$pay_data       = $timeline_data;
				$pay_total      = 0;
				foreach ( $payout_results as $pay_item ) {
					$order_time = $pay_item['date_modified'] && ! empty( $pay_item['date_modified'] ) ?
						$pay_item['date_modified'] : $pay_item['date_created'];
//					$timestamp  = strtotime( $order_time );
					$timestamp = $order_time;
					$time      = $this->format_time_view( $format_view, $timestamp, $prefix );
					if ( ! isset( $pay_data[ $time ] ) ) {
						$pay_data[ $time ] = 0;
					}
					$pay_data[ $time ] += floatval( $pay_item['amount'] );
					$pay_total         += floatval( $pay_item['amount'] );
				}

				//Response report
				$_affs_data['label'] = array_keys( $pay_data );
				$_affs_data['value'] = array_values( $pay_data );
				$response['pay']     = $_affs_data;
				$response['count']   = count( $payout_results );
				$response['total']   = $pay_total;
				break;
			case 'ac_count':
			case 'ac_total':
//				$visit_total = $this->query->get_clicks_total_in_period( $start, $end );
				$visit_data = $this->query->get_clicks_in_period( $start, $end );
//				$order_total = $this->query->get_clicks_total_in_period( $start, $end );
				$order_data  = $this->query_order_referral( $start, $end );
				$visit_total = $order_total = $order_count = $order_o_balance = $order_balance = 0;
				$visits_time = $order_count_time = $order_total_time = $order_ob_time = $order_b_time = $timeline_data;

				foreach ( $visit_data as $vs_item ) {
					$visit_total += 1;
					$vs_time     = $vs_item['date'];
					$timestamp   = $vs_time;
					$time        = $this->format_time_view( $format_view, $timestamp, $prefix );
					if ( ! isset( $visits_time[ $time ] ) ) {
						$visits_time[ $time ] = 0;
					}
					$visits_time[ $time ] += 1;
				}

				foreach ( $order_data as $od_item ) {
					$order_count     += 1;
					$order_total     += (float) $od_item['value'];
					$order_o_balance += (float) $od_item['aff_rate'];
					if ( $od_item['aff_status'] == 'success' ) {
						$order_balance += (float) $od_item['aff_rate'];
					}
					$od_time   = $od_item['time'];
					$timestamp = $od_time;
					$time      = $this->format_time_view( $format_view, $timestamp, $prefix );
					if ( ! isset( $order_count_time[ $time ] ) ) {
						$order_count_time[ $time ] = 0;
					}
					$order_count_time[ $time ] += 1;
					if ( ! isset( $order_total_time[ $time ] ) ) {
						$order_total_time[ $time ] = 0;
					}
					$order_total_time[ $time ] += (float) $od_item['value'];
					if ( ! isset( $order_ob_time[ $time ] ) ) {
						$order_ob_time[ $time ] = 0;
					}
					$order_ob_time[ $time ] += (float) $od_item['aff_rate'];
					if ( ! isset( $order_b_time[ $time ] ) ) {
						$order_b_time[ $time ] = 0;
					}
					if ( $od_item['aff_status'] == 'success' ) {
						$order_b_time[ $time ] += (float) $od_item['aff_rate'];
					}
				}
				//Response report
				$_od_tt_data['label'] = array_keys( $order_total_time );
				$_od_tt_data['value'] = array_values( $order_total_time );
				$_od_c_data['label']  = array_keys( $order_count_time );
				$_od_c_data['value']  = array_values( $order_count_time );
				$_od_ob_data['label'] = array_keys( $order_ob_time );
				$_od_ob_data['value'] = array_values( $order_ob_time );
				$_od_b_data['label']  = array_keys( $order_b_time );
				$_od_b_data['value']  = array_values( $order_b_time );
				$_vs_data['label']    = array_keys( $visits_time );
				$_vs_data['value']    = array_values( $visits_time );

//				$response['visit'] = $_vs_data;
//				$response['count'] = $_od_c_data;
				$response['total'] = [
					'visit'     => $_vs_data,
					'count'     => $_od_c_data,
					'total'     => $_od_tt_data,
					'o_balance' => $_od_ob_data,
					'balance'   => $_od_b_data
				];

				$response['group'] = [
					'visit'     => $visit_total,
					'count'     => $order_count,
					'total'     => round( $order_total, 2 ),
					'o_balance' => round( $order_o_balance, 2 ),
					'balance'   => round( $order_balance, 2 )
				];
				break;
			default:
				$earn_results      = [ 'name' => '', 'val' => '' ];//query order to get total in time
				$aff_results       = $this->query->get_affiliates_range_count( $start, $end );
				$aff_count         = $this->query->get_affiliates_count();
				$order_data        = $this->query_order_referral( $start, $end );
				$response['total'] = $aff_count;
				$response['new']   = count( $aff_results );
				$affs_data         = $timeline_data;
				$aff_od_data       = [];

				foreach ( $order_data as $od_item ) {
					if ( isset( $aff_od_data[ $od_item['aff_id'] ] ) ) {
						$aff_od_data[ $od_item['aff_id'] ] += (float) $od_item['aff_rate'];
					} else {
						$aff_od_data[ $od_item['aff_id'] ] = (float) $od_item['aff_rate'];
					}
				}
				foreach ( $aff_od_data as $ao_key => $ao_val ) {
					if ( (float) $earn_results['val'] < (float) $ao_val ) {
						$earn_results['name'] = $ao_key;
						$earn_results['val']  = $ao_val;
					}
				}
				if ( ! empty( $earn_results['name'] ) ) {
					$earn_results['name'] = $this->query->get_user_display_name_by_affiliate_id( $earn_results['name'] );
				}
				if ( ! empty( $earn_results['val'] ) ) {
					$earn_results['val'] = round( $earn_results['val'], 2 );
				}
				$response['earn'] = $earn_results;

				foreach ( $aff_results as $aff_item ) {
					$order_time = $aff_item['date_created'];
//					$timestamp  = strtotime( $order_time );
					$timestamp = $order_time;
					$time      = $this->format_time_view( $format_view, $timestamp, $prefix );
					if ( ! isset( $affs_data[ $time ] ) ) {
						$affs_data[ $time ] = 0;
					}
					$affs_data[ $time ] += 1;
				}

				//Response report
				$_affs_data['label'] = array_keys( $affs_data );
				$_affs_data['value'] = array_values( $affs_data );
				$response['aff']     = $_affs_data;
				break;
		}

		wp_send_json( $response );
	}

	function query_order_referral( $start, $end ) {
		$from_time = gmdate( 'Y-m-d H:i:s', $start );
		$to_time   = gmdate( 'Y-m-d H:i:s', $end );

		$args   = array(
			'date_before'    => $to_time,
			'date_after'     => $from_time,
			'posts_per_page' => - 1,
			'return'         => 'ids',
		);
		$orders = wc_get_orders( $args );
		if ( count( $orders ) ) {
			$output = array();
			foreach ( $orders as $o_k => $o_item ) {
				$order_data = wc_get_order( $o_item );
				if ( $order_data->get_meta( 'affi_affiliate_id', true ) ) {
					$order_date        = $order_data->get_date_created();
					$output[ $o_item ] = array(
						'time'       => $order_date->date( 'U' ),
						'value'      => $order_data->get_total(),
						'aff_id'     => $order_data->get_meta( 'affi_affiliate_id', true ),
						'aff_rate'   => $order_data->get_meta( 'affi_affiliate_rate', true ),
						'aff_status' => $order_data->get_meta( 'affi_affiliate_status', true ),
					);
				}
			}

			return $output;
		}

		return [];
	}

	function format_time_view( $format_view, $timestamp, $prefix ) {
		$hour  = date_i18n( 'H', $timestamp );
		$day   = date_i18n( 'd', $timestamp );
		$month = date_i18n( 'M', $timestamp );
		$week  = date_i18n( 'W', $timestamp );
		$year  = date_i18n( 'y', $timestamp );

		$_time = '';

		switch ( $format_view ) {
			case 'H':
				$_time = intval( $hour );
				break;
			case 'M-d':
				$_time = $month . '-' . $day;
				break;
			case "M y":
				$_time = $month . " " . $year;
				break;
			case 'W':
				$_time = $prefix . $week;
				break;
		}

		return $_time;
	}

	public function get_array_time_range( $start, $end, $format_step, $format_view, $prefix = '' ) {
		$prefix = $prefix ? $prefix . ' ' : '';
		$range  = array();
		$period = new \DatePeriod(
			new \DateTime( date_i18n( 'Y-m-d', $start ) ),
			new \DateInterval( $format_step ),
			new \DateTime( date_i18n( 'Y-m-d', $end + 86400 ) )
		);

		foreach ( $period as $p ) {
			$range[ $prefix . $p->format( $format_view ) ] = 0;
		}

		return $range;
	}

	public function get_array_source_time_range( $start, $end, $format_step, $format_view, $prefix = '' ) {
		$prefix = $prefix ? $prefix . ' ' : '';
		$range  = array();
		$period = new \DatePeriod(
			new \DateTime( date_i18n( 'Y-m-d', $start ) ),
			new \DateInterval( $format_step ),
			new \DateTime( date_i18n( 'Y-m-d', $end + 86400 ) )
		);
		foreach ( $period as $p ) {
			$range[ $p->format( $format_view ) ] = 0;
		}

		return $range;
	}
}

