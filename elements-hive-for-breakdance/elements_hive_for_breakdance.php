<?php
/**
 * @package     ElementsHiveForBreakdance
 * @author      Elements Hive
 * @copyright   2024 RELYzIT SRL
 * @license     GPLv3+
 *
 * @wordpress-plugin
 * Plugin Name: Elements Hive For Breakdance
 * Plugin URI: https://wordpress.org/plugins/elements-hive-for-breakdance
 * Description: The most unique, and creative elements, and extensions library for the Breakdance website builder
 * Author: Elements Hive
 * Author URI: https://elementshive.com/
 * License: GPLv3+
 * Text Domain: elementshive
 * Domain Path: /languages/
 * Version: 1.4.1
 */

defined( 'ABSPATH' ) or die( 'you do not have access to this page!' );

// use function Breakdance\Util\getDirectoryPathRelativeToPluginFolder;

if (!function_exists('is_plugin_active')) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

$breakdance_file = WP_PLUGIN_DIR . '/breakdance/plugin.php';
$breakdance_exists = file_exists($breakdance_file);

if( !$breakdance_exists || !is_plugin_active('breakdance/plugin.php')) {
	deactivate_plugins(plugin_basename(__FILE__));

	// Add admin notice
	add_action('admin_notices', function() {
		echo '<div class="error"><p>Elements Hive requires Breakdance to function properly. Elements Hive has been deactivated. Please install and activate Breakdance, then reactivate Elements Hive.</p></div>';
	});

	// If this is a plugin activation request, stop it
	if (isset($_GET['activate'])) {
		unset($_GET['activate']);
	}

	return false;
}


/*
** Don't need to implement workaround for GSAP dependencies. everyone should be using BD above 1.3
*/
// const __BREAKDANCE_MINIMUM_VESRION = '1.3.0';
// const __BREAKDANCE_FILE = WP_PLUGIN_DIR . '/breakdance/plugin.php';
// const __EH_GSAP_LOCAL = '%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/gsap@3.8.0/gsap.min.js';
// const __EH_GSAP_CDN = '%%BREAKDANCE_REUSABLE_GSAP%%';
// const __EH_SCROLLTRIGGER_LOCAL = '%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/gsap@3.8.0/ScrollTrigger.min.js';
// const __EH_SCROLLTRIGGER_CDN = '%%BREAKDANCE_REUSABLE_SCROLL_TRIGGER%%';


// const __BREAKDANCE_FILE = WP_PLUGIN_DIR . '/breakdance/plugin.php';

// $breakdance_data = '';

// try {
// 	$breakdance_data = get_file_data(__BREAKDANCE_FILE, array('Version' => 'Version'));
// } catch (Exception $e) {
// 	add_action('admin_notices', 'breakdance_missing_notice');
// 	add_action('admin_init', 'eh_deactivate_plugin');
// }

/*
** Don't need to implement workaround for GSAP dependencies. everyone should be using BD above 1.3
*/
// if (is_array($breakdance_data) && isset($breakdance_data['Version'])) {
// 	$breakdance_version = $breakdance_data['Version'];
// 	if (version_compare($breakdance_version, __BREAKDANCE_MINIMUM_VESRION, '<')) {
// 		//add_action('admin_notices', 'breakdance_version_incompatible_notice');
// 		//add_action('admin_init', 'eh_deactivate_plugin');
// 		if ( ! defined( 'ELEMENTS_HIVE_GSAP') ) {
// 			define( 'ELEMENTS_HIVE_GSAP', __EH_GSAP_LOCAL );
// 		}
// 		if ( ! defined( 'ELEMENTS_HIVE_SCROLLTRIGGER') ) {
// 			define( 'ELEMENTS_HIVE_SCROLLTRIGGER', __EH_SCROLLTRIGGER_LOCAL );
// 		}
// 	} else {
// 		if ( ! defined( 'ELEMENTS_HIVE_GSAP') ) {
// 			define( 'ELEMENTS_HIVE_GSAP', __EH_GSAP_CDN );
// 		}
// 		if ( ! defined( 'ELEMENTS_HIVE_SCROLLTRIGGER') ) {
// 			define( 'ELEMENTS_HIVE_SCROLLTRIGGER', __EH_SCROLLTRIGGER_CDN );
// 		}
// 	}
// }

