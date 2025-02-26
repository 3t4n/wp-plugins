<?php
namespace WCPress\EasyMenuManager;

defined( 'ABSPATH' ) || exit;

/**
 * Necessary constants declaration throughout the plugin
 *
 * @since 1.00.00
 */
class Constants {

	/**
	 * @const PREFIX Plugin prefix
	 *
	 * @since 1.00.00
	 */
	const PREFIX = 'easy_menu_manager_';

	/**
	 * Declares dynamic constants
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public static function declareDynamicConstants() {
		defined( 'EASY_MENU_MANAGER_ROOT_PATH' )
			|| define(
				'EASY_MENU_MANAGER_ROOT_PATH',
				dirname( __FILE__ ) . '/../'
		);
		defined( 'EASY_MENU_MANAGER_ROOT_URL' )
		|| define(
			'EASY_MENU_MANAGER_ROOT_URL',
			plugin_dir_url( EASY_MENU_MANAGER_ROOT_PATH . 'easy-menu-manager.php' )
		);
	}
}