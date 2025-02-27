<?php

namespace forge12\floating_menu\component\floatingmenu {
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Class Backend
     */
    class Backend
    {
        /**
         * Admin constructor.
         */
        public function __construct()
        {
            add_action('admin_enqueue_scripts', array($this, 'addStyles'));
        }

        /**
         * Add the styles for the form
         */
        public function addStyles($hook)
        {
            wp_enqueue_style('f12_floating_menu_plugin');

	        wp_register_style('f12_floating_menu_admin', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_admin.css');
	        wp_enqueue_style('f12_floating_menu_admin');

            wp_register_script('f12_floating_menu_social_share', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_social_share.js');
            wp_enqueue_script('f12_floating_menu_social_share');


            wp_register_script('f12_floating_menu_icon_box', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_icon_box.js');
	        wp_enqueue_script('f12_floating_menu_icon_box');

	        wp_register_style('f12_floating_menu_icon_box', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_icon_box.css');
	        wp_enqueue_style('f12_floating_menu_icon_box');

            wp_register_style('f12_floating_menu_button', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_button.css');
            wp_enqueue_style('f12_floating_menu_button');

            wp_register_style('f12_floating_menu_select2', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_select2.css');
            wp_enqueue_style('f12_floating_menu_select2');

            wp_register_script('f12_floating_menu_select2', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_select2.js');
            wp_enqueue_script('f12_floating_menu_select2');
            wp_localize_script('f12_floating_menu_select2', 'select2_obj', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('select2_reload_pages')
            ]);

            wp_register_script('f12_floating_menu_select2_vendor', plugin_dir_url(__FILE__) . 'assets/vendor/select2/select2.min.js');
            wp_enqueue_script('f12_floating_menu_select2_vendor');

            wp_register_style('f12_floating_menu_select2_vendor', plugin_dir_url(__FILE__) . 'assets/vendor/select2/select2.min.css');
            wp_enqueue_style('f12_floating_menu_select2_vendor');

            wp_register_style('f12_floating_menu_fontawesome', plugin_dir_url(__FILE__) . 'assets/vendor/fontawesome/css/all.css');
            wp_enqueue_style('f12_floating_menu_fontawesome');

	        wp_register_script('f12_floating_menu_tab_container', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_tab_container.js');
	        wp_enqueue_script('f12_floating_menu_tab_container');

            wp_register_script('f12_floating_menu_control_menu', plugin_dir_url(__FILE__) . 'assets/wp_customize_control_menu.js');
            wp_enqueue_script('f12_floating_menu_control_menu');

            wp_register_script('f12_floating_menu_control_post_types', plugin_dir_url(__FILE__) . 'assets/wp_customize_control_post_types.js');
            wp_enqueue_script('f12_floating_menu_control_post_types');
        }
    }
}