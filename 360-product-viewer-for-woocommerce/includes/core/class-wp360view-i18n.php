<?php
namespace WP360view\Core;

/**
 * Text domain for translation.
 *
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Core
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wp360view_i18n {


	/**
	 * Text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function wp360view_load_plugin_textdomain() {

		wp360view_load_plugin_textdomain(
			'wp360view', false, WP360VIEW_PLUGIN_DIR . '/languages/'
		);

	}



}
