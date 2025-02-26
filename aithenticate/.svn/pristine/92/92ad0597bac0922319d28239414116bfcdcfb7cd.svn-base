<?php
/**
 * Admin assets.
 *
 * @package Aithenticate
 */

/**
 * Admin assets class.
 */
class Aithenticate_Admin_Assets extends Aithenticate_Assets {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public static function init() {
		$self = new self();

		add_action( 'admin_enqueue_scripts', array( $self, 'enqueue_assets' ) );
	}

	/**
	 * Get the styles.
	 *
	 * @return array
	 */
	protected function get_styles() {
		return array(
			'aithenticate_admin' => array(
				'src' => $this->assets_url() . 'dist/css/admin.css',
			),
		);
	}

	/**
	 * Get the scripts.
	 *
	 * @return array
	 */
	protected function get_scripts() {
		return array(
			'aithenticate_admin' => array(
				'src'  => $this->assets_url() . 'dist/js/admin.js',
				'deps' => array( 'jquery' ),
			),
		);
	}

	/**
	 * Enqueue assets.
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		$this->register_assets();

		$this->enqueue_style( 'aithenticate_admin' );
		$this->enqueue_script( 'aithenticate_admin' );
	}

}
