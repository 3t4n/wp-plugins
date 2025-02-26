<?php

defined('ABSPATH') or exit;
/**
 * Plugin Name: LaTeX2HTML
 * Plugin URI: https://latex2html.vanabel.cn
 * Description: Translate your Latex document into HTML+MathJax.
 * Version: 2.6.2
 * Author: Van Abel
 * Author URI: https://home.vanabel.cn
 * Text Domain: latex2html
 * Domain Path: /langs
 * License: GPL2
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see
 * https:   //www.gnu.org/Licenses/gpl-2.0`html.
 */

register_activation_hook(__FILE__, [ 'l2h_main_class', 'on_activation' ]);
register_deactivation_hook(__FILE__, [ 'l2h_main_class', 'on_deactivation' ]);
//register_deactivation_hook( __FILE__, [ 'l2h_db_class', 'l2h_db_drop' ] );
register_uninstall_hook(__FILE__, [ 'l2h_main_class', 'on_uninstall' ]);

add_action('plugins_loaded', [ 'l2h_main_class', 'init' ]);
if(!class_exists('l2h_main_class')) {
    class l2h_main_class
    {
        protected static $instance;
        public const l2hVER   = '2.6.2';
        public const l2hdbVER = '1.0.1';
        public const l2hlud   = '02/01/2025';
        // Upgrade should be add in inc/settings.php libs/db.inc.php

        public static function init()
        {
            is_null(self::$instance) and self::$instance = new self();
            return self::$instance;
        }

        public static function on_activation()
        {
            if (!current_user_can('activate_plugins')) {
                return;
            }
            // Initialize the setting options
            add_option('l2h_options', []);
            add_option('l2h_upgrade_options', []);
            new l2h_default_options_class();
            // Create database for bibtex
            $db = new l2h_db_class();
            $db->l2h_db_create();
            // Restore the bibtex.bib
            $timezone_format = _x('YmdHis', 'timezone date format', 'latex2html');
            $time            = date_i18n($timezone_format);
            $bibtex          = wp_upload_dir()['basedir'] . '/bibtex.bib.txt';
            $bibtex_backup   = wp_upload_dir()['basedir'] . '/bibtex_backup_' . $time . '.txt';
            $bibtex_org      = plugin_dir_path(__FILE__) . 'inc/bibtex.bib.txt';
            if (file_exists($bibtex)) {
                // Backup the old bibtex.bib.txt
                if (!@copy($bibtex, $bibtex_backup)) {
                    // Create a new WP_Error instance and add an error
                    $error = new WP_Error();
                    $error->add('backup_failed', "Failed to backup bibtex.bib.txt to {$bibtex_backup}");
                    // You can log the error or handle it accordingly
                    // You can also add more information, such as the function name, error code, etc.
                    return $error; // Optionally return the WP_Error object
                }
            } else {
                // Copy the original bibtex.bib.txt if it doesn't exist
                if (!@copy($bibtex_org, $bibtex)) {
                    // Create a new WP_Error instance and add an error
                    $error = new WP_Error();
                    $error->add('copy_failed', "Failed to copy bibtex.bib.txt from {$bibtex_org} to {$bibtex}");
                    // Handle or return the error
                    return $error; // Optionally return the WP_Error object
                }
            }                      
        }

        public static function on_deactivation()
        {
            if(!current_user_can('activate_plugins')) {
                return;
            }
            // Only for development
            //delete_option( 'l2h_options' );
            //delete_option( 'l2h_upgrade_options' );
            //$db = new l2h_db_class;
            //$db->l2h_db_drop();

            // Remove the backups of bibtex.bib.txt
            $bib_dir = wp_upload_dir()['basedir'];
            foreach(glob($bib_dir . '/bibtex_backup_*.txt') as $fname) {
                wp_delete_file($fname);
            }
        }

        public static function on_uninstall()
        {
            if(!current_user_can('activate_plugins')) {
                return;
            }
            // Check if the constant WP_UNINSTALL_PLUGIN is defined
            if (!defined('WP_UNINSTALL_PLUGIN')) {
                return;
            }
            //check_admin_referer( 'bulk-plugins' );
            if(__FILE__ != WP_UNINSTALL_PLUGIN) {
                return;
            }
            // Clear up
            delete_option('l2h_options');
            delete_option('l2h_upgrade_options');
            $db = new l2h_db_class();
            $db->l2h_db_drop();
            // Remove the backups of bibtex.bib.txt
            $bib_dir = wp_upload_dir()['basedir'];
            foreach(glob($bib_dir . '/bibtex_backup_*.txt') as $fname) {
                wp_delete_file($fname);
            }
        }

        public function __construct()
        {
            /**
             * Settings
             */
            if (is_admin()) {
                new l2h_settings_class();
            }
            /**
             * Core
             */
            new l2h_core_class();
                // Add settings link
            add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links');
            function add_action_links($links)
            {
                $mylinks = [
                  '<a href="' . admin_url('options-general.php?page=latex2html') . '">' . __('Settings', 'latex2html') . '</a>',
                ];
                return array_merge($links, $mylinks);
            }
        }
    }
}
/**
 * Classes
 */
require_once(dirname(__FILE__) . '/inc/options.php');
require_once(dirname(__FILE__) . '/inc/settings.php');
require_once(dirname(__FILE__) . '/inc/core.php');
require_once(dirname(__FILE__) . '/inc/db.inc.php');
require_once(dirname(__FILE__) . '/inc/bibtex.php');
require_once(dirname(__FILE__) . '/inc/trans.php');
/**
 * Load languages
 */
new l2h_load_language_class();
