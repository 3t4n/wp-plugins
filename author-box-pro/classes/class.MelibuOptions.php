<?php

/**
 * class.MelibuOptions.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */

if (!class_exists('MB_AUTHOR_BOX_OPTIONS')) {

    class MB_AUTHOR_BOX_OPTIONS {

        /**
         * 
         * @param array $args
         */
        public function post_types($opt = false) {

            $args = array(
                'public' => true,
            );
            $check = array();

            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'
            $post_types = get_post_types($args, $output, $operator);

            if (!empty($post_types)) {
                if ($opt === true) {
                    foreach ($post_types as $post_type) {
                        $check[$post_type] = "no";
                    }
                    return $check;
                } else {
                    return $post_types;
                }
            }
        }

        /**
         * 
         * @return type
         */
        public function defaults() {

            $args = array(
                'public' => true
            );
            $check = array();
            
            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'
            $post_types = get_post_types($args, $output, $operator);
            
            if (!empty($post_types)) {
                foreach ($post_types as $post_type) {
                    $check[$post_type] = "below";
                }
            }
            $mbPluginABdefaultOptions = array(
                // APPEARANCE
                'avatar' => '',
                'avatar-style' => 'square',
                'avatar-shadow' => '',
                'mail' => '',
                'mail-to' => '',
                // TABS
                'about' => 'on',
                'about-label' => '',
                'about-title' => '',
                'about-weblink' => '',
                'latestposts' => '',
                'latestposts-label' => '',
                'latestposts-title' => '',
                'latestposts-number' => '',
                'contact' => '',
                'other' => '',
                'other-text' => '',
                // SOCIAL
                'social' => '',
                // PERMISSION
                'role-administrator' => 'on',
                'role-editor' => 'on',
                'role-author' => 'on',
                'role-contributer' => 'on',
                'role-subscriber' => 'on',
                // CUSTOM
                'custom-css' => '',
            );
            $result = array_merge($mbPluginABdefaultOptions, $check);
            $mbPluginABoptions = wp_parse_args(get_option('mb-author-box-pro-get-setting-group'), $result);
            return $mbPluginABoptions;
        }

        public function options() {

            global $wpdb;
            $mbPluginABoptions = $this->defaults();
            $melibu_ab = $wpdb->prefix . "melibu_ab";
            $get = $wpdb->get_results("SELECT * FROM " . $melibu_ab . " WHERE name='panel_options'");
            if ($get) {
                $data = unserialize($get[0]->value);
                if (isset($data)) {
                    $mbPluginABoptions = $data;
                }
            }
            return $mbPluginABoptions;
        }

        public function check_plugin($pluginname) {

            // Collector
            $arr = array();

            // Check if get_plugins() function exists. This is required on the front end of the
            // site, since it is in a file that is normally only loaded in the admin.
            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            // Check if plugin installed
            $plugins = get_plugins();
            $arr['plugin-installed'] = false;
            foreach ($plugins as $pluginKey => $pluginValue) {
                if ($pluginname == $pluginKey) {
                    $arr['plugin-installed'] = true;
                }
            }

            // Check if plugin active
            if (is_plugin_active($pluginname)) {
                $arr['plugin-active'] = true;
            } else {
                $arr['plugin-active'] = false;
            }

            return $arr;
        }

    }

    global $MB_AUTHOR_BOX_HELPER;
    $MB_AUTHOR_BOX_HELPER = new MB_AUTHOR_BOX_OPTIONS();
}
