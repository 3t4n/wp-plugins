<?php
/**
 * Memoize get trait.
 *
 * @package Extended_Simple_History_Beaver_Builder
 * @since 1.0.0
 */

namespace WEBDOGS\Extended_Simple_History_Beaver_Builder\Classes;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

/**
 * Memoize get trait.
 *
 * Gets and memoizes class variables.
 *
 * @since 1.0.0
 */
trait Memoize_Get {

	/**
	 * The static cache array.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array $cache The cache array.
	 */
	protected static $cache = array();

	/**
	 * Get class attribute.
	 *
	 * A memoizing method for class attributes.
	 * Always return a clone of an attribute object.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @param callable $callback Callback to retrieve the value if not cached.
	 * @param array    $callback_arguments Array of callback arguments.
	 * @return mixed Attribute value.
	 */
	protected static function memoize_get( ?callable $callback = null, ?array $callback_arguments = array() ) {
		$key = md5( wp_json_encode( array( $callback, $callback_arguments ) ) );

		if ( ! isset( self::$cache[ $key ] ) && is_callable( $callback ) ) {
			self::$cache[ $key ] = call_user_func_array( $callback, $callback_arguments );
		}

		return is_object( self::$cache[ $key ] ) ? clone self::$cache[ $key ] : self::$cache[ $key ];
	}
}
