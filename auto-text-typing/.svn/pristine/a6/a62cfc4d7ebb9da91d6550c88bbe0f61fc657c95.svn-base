<?php

/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Auto Text Typing
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_07_ABSTRACT')) {

    abstract class MELIBU_PLUGIN_BACKEND_07_ABSTRACT {

        const VERSION = '1.0.1';
        const DB_VERSION = '1.0';
        
        private $DB = null;

        /**
         * Create Custom Tables
         */
        public function create() {

            /**
             * Create Custom Table
             * https://codex.wordpress.org/Creating_Tables_with_Plugins
             */
//            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//            
//            global $wpdb;
//            $this->DB = $wpdb;
//            
//            $table_name = $this->DB->prefix . 'melibu_sss';
//            $charset_collate = $this->DB->get_charset_collate();
//            $create_sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
//		id int(11) NOT NULL AUTO_INCREMENT,
//		name varchar(100) NOT NULL,
//                value varchar(100) NOT NULL,
//                time int(11) NOT NULL,
//		PRIMARY KEY id (id)
//            ) $charset_collate;";
//
//            dbDelta($create_sql);

            update_option('melibu-plugin-typing-db-version');
        }

        /**
         * Update Custom Tables
         * @global type $wpdb
         * @return type
         */
        public function update() {

            require_once(ABSPATH . 'wp-load.php');
            global $wpdb;
            $this->DB = $wpdb;

            set_time_limit(0); // no PHP timeout for running updates

            /**
             * get_option() WP Since: 1.5.0
             * https://codex.wordpress.org/Function_Reference/get_option
             */
            if (self::DB_VERSION > get_option('melibu-plugin-typing-db-version')) {

//                /**
//                 * Update Custom Tables
//                 */
//                $table_name = $this->DB->prefix . 'melibu_sss';
//                
//                $row3 = $this->DB->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='" . $table_name . "' AND column_name='type'");
//                if (empty($row3)) {
//                    $alter_sql3 = "ALTER TABLE " . $table_name . " ADD type varchar(150) NOT NULL;";
//                    $this->DB->query($alter_sql3);
//                }

                /**
                 * update_option() WP Since: 1.0.0
                 * https://codex.wordpress.org/Function_Reference/update_option
                 */
                update_option("melibu-plugin-typing-db-version", self::DB_VERSION);
            }

            if (self::VERSION > get_option('melibu-plugin-typing-version')) {

                update_option("melibu-plugin-typing-version", self::VERSION);
            }
        }

        /**
         * 
         */
        public function init_options() {

            /**
             * add_option() WP Since: 1.0.0
             * https://codex.wordpress.org/Function_Reference/add_option
             */
            add_option('melibu-plugin-typing-version', self::VERSION);
            add_option('melibu-plugin-typing-db-version', self::DB_VERSION);
        }

        /**
         * 
         */
        public function init_filter() {

            /**
             * add_filter() WP Since: 0.71
             * https://developer.wordpress.org/reference/functions/add_filter/
             */
            add_filter('mce_buttons', array($this, 'add_button'));
            add_filter("mce_external_plugins", array($this, 'register_button'));
        }

        /**
         * 
         * @param type $buttons
         * @return type
         */
        public function add_button($buttons) {

            array_push($buttons, "melibu_plugin_typing_button");
            return $buttons;
        }

        /**
         * 
         * @param array $plugin_array
         * @return type
         */
        public function register_button($plugin_array) {

            $plugin_array['melibu_plugin_typing_button'] = plugins_url("js/mb-att-shortcode.js", dirname(__FILE__));
            return $plugin_array;
        }

        /**
         * 
         */
        public function init_settings() {

            /**
             * register_setting() WP Since: 2.7.0
             * https://codex.wordpress.org/Function_Reference/register_setting
             */
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "message", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "text-color", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "background-color", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "padding", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "border-radius", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "border-width", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "border-style", // Option
                    array($this, 'save_option') // Function
            );
            
            register_setting(
                    "melibu-plugin-typing-group", // Setting
                    "copyright", // Option
                    array($this, 'save_option') // Function
            );
        }

        /**
         * 
         * @param type $input
         * @return boolean
         */
        public function save_option($input) {

            $return = $input;
            if (!empty($_POST) && check_admin_referer('melibu-plugin-typing-nonce-action', 'melibu-plugin-typing-nonce')) {

                /**
                 * https://codex.wordpress.org/Function_Reference/current_user_can
                 * https://codex.wordpress.org/Roles_and_Capabilities
                 * since 2.0.0
                 */
                if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                    $return = false;
                }

                return $return;
            }
        }

        /**
         * 
         * @return type
         */
        public function save_upload() {

            if (!function_exists('wp_handle_upload')) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }

            if (!empty($_POST) && check_admin_referer('melibu-plugin-typing-nonce-action', 'melibu-plugin-typing-nonce')) {

                /**
                 * https://codex.wordpress.org/Function_Reference/current_user_can
                 * https://codex.wordpress.org/Roles_and_Capabilities
                 * since 2.0.0
                 */
                if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                    return false;
                }

                $melibuPlugin_get_download_button_logo = get_option('melibu-plugin-typing-logo-get');
                unlink($melibuPlugin_get_download_button_logo['file']);

                $uploadedfile = $_FILES['melibu-plugin-template-logo-get'];
                $upload_overrides = array('test_form' => false);
                $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

                if ($movefile && !isset($movefile['error'])) {
                    return $movefile;
                } else {
                    /**
                     * Error generated by _wp_handle_upload()
                     * @see _wp_handle_upload() in wp-admin/includes/file.php
                     */
                    echo $movefile['error'];
                }
            }
        }

    }

}
