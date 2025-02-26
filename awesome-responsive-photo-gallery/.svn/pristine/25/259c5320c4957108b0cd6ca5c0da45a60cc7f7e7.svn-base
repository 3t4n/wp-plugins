<?php
/**
 * Initialize the Awesome Responsive Photo Gallery (AWRPG) plugin.
 * 
 * This file initializes the AWRPG plugin by including all necessary dependencies,
 * setting up classes, and enforcing a singleton pattern for the main initialization class.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Init_AWRPG' ) ) {
    /**
     * Main Initialization Class for AWRPG.
     * 
     * Ensures a single instance of the class is created to handle plugin setup.
     */
    class Init_AWRPG {

        /**
         * Holds the single instance of the class.
         * 
         * @var Init_AWRPG
         */
        private static $instance;

        /**
         * Constructor is private to enforce the Singleton pattern.
         * 
         * Loads necessary classes or dependencies during initialization.
         */
        private function __construct() {
            // Load necessary classes or dependencies.
            $this->load_classes();
        }

        /**
         * Retrieve the singleton instance of the Init_AWRPG class.
         * 
         * @return Init_AWRPG The single instance of the class.
         */
        public static function get_instances() {
            // Return the instance if it already exists.
            if ( self::$instance ) {
                return self::$instance;
            }

            // Otherwise, create a new instance.
            self::$instance = new self();
            return self::$instance;
        }

        /**
         * Load additional classes or files for the plugin.
         * 
         * Includes all the necessary files and classes required for the plugin.
         */
        private function load_classes() {
			/* Admin Menu */
			if(is_admin()) {
				require_once AWRPG_PLUGIN_PATH . 'inc/awrpg-admin.php';
			}

			// Load core functionalities.
			require_once AWRPG_PLUGIN_PATH . 'action/init-functions.php';
			require_once AWRPG_PLUGIN_PATH . 'action/awrpg-enqueue.php';

            // Optional: Fetch Plugin Data (commented for now).
			// require_once AWRPG_PLUGIN_PATH . 'lib/plugin-data-checker.php';

            // Aqua Resizer class for image resizing.
			require_once AWRPG_PLUGIN_PATH . 'class/awrpg_aq_resizer.php';

            // Gallery-related functionalities.
            require_once AWRPG_PLUGIN_PATH . 'lib/gallery-functions.php';
            require_once AWRPG_PLUGIN_PATH . 'lib/store-gallery.php';
            require_once AWRPG_PLUGIN_PATH . 'inc/awrpg-process-options.php';
            require_once AWRPG_PLUGIN_PATH . 'lib/process-option.php';
            require_once AWRPG_PLUGIN_PATH . 'lib/process-gallery-script.php';

            // Shortcode functionality.
			require_once AWRPG_PLUGIN_PATH . 'action/awesome-shortcode.php';

            // Sidebar functionality.
            require_once AWRPG_PLUGIN_PATH . 'inc/awrpg-sidebar.php';
        }
    }
}

// Instantiate the plugin class.
Init_AWRPG::get_instances();
