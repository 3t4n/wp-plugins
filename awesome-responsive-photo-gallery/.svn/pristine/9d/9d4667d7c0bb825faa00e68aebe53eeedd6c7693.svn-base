<?php
/**
 * Plugin Name:       Awesome Responsive Photo Gallery
 * Plugin URI:        https://wordpress.org/plugins/awesome-responsive-photo-gallery/
 * Description:       A jQuery lightbox plugin for responsive, touch-enabled photo galleries with smooth fullscreen CSS3 transitions.
 * Version:           1.2
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Realwebcare
 * Author URI:        https://www.realwebcare.com/
 * Text Domain:       awesome-responsive-photo-gallery
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Awesome_Responsive_Photo_Gallery
 * 
 * This class uses the Singleton pattern to ensure 
 * only one instance of the class is created during runtime.
 * The class hooks into WordPress to:
 * 
 * - Load necessary dependencies and classes required for functionality.
 */
if ( ! class_exists( 'Awesome_Responsive_Photo_Gallery' ) ) {
    class Awesome_Responsive_Photo_Gallery {

        // Hold the single instance of the class.
        private static $instance;
        private $old_option_name = 'galleryTables';
        private $new_option_name = 'awrpg_galleryTables';
        private $plugin_version_option = 'awrpg_plugin_version';
        private $current_plugin_version = '1.2';

        // Constructor is private to enforce the Singleton pattern.
        private function __construct() {
            // add_action('upgrader_process_complete', array( $this, 'trigger_migration_on_update' ), 10, 2);
            add_action('plugins_loaded', array($this, 'check_and_migrate_options'));

            // Define plugin-specific constants.
            $this->define_constants();

            // Load necessary classes or dependencies.
            $this->load_classes();
        }

        // Public static method to retrieve the singleton instance.
        public static function get_instances() {
            if ( self::$instance ) {
                return self::$instance;
            }

            self::$instance = new self();

            return self::$instance;
        }

        // Define constants used throughout the plugin.
        private function define_constants() {
            define( 'AWRPG_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
            define( 'AWRPG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
            define( 'AWRPG_AUF', __FILE__ );
        }

        /**
         * Check and migrate options if necessary.
         */
        public function check_and_migrate_options() {
            // error_log('check_and_migrate_options triggered.');

            $saved_version = get_option($this->plugin_version_option);

            if ( $saved_version === false ) {
                $this->migrate_option();
                update_option($this->plugin_version_option, $this->current_plugin_version);
            }
        }

        /**
         * Migrate the old option to the new option.
         */
        private function migrate_option() {
            // Check if the old option exists
            $old_value = get_option($this->old_option_name);
            if ($old_value !== false) {
                // Sanitize the old value before saving it to the new option
                $old_value = sanitize_text_field( $old_value );

                // Save the value to the new option
                if (update_option($this->new_option_name, $old_value)) {
                    // Delete the old option
                    delete_option($this->old_option_name);
                    error_log("Option migrated successfully.");
                } else {
                    error_log("Failed to update the new option: {$this->new_option_name}");
                }
            }
        }

        // Load additional classes or files for the plugin.
        private function load_classes() {
            require_once AWRPG_PLUGIN_PATH . 'inc/init-awrpg.php';
        }
    }
}

// Instantiate the plugin class.
Awesome_Responsive_Photo_Gallery::get_instances();

if (is_admin()) {
    // new AWRPG_Admin_Menu();
    require_once ( AWRPG_PLUGIN_PATH . 'inc/awrpg-process.php' );
    global $awrpg_gallery_management;
    $awrpg_gallery_management = new AWRPG_Gallery_Management();
}