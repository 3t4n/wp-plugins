<?php
/**
 * AjaxPress Boot Class
 *
 * @package AjaxPress
 * @since 1.3.0
 */

namespace AjaxPress;

/**
 * Assets
 */
class Boot {
	/**
	 * Singleton instance
	 *
	 * @var self
	 */
	private static $instance;

	/**
	 * Get singleton instance
	 *
	 * @return self
	 */
	public static function get_instance() {
		if ( ! isset(self::$instance) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init() {
		$this->define_constants();
		$this->load_dependencies();
	}

	/**
	 * Define plugin constants
	 *
	 * @return void
	 */
	private function define_constants() {
		define('AJAXPRESS_URL', plugin_dir_url(AJAXPRESS_FILE));
		define('AJAXPRESS_PATH', plugin_dir_path(AJAXPRESS_FILE));
		define('AJAXPRESS_INCLUDES', plugin_dir_path(AJAXPRESS_FILE) . 'includes/');
	}
	/**
	 * Load plugin dependencies
	 *
	 * @return mixed
	 */
	private function load_dependencies() {
		require_once AJAXPRESS_INCLUDES . 'classes/class-base.php';
		require_once AJAXPRESS_INCLUDES . 'classes/class-app.php';
		require_once AJAXPRESS_INCLUDES . 'classes/class-assets.php';

		// If current user can't manage options, bail.

		if ( ! is_admin() ) {
			return false;
		}
		require_once AJAXPRESS_INCLUDES . 'classes/class-settings.php';
	}
}

Boot::get_instance()->init();
