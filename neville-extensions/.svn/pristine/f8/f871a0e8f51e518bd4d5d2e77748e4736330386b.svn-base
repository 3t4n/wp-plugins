<?php
/**
 * --------------------------------------------
 * Enqueue scripts and styles for the backend.
 * --------------------------------------------
 */

if ( ! function_exists( 'nevillex_scripts_admin' ) ) {
	/**
	 * Enqueue admin styles and scripts
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function nevillex_scripts_admin() {
		// Styles
		wp_enqueue_style(
			'nevillex-style-admin',
			NEVILLEX_PLUGIN_URL . 'assets/css/admin.css',
			[], NEVILLEX_VERSION, 'all'
		);

		// Scripts
		wp_enqueue_script(
			'nevillex-scripts-admin',
			NEVILLEX_PLUGIN_URL . 'assets/js/admin.js',
			[ 'jquery' ], NEVILLEX_VERSION, true
		);
	}
}
add_action( 'admin_enqueue_scripts', 'nevillex_scripts_admin' );
