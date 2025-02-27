<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Datapocket_Install {

	/**
	 * Hook into actions and filters.
	 */
	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'check_version' ) );
	}

	/**
	 * Check Datapocket version and run the updater if required.
	 *
	 * @since 1.1.11
	 *
	 * @return void
	 */
	public static function check_version() {
		$datapocket_version = get_option( 'datapocket_version' );
		$requires_update    = version_compare( $datapocket_version, DATAPOCKET_VERSION, '<' );

		if( $requires_update ) {
			self::install();
		}
	}

	/**
	 * Install Datapocket
     *
     * @since 1.0.0
     *
     * @return void
	 */
	public static function install() {
		self::maybe_create_token();
		self::update_datapocket_version();
	}

	/**
	 * Maybe create a cryptographically secure token to be used for connection with DataPocket.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function maybe_create_token() {
		// Token for WooCommerce connection. Preferably we would use datapocket_wc_token. But we don't, for backwards compatibility.
		add_option( 'datapocket_token', datapocket_urlsafe_base64_encode( openssl_random_pseudo_bytes( 20 ) ) );

		// Token for WordPress connection.
		add_option( 'datapocket_wp_token', datapocket_urlsafe_base64_encode( openssl_random_pseudo_bytes( 20 ) ) );
	}

	/**
	 * Update the datapocket version option to the current version.
	 *
	 * @since 1.1.11
	 *
	 * @return void
	 */
	public static function update_datapocket_version() {
		update_option( 'datapocket_version', DATAPOCKET_VERSION );
	}

}

Datapocket_Install::init();