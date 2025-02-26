<?php
/*
* Plugin Name: Find Pages By Template
* Plugin URI:  https://developer.wordpress.org/plugins/find-pages-by-template/
* Description: Tiny plugin which provides a tool to find which pages are using a specific template
* Version:     1.0.3
* Author:      Shaun Wall
* Author URI:  https://shaunwall.co.uk/
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!class_exists('fpbt')) {
    class FPBT
    {
        /**
         * Initialises the plugin
         */
        public static function init()
        {
            wp_enqueue_style('fpbt', plugin_dir_url(__FILE__) . 'admin/css/fpbt.css');
            add_action('admin_menu', 'fpbt::initMenu');
        }

        /**
         * Adds a menu item to the Tools menu
         */
        public static function initMenu()
        {
            add_management_page(
                'Find Pages By Template',
                'Find Pages By Template',
                'manage_options',
                'find-pages-by-template',
                'fpbt::adminPage'
            );
        }

        /**
         * Gets and processes relevant data, and sets up the admin page
         */
        public static function adminPage()
        {
            // Check if the user is able to access options
            if (!current_user_can('manage_options')) {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }

            if ($_POST['fpbt_submit']) {
                $tmp = explode('|', $_POST['fpbt_template']);
                $template_title = $tmp[1];
                $template_file  = $tmp[0];
                $pages = fpbt::searchPagesByTemplate($template_file);
            }

            $templates = fpbt::getTemplates();
            include_once('fpbt_admin.php');
        }

        /**
         * Gets all the templates in the current theme
         * @return array           Array of all templates in the current theme, where the key is the name, and value is the filename
         */
        public static function getTemplates()
        {
            return get_page_templates();
        }

        /**
         * Searches for all pages using the passes template filename
         * @param  string $filename File name including extension of the template to search with
         * @return object           Object containing all the pages using the template
         */
        public static function searchPagesByTemplate($filename)
        {
            $template = sanitize_text_field($filename);
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => $template
            ));

            return $pages;
        }
    }

    fpbt::init();
}