// if (! function_exists('breakdance_missing_notice')) {
// 	/**
// 	 * Breakdance no version Admin notice ( breakdance missing ? )
// 	 *
// 	 * @return void
// 	 */
// 	function breakdance_missing_notice() {
// 		echo '<div class="notice notice-error"><p>Unable to read Breakdance plugin file, make sure that Breakdance Page builder is installed and activated.</p></div>';
// 	}
// }


// if ( !function_exists('eh_deactivate_plugin')) {
// 	/**
// 	 * Deactive plugin
// 	 *
// 	 * @return void
// 	 */
// 	function eh_deactivate_plugin() {
// 		deactivate_plugins( __FILE__);
// 	}
// }

if(!class_exists('EHForBreakdance')) {

	class EHForBreakdance {

		public function __construct() {

			define( 'ELEMENTS_HIVE_DIR', plugin_dir_url( __FILE__ ) );

			define( 'ELEMENTS_HIVE_ASSETS_DIR', plugin_dir_url( __FILE__ ) . 'assets/'  );

		}

		/**
		 * Initialize the plugin
		 *
		 * @return void
		 */
		public function initialize() {


			add_action('breakdance_loaded', function() { $this->breakdance_loaded_handler(); }, 9);

			// $this->appsero_init_tracker_elements_hive_for_breakdance();

			add_action('init', function () { $this->appsero_init_tracker_elements_hive_for_breakdance();}, 10);

		}

		/**
		 * Initialize the plugin tracker
		 *
		 * @return void
		 */
		private function appsero_init_tracker_elements_hive_for_breakdance() {

			if ( ! class_exists( 'Appsero\Client' ) ) {
			  require_once __DIR__ . '/includes/lib/appsero/src/Client.php';
			}

			$client = new Appsero\Client( '7e7ade80-f6ed-4b5a-8ddc-484611ef8658', 'Elements Hive for Breakdance', __FILE__ );

			// Active insights
			$client->insights()->init();

		}

		/**
		 * Register save locations with Breakdance
		 *
		 * @return void
		 */
		private function register_save_locations() {

			\Breakdance\ElementStudio\registerSaveLocation(
				\Breakdance\Util\getDirectoryPathRelativeToPluginFolder( __DIR__ ) . '/elements',
				'ElementsHiveForBreakdance',
				'element',
				'ElementsHive Elements',
				false
			);

			\Breakdance\ElementStudio\registerSaveLocation(
				\Breakdance\Util\getDirectoryPathRelativeToPluginFolder( __DIR__ ) . '/macros',
				'ElementsHiveForBreakdance',
				'macro',
				'ElementsHive Macros',
				false,
			);

			\Breakdance\ElementStudio\registerSaveLocation(
				\Breakdance\Util\getDirectoryPathRelativeToPluginFolder( __DIR__ ) . '/presets',
				'ElementsHiveForBreakdance',
				'preset',
				'ElementsHive Presets',
				false,
			);
		}

		/**
		 * Register Elements Hive categories with Breakdance
		 *
		 * @return void
		 */
		private function register_plugin_categories() {

			\Breakdance\Elements\ElementCategoriesController::getInstance()->registerCategory( 'elements_hive', 'Elements Hive' );

		}

		private function breakdance_loaded_handler() {

			$this->register_save_locations();

			$this->register_plugin_categories();

			require_once __DIR__ . '/extensions/base.php';

			require_once __DIR__ . '/includes/twig_functions.php';

			require_once __DIR__ . '/includes/design-library/base.php';

			require_once __DIR__ . '/includes/builder-tricks/base.php';

		}

	}

	$EhInstance = new EHForBreakdance();
	$EhInstance->initialize();
}
