<?php
/**
 * Handle settings for the plugin.
 *
 * @since 1.2.0
 * @version 1.2.0
 */

namespace CP24\Tools\Inc;

defined( 'ABSPATH' ) || exit;

/**
 * Moderate Plugin Settings.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class Settings {
	const DASHBOARD_MENU_ITEMS = 'cp24_wp_tools_dashboard_menu_items_list';
	const PLUGIN_SETTINGS      = 'cp24_wp_tools_settings';

	/**
	 * The instance of the class.
	 *
	 * @since 1.2.0
	 */
	private static $instance;

	/**
	 * Get instance of the class.
	 *
	 * @since 1.2.0
	 * @return object
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Save all settings.
	 *
	 * @param array $settings The settings to save.
	 */
	public function save_all( $settings ) {
		update_option( self::PLUGIN_SETTINGS, $settings );
	}

	/**
	 * Get all settings.
	 *
	 * @return array The settings.
	 */
	public function get_all() {
		return get_option( self::PLUGIN_SETTINGS, [] );
	}

	/**
	 * Get a single settings value.
	 *
	 * @param string $key The key of the setting.
	 * @return mixed The value of the setting.
	 */
	public function get( $key ) {
		$settings = $this->get_all();

		return isset( $settings[ $key ] ) ? $settings[ $key ] : '';
	}

	/**
	 * Updates a single settings value.
	 *
	 * @param string $key The key of the setting.
	 * @param mixed  $value The value of the setting.
	 */
	public function save( $key, $value ) {
		$settings = $this->get_all();

		$settings[ $key ] = $value;

		$this->save_all( $settings );
	}
}
