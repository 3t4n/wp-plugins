<?php

/**
 * class.MelibuBackendAbstract.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */
if (!class_exists('MB_AUTHOR_BOX_BACKEND_ABSTRACT')) {

    abstract class MB_AUTHOR_BOX_BACKEND_ABSTRACT {

        /**
         * Constants
         */
        const VERSION = '1.0.1.1';
        const DB_VERSION = '1.0';

        /**
         * Create Custom Tables
         */
        protected function create() {

            /**
             * Create Custom Table
             * https://codex.wordpress.org/Creating_Tables_with_Plugins
             */
            set_time_limit(0); // no PHP timeout for running install

            /**
             * Create Custom Table
             * https://codex.wordpress.org/Creating_Tables_with_Plugins
             */
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

            global $wpdb;
            $this->DB = $wpdb;

            $charset_collate = $this->DB->get_charset_collate();

            $table_name = $this->DB->prefix . 'melibu_ab';
            $create_sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
		id INT(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(100) NOT NULL,
                value TEXT NOT NULL,
                time INT(11) NOT NULL,
		PRIMARY KEY id (id)
            ) $charset_collate;";

            dbDelta($create_sql);
        }

        /**
         * Update Custom Tables
         */
        protected function update() {

            /**
             * get_option() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/get_option
             */
            if (self::DB_VERSION > get_option('mb-author-box-pro-db-version')) { // Wenn du oben in der Konstante die DB version erhöhst findet beim aktualiseiren, aktivieren ein update statt

                /**
                 * update_option() WP Since: 1.0.0
                 * https://codex.wordpress.org/Function_Reference/update_option
                 */
                update_option("mb-author-box-pro-db-version", self::DB_VERSION);
            }

            if (self::VERSION > get_option('mb-author-box-pro-version')) { // Wenn du oben in der Konstante die version erhöhst findet beim aktualiseiren, aktivieren ein update statt
                update_option("mb-author-box-pro-version", self::VERSION);
            }
        }

        /**
         * Init Options
         */
        protected function init_options() {

            /**
             * add_option() WP Since: 1.0.0
             * https://codex.wordpress.org/Function_Reference/add_option
             */
            add_option('mb-author-box-pro-version', self::VERSION);
            add_option('mb-author-box-pro-db-version', self::DB_VERSION);
        }

        /**
         * Init Filter
         */
        protected function init_filter() {

            /**
             * add_filter() WP Since: 0.71
             * https://developer.wordpress.org/reference/functions/add_filter/
             * https://codex.wordpress.org/Plugin_API/Filter_Reference
             */
            add_filter("plugin_action_links_author_box_pro", 'melibu_plugin_settings_author_box_link');
//            add_filter('mce_buttons', array($this, 'add_button'));
//            add_filter("mce_external_plugins", array($this, 'register_button'));
        }

        /**
         * Add Editor Buttons
         * 
         * @param type $buttons
         * @return type
         */
        public function add_button($buttons) {

            /**
             * array_push() PHP Since: PHP 4
             * http://php.net/manual/de/function.array-push.php
             */
            array_push($buttons, "mb_author_box_shortcode");
            return $buttons;
        }

        /**
         * Register Editor Buttons
         * 
         * @param array $plugin_array
         * @return type
         */
        public function register_button($plugin_array) {

            /**
             * plugins_url() WP Since: 2.6.0
             * https://codex.wordpress.org/Function_Reference/plugins_url
             */
            $plugin_array['mb_author_box_shortcode'] = plugins_url("js/mb-ab-shortcode.js", dirname(__FILE__));
            return $plugin_array;
        }

        /**
         * Init Settings
         */
        public function init_settings() {

            /**
             * register_setting() WP Since: 2.7.0
             * https://codex.wordpress.org/Function_Reference/register_setting
             */
//            register_setting(
//                    "mb-author-box-pro-setting-group", // ID
//                    "mb-author-box-pro-get-setting-group", // Datenbankeintrag
//                    array($this, 'save_option') // Funktion die aufgerufen wird
//            );
        }

        /**
         * Save
         * 
         * @param type $input
         * @return boolean
         */
        public function save_option($input) {

            $return = false;

            /**
             * check_admin_referer() WP Since: 1.2.0
             * https://codex.wordpress.org/Function_Reference/check_admin_referer
             */
            if (!empty($_POST) && check_admin_referer('mb-author-box-pro-nonce-action', 'mb-author-box-pro-nonce')) {

                /**
                 * current_user_can() WP Since: 2.0.0
                 * https://codex.wordpress.org/Function_Reference/current_user_can
                 * https://codex.wordpress.org/Roles_and_Capabilities
                 */
                if (!current_user_can('manage-options')) {

                    $return = $input;
                }
            }

            return $return;
        }

    }

}
