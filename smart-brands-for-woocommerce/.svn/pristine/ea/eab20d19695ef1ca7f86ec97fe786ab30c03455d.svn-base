<?php
/**
 * Fired during plugin updates
 *
 * @link       https://shapedplugin.com
 * @since      1.1.4
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Admin
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

namespace ShapedPlugin\SmartBrands\Admin;

// Don't call the file directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * DBUpdates
 */
class DBUpdates {

	/**
	 * DB updates that need to be run
	 *
	 * @var array
	 */
	private static $updates = array(
		'2.0.0' => 'updates/update-2.0.0.php',
	);

	/**
	 * Binding all events
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'do_updates' ) );
	}

	/**
	 * Check if need any update
	 *
	 * @since 1.2.0
	 *
	 * @return boolean
	 */
	public function is_needs_update() {
		$installed_version = get_option( 'smart_brands_version' );
		$first_version     = get_option( 'smart_brands_first_version' );
		$activation_date   = get_option( 'smart_brands_activation_date' );

		if ( false === $installed_version ) {
			if ( get_option( 'sp_smart_brand_settings' ) ) {
				update_option( 'smart_brands_version', '1.1.6' );
				update_option( 'smart_brands_db_version', '1.1.6' );
			} else {
				update_option( 'smart_brands_version', SMART_BRANDS_VERSION );
				update_option( 'smart_brands_db_version', SMART_BRANDS_VERSION );
			}
		}
		if ( false === $first_version ) {
			update_option( 'smart_brands_first_version', SMART_BRANDS_VERSION );
		}
		if ( false === $activation_date ) {
			update_option( 'smart_brands_activation_date', time() );
		}

		if ( version_compare( $installed_version, SMART_BRANDS_VERSION, '<' ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Do updates.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function do_updates() {
		$this->perform_updates();
	}

	/**
	 * Perform all updates.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function perform_updates() {
		if ( ! $this->is_needs_update() ) {
			return;
		}

		$installed_version = get_option( 'smart_brands_version' );

		foreach ( self::$updates as $version => $path ) {
			if ( version_compare( $installed_version, $version, '<' ) ) {
				include $path;
				update_option( 'smart_brands_version', $version );
			}
		}
		update_option( 'smart_brands_version', SMART_BRANDS_VERSION );
	}
}
