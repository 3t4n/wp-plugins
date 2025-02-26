<?php
/**
 * Load assets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACB_Admin_Assets class.
 */
class ACB_Admin_Assets {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Enqueue scripts.
	 */
	public function admin_scripts() {
		global $wp_query, $post;

		$screen        = get_current_screen();
		$screen_id     = $screen ? $screen->id : '';
		$screens       = array(
			'acb_page_acb-generate',
		);

		// Register scripts.
		wp_register_script( 'acb_admin', acb()->plugin_url() . '/assets/js/admin/admin.js', array( 'jquery' ), ACB_VERSION, true );

		// Admin pages.
		if ( in_array( $screen_id, $screens ) ) {

			wp_enqueue_script( 'acb_admin' );

			$params = array(

			);

			wp_localize_script( 'acb_admin', 'acb_admin', $params );
		}
	}

}

return new ACB_Admin_Assets();