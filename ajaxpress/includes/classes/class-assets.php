<?php
/**
 * AjaxPress Assets
 *
 * @package AjaxPress
 * @since 1.3.0
 */

namespace AjaxPress;

/**
 * Assets
 */
class Assets extends Base {

	/**
	 * Actions
	 */
	public function actions() {
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ] );
	}

	/**
	 * Admin Enqueue Scripts
	 *
	 * @param string $hook The current admin page.
	 * @return mixed
	 */
	public function admin_enqueue_scripts( $hook = null ) {

		// Bail if current user can't manage options.
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		if ( 'settings_page_ajaxpress' !== $hook ) {
			return false;
		}

		wp_enqueue_script( 'ajaxpress-admin', AJAXPRESS_URL . '/assets/js/admin.min.js', [ 'jquery' ], AJAXPRESS_VERSION, true );

		// Localize scripts.
		wp_localize_script( 'ajaxpress-admin', 'ajaxpress_admin', [
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'ajaxpress_admin' ),
			'options'  => App::get_instance()->get_options(),
		] );
	}

	/**
	 * WP Enqueue Scripts
	 */
	public function wp_enqueue_scripts() {
		wp_enqueue_script( 'ajaxpress', AJAXPRESS_URL . 'assets/js/app.min.js', [ 'jquery' ], AJAXPRESS_VERSION, true );

		// Localize scripts.
		wp_localize_script( 'ajaxpress', 'ajaxpress', [
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'ajaxpress' ),
			'options'  => App::get_instance()->get_options(),
		] );
	}
}

Assets::init();
