<?php
namespace WCPress\EasyMenuManager;

defined( 'ABSPATH' ) || exit;

/**
 * Manages assets for the plugin
 *
 * @since 1.00.00
 */
class Assets {

	const SELECTIZE_STYLE = Constants::PREFIX . 'selectize_style';
	const SELECTIZE_SCRIPT = Constants::PREFIX . 'selectize_script';
	const NAVIGATION_SCRIPT = Constants::PREFIX . 'navigation_script';

	/**
	 * Registering hooks
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public function __construct() {
		// Registering assets
		add_action( 'admin_enqueue_scripts', [ $this, 'registerStyle'] );
		add_action( 'admin_enqueue_scripts', [ $this, 'registerScript'] );

		// Loading assets
		add_action( 'admin_enqueue_scripts', [ $this, 'loadSelectizeOnNavMenuPage' ] );
	}

	/**
	 * Registers styles
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public function registerStyle() {
		wp_register_style(
			Assets::SELECTIZE_STYLE,
			EASY_MENU_MANAGER_ROOT_URL . 'assets/lib/selectize/0.15.2/selectize.default.min.css',
			[],
			'0.15.2'
		);
	}

	/**
	 * Registers scripts
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public function registerScript() {
		wp_register_script(
			Assets::SELECTIZE_SCRIPT,
			EASY_MENU_MANAGER_ROOT_URL . 'assets/lib/selectize/0.15.2/selectize.min.js',
			[ 'jquery' ],
			'0.15.2',
			true
		);
		wp_register_script(
			Assets::NAVIGATION_SCRIPT,
			EASY_MENU_MANAGER_ROOT_URL . 'assets/js/navigation.js',
			[ Assets::SELECTIZE_SCRIPT ],
			( EasyMenuManager::init() )->getVersionString(),
			true
		);
	}

	/**
	 * Loads assets on navigation menu page
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	public function loadSelectizeOnNavMenuPage() {
		global $pagenow;
		if ( is_admin() && $pagenow === 'nav-menus.php' ) {
			wp_enqueue_style( Assets::SELECTIZE_STYLE );
			wp_enqueue_script( Assets::SELECTIZE_SCRIPT );
			wp_enqueue_script( Assets::NAVIGATION_SCRIPT );
		}
	}
}