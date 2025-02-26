<?php
/**
 * Plugin Name: Ads.txt and App-Ads.txt - AdEnergizer
 * Plugin URI: https://wordpress.org/plugins/adenergizer
 * Description: Create and edit ads.txt, app-ads.txt files from the convenience of admin dashboard.
 * Version: 0.1.1
 * Requires at least: 5.3
 * Requires PHP: 7.4
 * Author: adenergizer
 * Author URI: https://www.adenergizer.com/
 * License: GPLv3 or later
 * Text Domain: adenergizer
 * Domain Path: languages
 */

use AdEnergizer\AdEnergizer\Admin\SettingsPage;

defined( 'ABSPATH' ) || exit;

final class AdEnergizer {
	const PLUGIN_NAME = 'Ads.txt and App-Ads.txt - AdEnergizer';
	const PLUGIN_FILE = __FILE__;
	const VERSION = '0.0.4';
	const PLUGIN_REVIEW_URL = 'https://wordpress.org/support/plugin/adenergizer/reviews/#new-post';
	const PLUGIN_INSTALLED_TIME_OPTION = '_adenergizer_installed_time';

	private static AdEnergizer $instance;

	public static function get_instance(): AdEnergizer {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		$this->includes();
		if ( is_admin() ) {
			SettingsPage::init();
		}
		register_activation_hook( self::PLUGIN_FILE, [ __CLASS__, 'activate' ] );
		register_deactivation_hook( self::PLUGIN_FILE, [ __CLASS__, 'deactivate' ] );
	}

	private function includes() {
		require_once __DIR__ . '/includes/Admin/SettingsPage.php';
	}

	public static function activate() {
		update_option( self::PLUGIN_INSTALLED_TIME_OPTION, time() );
	}

	public static function deactivate() {
		delete_option( self::PLUGIN_INSTALLED_TIME_OPTION );
		delete_user_meta( get_current_user_id(), SettingsPage::REVIEW_NOTICE_DISMISSED_META );
	}

	public function __clone() {
		_doing_it_wrong( __METHOD__, 'Cloning this class is forbidden.', self::VERSION );
	}

	public function __wakeup() {
		_doing_it_wrong( __METHOD__, 'Serializing this class is forbidden.', self::VERSION );
	}
}

return AdEnergizer::get_instance();
