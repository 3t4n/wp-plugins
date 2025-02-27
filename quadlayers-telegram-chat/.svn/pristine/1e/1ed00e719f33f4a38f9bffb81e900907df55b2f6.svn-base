<?php

namespace QuadLayers\QLTGM\Controllers;

class Base {

	function success_save( $data ) {
		return wp_send_json_success( $data );
	}

	function success_ajax( $data ) {
		$this->success_save( $data );
	}

	function error_reload_page() {
		return wp_send_json_error( esc_html__( 'Please, reload page', 'quadlayers-telegram-chat' ) );
	}

	function error_access_denied() {
		wp_send_json_error( esc_html__( 'Access denied', 'quadlayers-telegram-chat' ) );
	}
}
