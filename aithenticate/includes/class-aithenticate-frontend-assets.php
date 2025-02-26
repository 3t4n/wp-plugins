<?php
/**
 * Frontend assets.
 *
 * @package Aithenticate
 */

/**
 * Frontend assets class.
 */
class Aithenticate_Frontend_Assets extends Aithenticate_Assets {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public static function init() {
		$self = new self();

		add_action( 'wp_enqueue_scripts', array( $self, 'enqueue_assets' ) );
	}

	/**
	 * Get the styles.
	 *
	 * @return array
	 */
	protected function get_styles() {
		return array(
			'aithenticate' => array(
				'src' => $this->assets_url() . 'dist/css/aithenticate.css',
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

		$this->enqueue_style( 'aithenticate' );
	}

}
