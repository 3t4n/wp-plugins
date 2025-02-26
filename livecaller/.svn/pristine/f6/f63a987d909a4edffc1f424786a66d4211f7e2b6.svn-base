<?php
/**
 * Class LiveCaller
 *
 * @package LiveCaller
 */

namespace LiveCaller;

use Exception;

/**
 * Class LiveCaller
 */
class LiveCaller {
	/**
	 * Starts the plugin
	 */
	public function __construct() {
		add_action( 'wp_footer', [ $this, 'widget_script' ] );
	}

	public function is_installed() {
		return ! empty( $this->widget_id() );
	}

	public function widget_id() {
		return esc_html( get_option( 'livecaller_widget_id' ) );
	}

	public function widget_locale() {
		return esc_html( get_option( 'livecaller_locale', 'ka' ) );
	}

	public function widget_script() {
		if ( ! $this->is_installed() ) {
			return false;
		}

		$widget_id = $this->widget_id();
		$widget_locale = $this->widget_locale();

		require_once __DIR__ . '/../views/widget_code.php';
	}

	public function get_plugin_version() {
		return get_file_data( __DIR__ . '/../livecaller.php.php', [ 'Version' ] )[0];
	}
}
