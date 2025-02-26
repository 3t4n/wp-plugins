<?php

namespace SixStorageOnline\helper;

defined( 'ABSPATH' ) || exit;

class Six_Storage_Logger {
	/**
	 * Log error to error log
	 *
	 * @param mixed $log
	 */
	public static function log( $log ) {
		if ( is_array( $log ) || is_object( $log ) ) {
			error_log( print_r( $log, true ) );
		} else {
			error_log( $log );
		}
	}
}
