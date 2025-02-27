<?php

namespace TopDeliverability\Plugin;

class EnvConfigLoader {

	/**
	 * @var string
	 */
	private static $envFile = WP_CONTENT_DIR . '/environment.php';

	/**
	 * @param string  $environmentVariable
	 * @param $default
	 *
	 * @return string
	 */
	public static function load( $environmentVariable, $default ) {

		if ( file_exists( self::$envFile ) ) {
			require_once self::$envFile;
		}

		$value = getenv( $environmentVariable );

		if ( $value !== false ) {
			return $value;
		} else {
			return $default;
		}
	}
}
