<?php defined('ABSPATH') or die('No script kiddies please!!');
/*
  Plugin Name: WP Menu Icons Lite
  Plugin URI: https://accesspressthemes.com/wordpress-plugins/wp-menu-icons-lite/
  Description: Assign various pre-available font icons to your WordPress Menus.
  Version: 	1.1.0
  Author:  	AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License: 	GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: ak-menu-icons-lite
 */
/**
 * Plugin Main Class
 *
 * @since 1.0.0
 */
if ( !class_exists('WPMICONSLITE_CLASS') ) {
    class WPMICONSLITE_CLASS {
        /**
         * Plugin Main initialization
         *
         * @since 1.0.0
         */
        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Necessary Constants Define
         *
         * @since 1.0.0
         */
        function define_constants() {
            defined('WPMICONSLITE_PATH') or define('WPMICONSLITE_PATH', plugin_dir_path(__FILE__));
            defined('WPMICONSLITE_VERSION') or define('WPMICONSLITE_VERSION', '1.1.0');
            defined('WPMICONSLITE_TD') or define('WPMICONSLITE_TD', 'ak-menu-icons-lite');
            defined('WPMICONSLITE_URL') or define('WPMICONSLITE_URL', plugin_dir_url(__FILE__));//plugin directory url
            defined('WPMICONSLITE_IMG_DIR') or define('WPMICONSLITE_IMG_DIR', plugin_dir_url(__FILE__) . 'images/');
            defined('WPMICONSLITE_CSS_DIR') or define('WPMICONSLITE_CSS_DIR', plugin_dir_url(__FILE__) . 'css/');
            defined('WPMICONSLITE_FONT_CSS_DIR') or define('WPMICONSLITE_FONT_CSS_DIR', plugin_dir_url(__FILE__) . 'css/available_icons/');
            defined('WPMICONSLITE_JS_DIR') or define('WPMICONSLITE_JS_DIR', plugin_dir_url(__FILE__) . 'js/');
        }

        /**
         * Includes all the necessary files
         *
         * @since 1.0.0
         */
        function includes() {
            include(WPMICONSLITE_PATH . '/includes/classes/class-wpmenu-icon-library.php');
            include(WPMICONSLITE_PATH . '/includes/classes/class-wpmenu-icon-activation.php');
            include(WPMICONSLITE_PATH . '/includes/classes/class-wpmenu-icon-enqueue.php');
            include(WPMICONSLITE_PATH . '/includes/classes/class-wpmi-admin-menu.php');
            include(WPMICONSLITE_PATH . '/includes/classes/class-wpmenu-icon-ajax.php');
            include(WPMICONSLITE_PATH . '/includes/classes/class-wpmenu-icon-front.php');
        }

    }
    $GLOBALS[ 'wpmenuiconslite_object' ] = new WPMICONSLITE_CLASS();
}
