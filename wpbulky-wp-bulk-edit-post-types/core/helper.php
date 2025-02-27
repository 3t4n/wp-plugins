<?php

namespace VI_CORE\Core;

defined( 'ABSPATH' ) || exit;

class Helper {
	protected static $instance = null;

	public function __construct() {

	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public static function clean( $var ) {
		if ( is_array( $var ) ) {
			return array_map( [ __CLASS__, 'clean' ], $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}


}
