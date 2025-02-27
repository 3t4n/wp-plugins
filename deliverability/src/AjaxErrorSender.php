<?php

namespace TopDeliverability;

class AjaxErrorSender {

	/**
	 * @param string $code
	 * @param int    $statusCode
	 */
	public function sendAjaxError( $code, $statusCode ) {
		wp_send_json_error( $code, $statusCode );
		wp_die();
	}
}
