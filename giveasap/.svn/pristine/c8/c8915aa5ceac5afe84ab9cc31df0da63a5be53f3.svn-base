<?php

namespace Simple_Giveaways;

/**
 * Class SG_Report_Date
 */
class SG_Report_Date extends SG_Report {

	/**
	 * SG_Report_Date constructor.
	 */
	public function __construct() {
		$this->title = __( 'Subscribers', 'giveasap' );
	}

	/**
	 * If report has report options.
	 * @return boolean
	 */
	public function has_report_options() {
		return true;
	}

	/**
	 * Report Options.
	 *
	 * @return string
	 */
	public function report_options() {
		$time = current_time( 'timestamp' );
		$to   = date( 'Y-m-d', $time );
		$from = date( 'Y-m-d', $time - 1 * YEAR_IN_SECONDS );

		if ( isset( $_REQUEST['sg_reports_filter'] ) ) {
			$get_report = Helpers::unslash_and_clean( $_REQUEST['sg_report'] );
			$to         = $get_report['to'];
			$from       = $get_report['from'];
		}

		?>
		<div class="sg-report-options">
			<form action="<?php echo admin_url( 'edit.php' ); ?>" method="GET">
				<input type="hidden" name="post_type" value="giveasap" />
				<input type="hidden" name="page" value="sg_reports" />
				<div class="sg-report-filter">
					<label for="sg_report_from"><?php esc_html_e( 'From', 'giveasap' ); ?></label>
					<input type="text" id="sg_report_from" name="sg_report[from]" value="<?php echo esc_attr( $from ); ?>" />
				</div>
				<div class="sg-report-filter">
					<label for="sg_report_to"><?php esc_html_e( 'To', 'giveasap' ); ?></label>
					<input type="text" id="sg_report_to" name="sg_report[to]" value="<?php echo esc_attr( $to ); ?>" />
				</div>
				<button type="submit" class="sg-button" name="sg_reports_filter"><?php esc_html_e( 'Filter', 'giveasap' ); ?></button>
			</form>
		</div>
		<?php
	}

	/**
	 * Get data sets.
	 *
	 * @return array
	 */
	public function get_data_sets() {
		$data      = $this->get_data();
		$data_sets = array();

		$set         = array(
			'label'           => __( 'Subscribed', 'giveasap' ),
			'backgroundColor' => 'rgba(164,100,151,0.75)',
			'data'            => array_values( $data ),
		);
		$data_sets[] = $set;

		return $data_sets;
	}

	/**
	 * Get Data
	 */
	public function get_data() {
		global $wpdb;

		if ( null === $this->data ) {
			$time = current_time( 'timestamp' );
			$to   = date( 'Y-m-d', $time );
			$from = date( 'Y-m-d', $time - 1 * YEAR_IN_SECONDS );

			if ( isset( $_REQUEST['sg_reports_filter'] ) ) {
				$get_report = Helpers::unslash_and_clean( $_REQUEST['sg_report'] );
				$to         = $get_report['to'];
				$from       = $get_report['from'];
			}
			$results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->giveasap_entries WHERE date >=%s and date <=%s ", $from, $to ), ARRAY_A );
			$data    = array();

			foreach ( $results as $result ) {
				$date = date( 'Y-m-d', strtotime( $result['date'] ) );
				if ( ! isset( $data[ $date ] ) ) {
					$data[ $date ] = 0;
				}

				$data[ $date ] += 1;
			}
			$this->set_data( $data );
		}

		return $this->data;
	}

}
