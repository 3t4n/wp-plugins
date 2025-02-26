<?php
/**
 * Factory class
 *
 * @package Identicons
 */

declare(strict_types=1);

namespace Identicons;

/**
 * The Factory class definition.
 *
 * @since 1.0.0
 */
class Factory {

	/**
	 * Creates a new instance of Identicon.
	 *
	 * @since 1.0.0
	 * @param Identicon_Type $type The type of avatar.
	 * @param string         $hash md5 hash of the user email.
	 * @return Identicon
	 */
	public static function make( Identicon_Type $type, string $hash ): Identicon {
		$class = __NAMESPACE__ . '\\' . $type->name;
		return new $class( $hash );
	}
}
