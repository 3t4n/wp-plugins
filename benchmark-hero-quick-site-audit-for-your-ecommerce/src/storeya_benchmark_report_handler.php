<?php

class StoreYa_Benchmark_Report_Handler {
	private static $report;

	public static function init() {
		$report_json = get_option( 'sybm_last_report' );

		if ( ! $report_json || strlen( $report_json ) === 0 ) {
			return self::$report = false;
		}

		return self::$report = json_decode( $report_json );
	}

	public static function is_report_exists() {
		return self::$report !== false;
	}

	public static function get_overall_grade() {
		if ( ! self::$report ) {
			return 0;
		}

		return self::$report->totalGrade;
	}

	public static function get_tabs() {
		if ( ! self::$report  ) {
			return array();
		}

		return self::$report->data;
	}

	public static function get_tab_title( $tab ) {
		return $tab->category;
	}

	public static function get_tab_grade( $tab ) {
		return $tab->grade;
	}

	public static function get_tab_rows( $tab ) {
		return $tab->rows;
	}

	public static function get_row_title( $row ) {
		return $row->title;
	}

	public static function get_row_value( $row ) {
		return $row->value;
	}

	public static function get_row_comment( $row ) {
		if ( ! isset( $row->comment ) ) {
			return '';
		}

		return $row->comment;
	}

	public static function delete_data() {
		delete_option( 'sybm_last_report' );
		delete_option( 'sybm_last_report_timestamp' );
	}
}

StoreYa_Benchmark_Report_Handler::init();