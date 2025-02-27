<?php


defined( 'ABSPATH' ) || exit();

class Hide_Anything_Update {

	private static $instance = null;

	/**
	 * The upgrades
	 *
	 * @var array
	 */
	private static $upgrades = array( '1.0.2', );

	public function installed_version() {

		return get_option( 'hide_anything_version' );
	}

	/**
	 * Check if the plugin needs any update
	 *
	 * @return boolean
	 */
	public function needs_update() {

		// maybe it's the first install
		if ( empty( $this->installed_version() ) ) {
			return false;
		}

		//if previous version is lower
		if ( version_compare( $this->installed_version(), HIDE_ANYTHING_VERSION, '<' ) ) {
			return true;
		}


		return false;
	}

	/**
	 * Perform all the necessary upgrade routines
	 *
	 * @return void
	 */
	public function perform_updates() {

		foreach ( self::$upgrades as $version ) {

			if ( version_compare( $this->installed_version(), $version, '<' ) ) {
				$file = HIDE_ANYTHING_INCLUDES . "/updates/class-update-$version.php";

				if ( file_exists( $file ) ) {
					include_once $file;
				}

				update_option( 'hide_anything_version', $version );
			}
		}

		delete_option( 'hide_anything_version' );
		update_option( 'hide_anything_version', HIDE_ANYTHING_VERSION );
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}
