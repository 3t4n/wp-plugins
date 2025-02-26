<?php
/**
 * Plugin Name: Easy Error Log
 *
 * @author            Sabbir Sam, devsabbirahmed
 * @copyright         2022- devsabbirahmed
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Easy Error Log
 * Plugin URI: https://github.com/sabbirsam/wp-error-log
 * Description: Experience hassle-free debugging by conveniently defining error modes and debug log constants within the config file. No need to delve into core files – simply toggle the settings. Logs PHP errors and access all errors in a single, user-friendly dashboard page, making it effortless to identify and rectify issues.
 * Version:           2.1.1
 * Requires at least: 5.9 or higher
 * Requires PHP:      5.4 or higher
 * Author:            sabbirsam
 * Author URI:        https://github.com/sabbirsam/
 * Text Domain:       easy-error-log
 * Domain Path: /languages/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined('ABSPATH') || die('Hey, what are you doing here? You silly human!');

if ( file_exists(__DIR__ . '/vendor/autoload.php') ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

use EEL\Inc\EEL_Activate; //phpcs:ignore
use EEL\Inc\EEL_Deactivate;  //phpcs:ignore

define( 'EASY_ERROR_LOG_VERSION', '2.1.1' );
define( 'EASY_ERROR_LOG_FILE', __FILE__ );
define( 'EASY_ERROR_LOG_DIR_URL', plugin_dir_url( __FILE__ ) );


if (!class_exists('EEL_Error')) {
    class EEL_Error {
        private $base;
        
        public function __construct() {
            $this->base = new EEL\Inc\EEL_Base();
        }

        public function eel_activate() {
            EEL\Inc\EEL_Activate::eel_activate();
        }

        public function eel_deactivate() {
            EEL\Inc\EEL_Deactivate::eel_deactivate();
        }
    }

    $err = new EEL_Error();
    register_activation_hook(__FILE__, array($err, 'eel_activate'));
    register_deactivation_hook(__FILE__, array($err, 'eel_deactivate'));
}
