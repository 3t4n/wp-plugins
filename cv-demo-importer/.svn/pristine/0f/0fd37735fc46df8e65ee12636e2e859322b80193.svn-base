<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * Fired during plugin activation
 *
 * @link       https://codevibrant.com/
 * @since      1.0.0
 *
 * @package    CV Demo Importer
 * @subpackage /includes
 */
if ( !class_exists( 'CVDI_Activator' ) ) :

	class CVDI_Activator {

		/**
		 * Tasks runs at the time of plugin activation.
		 *
		 * @since    1.0.0
		 */
		public static function activate() {
			$plugin_data = get_plugin_data( CVDI_PLUGIN_FILE_DIR );
			update_option( 'cvdi_import_version', $plugin_data['Version'] );
		}

	}
	
endif;