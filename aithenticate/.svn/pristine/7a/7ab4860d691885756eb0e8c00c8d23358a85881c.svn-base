<?php
/**
 * Installer.
 *
 * @package Aithenticate
 */

/**
 * Installer class.
 */
class Aithenticate_Installer {

	/**
	 * Initialize
	 *
	 * @return void
	 */
	public static function init() {
		$self = new self();

		add_action( 'admin_init', array( $self, 'check_version' ) );

		register_activation_hook( AITHENTICATE_PLUGIN_FILE, array( $self, 'install' ) );
	}

	/**
	 * Check the version in the database. If it's old, run the update procedure.
	 *
	 * @return void
	 */
	public function check_version() {
		$version         = get_option( 'aithenticate_version' );
		$requires_update = version_compare( $version, aithenticate()->version, '<' );

		if ( $requires_update ) {
			$this->install();
		}
	}

	/**
	 * Install the plugin.
	 *
	 * @return void
	 */
	public function install() {
		$this->update_aithenticate_version();
	}

	/**
	 * Update the version option.
	 *
	 * @return void
	 */
	private function update_aithenticate_version() {
		update_option( 'aithenticate_version', aithenticate()->version );
	}

}
