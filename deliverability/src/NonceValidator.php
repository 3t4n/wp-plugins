<?php

namespace TopDeliverability;

class NonceValidator {

	const FIELD_NAME = '_wpnonce';

	/**
	 * @param string $action
	 * @return boolean
	 */
	public function validate( $action ) {
		return wp_verify_nonce( $_POST[ self::FIELD_NAME ], $action );
	}

	/**
	 * @param string $action
	 * @return boolean
	 */
	public function validate_ajax( $action ) {
		return check_ajax_referer( $action, self::FIELD_NAME, false );
	}
}
