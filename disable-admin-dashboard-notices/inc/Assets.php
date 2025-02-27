<?php
/**
 * Assets class.
 *
 * @package manheim-features
 */

namespace WPFraternity\Disable_Admin_Dashboard;

use WPFraternity\Disable_Admin_Dashboard\Traits\Singleton;

/**
 * Class Assets
 */
class Assets {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_scripts() {
		$min = defined( 'WP_DEBUG' ) && WP_DEBUG === true ? '.min' : '';

		wp_enqueue_style(
			'wpfraternity-disable-admin-notices',
			Plugin::$assets_uri . "/css/admin${min}.css",
			[ 'wp-components' ],
			filemtime( Plugin::$assets_path . "/css/admin${min}.css" )
		);

		wp_enqueue_script(
			'wpfraternity-disable-admin-notices',
			Plugin::$assets_uri . "/js/admin${min}.js",
			[ 'jquery' ],
			filemtime( Plugin::$assets_path . "/js/admin${min}.js" ),
			true
		);
	}
}
