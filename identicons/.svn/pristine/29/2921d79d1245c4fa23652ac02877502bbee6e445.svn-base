<?php
/**
 * Identicon interface
 *
 * @package Identicons
 */

declare(strict_types=1);

namespace Identicons;

/**
 * The Identicon interface definition.
 *
 * @since 2.0.0
 */
interface Identicon {

	/**
	 * Creates an indention.
	 *
	 * @since 2.0.0
	 * @return bool
	 */
	public function create(): bool;

	/**
	 * Reads an indention.
	 *
	 * @since 2.0.0
	 * @return string|null
	 */
	public function read(): ?string;

	/**
	 * Updates an identicon.
	 *
	 * @since 2.0.0
	 * @param \GdImage $image The image.
	 * @return bool
	 */
	public function update( \GdImage $image ): bool;

	/**
	 * Deletes an identicon.
	 *
	 * @since 2.0.0
	 * @return void
	 */
	public function delete(): void;
}
