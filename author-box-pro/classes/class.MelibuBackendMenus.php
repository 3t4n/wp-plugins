<?php

require_once 'class.MelibuBackendAbstract.php';

/**
 * class.MelibuBackendMenus.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */
if (!class_exists('MB_AUTHOR_BOX_BACKEND_MENUS')) {

    class MB_AUTHOR_BOX_BACKEND_MENUS extends MB_AUTHOR_BOX_BACKEND_ABSTRACT {

        /**
         * Admin Menus
         */
        public function add_menu() {

            /**
             * current_user_can() WP Since: 2.0.0
             * https://codex.wordpress.org/Function_Reference/current_user_can
             * https://codex.wordpress.org/Roles_and_Capabilities
             */
            if (!current_user_can('manage_options')) {
                return;
            }
            
            /**
             * add_plugins_page() 
             * https://developer.wordpress.org/reference/functions/add_menu_page/ 
             */
            add_menu_page('MB Author Box', // $page_title  
                    'MB ABP', // $menu_title  
                    'manage_options', // $capability  
                    'melibu-plugin-author', // $menu_slug  
                    array($this, 'welcome'), // $function // Hier rufen wir nach dem registrieren des Menues unsere funktion auf $this->welcome();          
                    plugins_url('img/icon-MB-20.png', dirname(__FILE__)) // $icon_url Der Pfad zum Menü Icon
            );

            /**
             * add_submenu_page() WP Since: 1.5.0 
             * https://developer.wordpress.org/reference/functions/add_submenu_page/ 
             */
            add_submenu_page('melibu-plugin-author', // $parent_slug 
                    'MB Author Box - Settings', // $page_title 
                    __('Options', 'author-box-pro'), // $menu_title 
                    'manage_options', // $capability 
                    'melibu-plugin-author-admin-control-menu-1', // $menu_slug 
                    array($this, 'panel') // $function 
            );

            /**
             * add_submenu_page() WP Since: 1.5.0 
             * https://developer.wordpress.org/reference/functions/add_submenu_page/ 
             */
            add_submenu_page('melibu-plugin-author', // $parent_slug 
                    'MB Author Box - About', // $page_title 
                    __('About', 'author-box-pro'), // $menu_title 
                    'manage_options', // $capability 
                    'melibu-plugin-author-admin-control-menu-2', // $menu_slug 
                    array($this, 'about') // $function 
            );
        }

        /**
         * Menu Welcome
         */
        public function welcome() {
            require_once MB_AUTHOR_BOX_PATH . 'html/docu.php';
        }

        /**
         * Menu Settings
         */
        public function panel() {
            require_once MB_AUTHOR_BOX_PATH . 'html/panel.php';
        }

        /**
         * Menu About
         */
        public function about() {
            require_once MB_AUTHOR_BOX_PATH . 'html/about.php';
        }

    }

}
