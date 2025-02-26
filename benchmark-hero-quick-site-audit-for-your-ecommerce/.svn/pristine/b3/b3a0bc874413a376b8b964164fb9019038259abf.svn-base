<?php

class StoreYa_Benchmark_API_Handler {
	public function send_report_request( $refresh = false ) {
		$client_url = STOREYA_BENCHMARK_CLIENT_URL;

		$params = array( 'url' => $client_url );

		if ( $refresh ) {
			$params['refresh'] = true;
		}

		$body_json = json_encode( $params );

		$res = wp_remote_request( 'https://www.storeya.com/api/Benchmark', array(
			'method' => 'POST',
			'headers' => array( 'Content-Type' => 'application/json; charset=utf-8' ),
			'body' => $body_json,
			'data_format' => 'body'
		) );

		if ( is_wp_error( $res ) ) {
			return array(
				'success' => false,
				'error' => $res->get_error_message()
			);
		}

		$body = wp_remote_retrieve_body( $res );
		$data = json_decode( $body );

		if ( json_last_error() !== JSON_ERROR_NONE ) {
			return array(
				'success' => false,
				'error' => 'Invalid JSON from the API',
			);
		}

		if ( isset( $data->status ) && $data->status === 'ready' || $data->status === 'waiting' ) {
			
			if ( $data->status === 'waiting' ) {
				StoreYa_Benchmark_Cron_Handler::schedule_next_api_call();
			} else {
				StoreYa_Benchmark_Cron_Handler::clear_scheduled_api_call();
				update_option( 'sybm_last_report', $body );
				update_option( 'sybm_last_report_timestamp', time() );
			}

			return array(
				'success' => true
			);
		} else {
			return array(
				'success' => false,
				'error' => 'Invalid response from the API',
			);
		}
	}
}