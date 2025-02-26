<?php

namespace GSPIN;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Handles plugin all kind of migration.
 *
 * @since 1.3.0
 */
class Migration {

	/**
	 * Class constructor
	 *
	 * @since 1.3.0
	 */
	public function __construct() {
		add_action( 'plugins_loaded', function() {
			$upgraded = get_option( 'gspin_upgraded_to_1_4_0', false );

			if ( ! $upgraded ) {
				$this->databaseMigration();
			}
		});
	}

	/**
	 * Creates database table on plugin version upgrade.
	 *
	 * @since 1.3.0
	 */
	public function databaseMigration() {
		if ( version_compare(GSPIN_VERSION, '1.3.0', '>') ) {
			gspin()->db->migration();
			update_option( 'gspin_upgraded_to_1_4_0', true );
		}
	}

}