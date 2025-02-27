<?php
/**
 * @package Make Builder
 */

/**
 * Interface MAKE_Setup_ModeInterface
 *
 * @since 1.0.0.
 */
interface MAKE_Setup_ModeInterface {
	public function get_mode();

	public function is_make_active_theme();

	public function get_make_version();

	public function has_make_api();

	public function is_plugin_active( $plugin_relative_path );
}