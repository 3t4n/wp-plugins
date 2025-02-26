<?php

class StoreYa_Benchmark_Ajax_Handler {
	public static function register_ajax_hooks() {
		add_action( 'wp_ajax_sybm_run_analysis', array( get_called_class(), 'run_analysis' ) );
		add_action( 'wp_ajax_sybm_get_job_status', array( get_called_class(), 'get_job_status' ) );
	}

	public static function run_analysis() {
		$refresh = true;
		$api_handler = new StoreYa_Benchmark_API_Handler();
		$res = $api_handler->send_report_request( $refresh );
		wp_send_json( $res );
	}

	public static function get_job_status() {
		$in_process = boolval( get_option( 'symb_job_in_process', 0 ) );

		$res = array(
			'in_process' => $in_process
		);

		wp_send_json( $res );
	}
}