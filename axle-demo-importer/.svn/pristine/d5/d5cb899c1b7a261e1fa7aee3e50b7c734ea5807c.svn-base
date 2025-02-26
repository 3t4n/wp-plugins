<?php
/**
 * Plugin Name: Axle Demo Importer
 * Plugin URI: https://wordpress.org/plugins/axle-demo-importer/
 * Description: Import demo content in a click.
 * Author: Axle Themes
 * Author URI: https://axlethemes.com
 * Version: 1.0.3
 * Text Domain: axle-demo-importer
 * Domain Path: languages
 *
 * Axle Demo Importer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Axle Demo Importer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Axle Demo Importer. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package Axle_Demo_Importer
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Axle_Demo_Importer' ) ) :

	final class Axle_Demo_Importer {

		/**
		 * @var Axle_Demo_Importer The one true Axle_Demo_Importer.
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Main Axle_Demo_Importer instance.
		 *
		 * Ensures that only one instance of Axle_Demo_Importer exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @since 1.0.0
		 * @return object|Axle_Demo_Importer The one true Axle_Demo_Importer
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Axle_Demo_Importer ) ) {
				self::$instance = new Axle_Demo_Importer;
				self::$instance->setup_constants();

				self::$instance->includes();
			}

			return self::$instance;
		}

		/**
		 * Throw error on object clone.
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'axle-demo-importer' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'axle-demo-importer' ), '1.0.0' );
		}

		/**
		 * Setup plugin constants.
		 *
		 * @access private
		 * @since 1.0.0
		 * @return void
		 */
		private function setup_constants() {

			// Plugin version.
			if ( ! defined( 'ADI_VERSION' ) ) {
				define( 'ADI_VERSION', '1.0.0' );
			}

			// Plugin Folder Path.
			if ( ! defined( 'ADI_PLUGIN_DIR' ) ) {
				define( 'ADI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL.
			if ( ! defined( 'ADI_PLUGIN_URL' ) ) {
				define( 'ADI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File.
			if ( ! defined( 'ADI_PLUGIN_FILE' ) ) {
				define( 'ADI_PLUGIN_FILE', __FILE__ );
			}

			// Plugin Base.
			if ( ! defined( 'ADI_PLUGIN_BASE' ) ) {
				define( 'ADI_PLUGIN_BASE', plugin_basename( __FILE__ ) );
			}
		}

		/**
		 * Include required files.
		 *
		 * @access private
		 * @since 1.0.0
		 * @return void
		 */
		private function includes() {

			require_once ADI_PLUGIN_DIR . 'includes/helper-functions.php';

			if ( is_admin() ) {
				require_once ADI_PLUGIN_DIR . 'includes/libraries/parsers.php';
				require_once ADI_PLUGIN_DIR . 'includes/libraries/downloader.php';
				require_once ADI_PLUGIN_DIR . 'includes/libraries/xml-importer.php';
				require_once ADI_PLUGIN_DIR . 'includes/libraries/wie-importer.php';
				require_once ADI_PLUGIN_DIR . 'includes/libraries/dat-importer.php';
				require_once ADI_PLUGIN_DIR . 'includes/admin/importer.php';
			}

		}


	}
endif;

/**
 * The main function for that returns Axle_Demo_Importer
 *
 * The main function responsible for returning the one true Axle_Demo_Importer
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * @since 1.0.0
 * @return object|Axle_Demo_Importer The one true Axle_Demo_Importer Instance.
 */
function ADI() {
	return Axle_Demo_Importer::instance();
}

// Get ADI Running.
ADI();
