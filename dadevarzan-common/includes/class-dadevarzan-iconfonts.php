<?php
/**
 * Dadevarzan_IconFonts setup
 *
 * @package Dadevarzan Iconfonts
 */

/**
 * This class initializes Dadevarzan IconFonts
 *
 * @class DV_IconFonts
 */
class DV_IconFonts {

	/**
	 *  Constructor
	 */
	public function __construct() {
		$this->register_icons();
	}

	/**
	 * Function that initializes DV reload Icons
	 */
	public function init() {
		add_action( 'wp_ajax_dv_reload_icons', array( $this, 'reload_icons' ) );
	}

	/**
	 * Function that renders reload Icons
	 */
	function reload_icons() {
		delete_option( '_dv_enabled_icons' );
		echo 'success';
		die();
	}

	/**
	 * Function that registers DV Icons
	 */
	function register_icons() {

		// Update initially.
		$dv_icons = get_option( '_dv_enabled_icons', 0 );

		if ( 0 == $dv_icons ) {

			// Copy IconFonts from DV to BB.
			$dir = FLBuilderModel::get_cache_dir( 'icons' );
			$src = DADEVARZAN_COMMON_DIR . 'public/icons/';
			$dst = $dir['path'];
			$this->recurse_copy( $src, $dst );

			$enabled_icons = FLBuilderModel::get_enabled_icons();

			$folders = glob( DADEVARZAN_COMMON_DIR . 'public/icons/' . '*' );
			foreach ( $folders as $folder ) {
				$folder = trailingslashit( $folder );
				$key    = basename( $folder );
				if ( is_array( $enabled_icons ) && ! in_array( $key, $enabled_icons ) ) {
					$enabled_icons[] = $key;
				}
			}
			FLBuilderModel::update_admin_settings_option( '_fl_builder_enabled_icons', $enabled_icons, true );

			// Trigger false.
			update_option( '_dv_enabled_icons', 1 );
		}
	}

	/**
	 * Function that renders recurse copy for Icons
	 *
	 * @since x.x.x
	 * @param array $src an array to get the src.
	 * @param array $dst an object to get destination of the file.
	 */
	function recurse_copy( $src, $dst ) {
		$dir = opendir( $src );

		// Create directory if not exist. Removed @mkdir( $dst );.
		if ( ! is_dir( $dst ) ) {
			mkdir( $dst );
		}
		
		while ( false !== ( $file = readdir( $dir ) ) ) {
			if ( ( '.' != $file ) && ( '..' != $file ) ) {
				if ( is_dir( $src . '/' . $file ) ) {
					$this->recurse_copy( $src . '/' . $file, $dst . '/' . $file );
				} else {
					copy( $src . '/' . $file, $dst . '/' . $file );
				}
			}
		}
		closedir( $dir );
	}

}
