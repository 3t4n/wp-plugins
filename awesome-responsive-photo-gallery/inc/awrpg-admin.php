<?php
/**
 * Class AWRPG_Admin_Menu
 *
 * This file contains functions for setting up the admin menu and submenu pages
 * for the "Awesome Responsive Photo Gallery" plugin. These pages allow administrators to
 * manage photo gallery data, settings, and other plugin-related functionalities
 * within the WordPress admin dashboard.
 *
 * @uses  add_menu_page()	 - Adding a top-level menu page for our team plugin.
 * These functions takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * @uses  add_submenu_page() - Adding a submenu page for our team plugin.
 * The functions which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * Including other pages to make the plugin workable.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if(!class_exists('AWRPG_Admin_Menu')) {
    class AWRPG_Admin_Menu {

        public function __construct() {
            add_action('admin_menu', array($this, 'awrpg_register_menu'));
        }

        public function awrpg_register_menu() {
            // Adding a top-level menu page
            add_menu_page(
                'Awesome Gallery',
                esc_html__('Awesome Gallery', 'awesome-responsive-photo-gallery'),
                'manage_options',
                'awrpg-lists',
                array($this, 'awrpg_plugin_menu'),
                'dashicons-format-gallery',
				66
            );

            // Add a submenu page to list the galleries
            add_submenu_page(
                'awrpg-lists',
                esc_html__('Gallery Lists', 'awesome-responsive-photo-gallery'),
                esc_html__('All Galleries', 'awesome-responsive-photo-gallery'),
                'manage_options',
                'awrpg-lists',
                array($this, 'awrpg_plugin_menu')
            );

            // Add a submenu page to show the guides
            add_submenu_page(
                'awrpg-lists',
                'AWRPG Help',
                esc_html__('Help', 'awesome-responsive-photo-gallery'),
                'manage_options',
                'awrpg-help',
                array($this, 'awrpg_help_page')
            );
		}

        /* Including Process File */
        function awrpg_plugin_menu() {
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.', 'awesome-responsive-photo-gallery' ) );
            }

            // Use the global instance to render the page
            global $awrpg_gallery_management;
            $awrpg_gallery_management->render_gallery_management_page();
        }

        /* Including Help File */
        function awrpg_help_page() {
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.', 'awesome-responsive-photo-gallery' ) );
            }
            require_once ( AWRPG_PLUGIN_PATH . 'inc/awrpg-help.php' );

            $awrpg_help = new AWRPG_Help();
            $awrpg_help->render_gallery_help_page();
        }
	}
}

new AWRPG_Admin_Menu();