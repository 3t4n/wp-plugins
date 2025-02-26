<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('FSDT_Enqueue')) {
    class FSDT_Enqueue {
        function __construct() {
            add_action('wp_enqueue_scripts', [$this, 'register_frontend_assets']);
            add_action('admin_enqueue_scripts', [$this, 'register_fsdt_admin_assets']);
        }

        function register_frontend_assets() {
            wp_enqueue_style('fsdt-elegant-icon-style', FSDT_URL . '/icon-picker/assets/stylesheets/elegant-icons.min.css', array(), FSDT_VERSION);
            wp_enqueue_script('fsdt-frontend-fontawesome-script', FSDT_URL . '/icon-picker/assets/js/fontawesome-script.js', ['jquery'], FSDT_VERSION);
            wp_enqueue_style('fsdt-fonts-roboto', FSDT_URL . '/assets/font-face/Roboto/stylesheet.css', array(), FSDT_VERSION);
            wp_enqueue_style('fsdt-fonts-poppins', FSDT_URL . '/assets/font-face/Poppins/stylesheet.css', array(), FSDT_VERSION);
            wp_enqueue_style('fsdt-frontend-style', FSDT_URL . '/assets/css/fsdt-frontend.css', [], filemtime(FSDT_PATH . '/assets/css/fsdt-frontend.css'));
            wp_enqueue_script('fsdt-frontend-script', FSDT_URL . '/assets/js/fsdt-frontend.js', ['jquery'], filemtime(FSDT_PATH . '/assets/js/fsdt-frontend.js'));
             wp_enqueue_style('fsdt-fontawesome-style', FSDT_URL . '/assets/fontawesome/css/all.min.css', array(), FSDT_VERSION);

            wp_localize_script(
                'fsdt-frontend-script',
                'ajax_obj',
                array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('fsdt-frontend-nonce')
                )
            );
        }
        function register_fsdt_admin_assets() {

            wp_enqueue_media();
            wp_enqueue_editor();
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_style('fsdt-backend-style', FSDT_URL . '/assets/css/fsdt-backend.css', array(), FSDT_VERSION);
            wp_enqueue_style('fsdt-iconpicker-style', FSDT_URL . '/icon-picker/assets/stylesheets/universal-icon-picker.css', array(), NULL);
            wp_enqueue_script('fsdt-icon-picker', FSDT_URL . '/icon-picker/assets/js/universal-icon-picker.js', array(), NULL);
            wp_enqueue_script('fsdt-backend-script', FSDT_URL . '/assets/js/fsdt-backend.js', array('jquery', 'wp-color-picker', 'wp-util', 'jquery-ui-sortable', 'fsdt-icon-picker'), filemtime(FSDT_PATH . '/assets/js/fsdt-backend.js'));
            $translation_strings = array(
                'ajax_message' => esc_html__('Please wait', 'floating-side-tab'),
                'delete_form_confirm' => esc_html__('Are you sure you want to delete this form?', 'floating-side-tab'),
                'option_delete_confirm' => esc_html__('Are you sure you want to delete option?', 'floating-side-tab'),
                'are_your_sure' => esc_html__('It looks like you have been editing something. If you leave before saving, your changes will be lost.', 'floating-side-tab'),
                'copy_form_confirm' => esc_html__('Are you sure you want to copy this form?', 'floating-side-tab')
            );
            wp_localize_script(
                'fsdt-backend-script',
                'fsdt_backend_obj',
                array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'ajax_nonce' => wp_create_nonce('fsdt-nonce'),
                    'plugin_url' => FSDT_URL,
                    'translation_strings' => $translation_strings
                )
            );
        }
    }

    new FSDT_Enqueue();
}
