<?php
/**
 * Identicon_Type enum
 *
 * @package Identicons
 */

declare(strict_types=1);

namespace Identicons;

/**
 * The Identicon_Type enum definition.
 *
 * @since 2.0.0
 */
enum Identicon_Type: string {

	/**
	 * Pixicon.
	 *
	 * @since 2.0.0
	 */
	case Pixicon = 'pixicon';

	/**
	 * Gets a label.
	 *
	 * @since 2.0.0
	 * @return string
	 */
	public function label(): string {
		return match ( $this ) {
			self::Pixicon => __( 'Pixicon (Generated)', 'identicons' )
		};
	}
}
