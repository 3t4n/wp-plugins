<?php

namespace Ambikly\Admin;
class Assets
{
    public function __construct()
    {

        add_action('admin_enqueue_scripts', [$this, 'register']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    public function register($hook_suffix)
    {
        if ($hook_suffix !== 'toplevel_page_ambikly') {
            return;
        }

        // Libraries
        wp_register_style(
            'ambikly-select2-style',
            AMBIKLY_ASSETS_URI . 'lib/select2/css/select2.css',
        );
        wp_register_script(
            'ambikly-select2-script',
            AMBIKLY_ASSETS_URI . 'lib/select2/js/select2.js'
        );

        // common css js
        wp_register_script(
            'ambikly-admin-common-script',
            AMBIKLY_ASSETS_URI . 'admin/js/shared-script.js',
            [],
            AMBIKLY_VERSION
        );

        wp_register_style(
            'ambikly-admin-common-style',
            AMBIKLY_ASSETS_URI . 'admin/css/common-style.css',
            [],
            AMBIKLY_VERSION
        );

        // Pages for product categories
        wp_register_style(
            'ambikly-admin-page-style', // This css is for Product add, category add and form design for setting page as well
            AMBIKLY_ASSETS_URI . 'admin/css/page-style.css',
            [],
            AMBIKLY_VERSION
        );

        wp_register_script(
            'ambikly-admin-product-script',
            AMBIKLY_ASSETS_URI . 'admin/js/product-script.js',
            ['ambikly-admin-common-script', 'jquery', 'ambikly-select2-script'],
            AMBIKLY_VERSION
        );


        wp_register_script(
            'ambikly-admin-category-script',
            AMBIKLY_ASSETS_URI . 'admin/js/category-script.js',
            ['ambikly-admin-common-script'],
            AMBIKLY_VERSION
        );

        wp_register_script(
            'ambikly-admin-order-script',
            AMBIKLY_ASSETS_URI . 'admin/js/order-script.js',
            ['ambikly-admin-common-script'],
            AMBIKLY_VERSION
        );

        wp_register_script(
            'ambikly-admin-payment-script',
            AMBIKLY_ASSETS_URI . 'admin/js/payment-script.js',
            ['ambikly-admin-common-script'],
            AMBIKLY_VERSION
        );

        // end of product and categories

        // Css for Dashboard
        wp_register_style(
            'ambikly-admin-dashboard',
            AMBIKLY_ASSETS_URI . 'admin/css/dashboard-style.css',
            [],
            AMBIKLY_VERSION
        );

        // Setting Script and Styles

        wp_register_style(
            'ambikly-admin-setting-style',
            AMBIKLY_ASSETS_URI . 'admin/css/setting-style.css',
            [],
            AMBIKLY_VERSION
        );
        wp_register_script(
            'ambikly-admin-settings-script',
            AMBIKLY_ASSETS_URI . 'admin/js/setting-script.js',
            ['ambikly-admin-common-script'],
            AMBIKLY_VERSION,
            true
        );


    }

    public function enqueue($hook_suffix)
    {
        if ($hook_suffix !== 'toplevel_page_ambikly') {
            return;
        }

        $sub = isset($_GET['sub']) ? sanitize_text_field($_GET['sub']) : '';


        wp_enqueue_style('ambikly-admin-common-style');

        if ($sub === "add-new-product") {

            wp_enqueue_media();

            wp_enqueue_style('ambikly-select2-style');

            wp_enqueue_style('ambikly-admin-page-style');

            wp_enqueue_script('ambikly-admin-product-script');


        } else if ($sub === "add-new-category") {

            wp_enqueue_media();

            wp_enqueue_style('ambikly-admin-page-style');

            wp_enqueue_script('ambikly-admin-category-script');

        } else if ($sub == "new-order") {

            wp_enqueue_media();

            wp_enqueue_style('ambikly-admin-page-style');

            wp_enqueue_script('ambikly-admin-order-script');

        } else if ($sub === "new-payment") {

            wp_enqueue_media();

            wp_enqueue_style('ambikly-admin-page-style');

            wp_enqueue_script('ambikly-admin-payment-script');

        } else if ($sub === "settings") {

            wp_enqueue_style('ambikly-admin-page-style');

            wp_enqueue_style('ambikly-admin-setting-style');

            wp_enqueue_script('ambikly-admin-settings-script');

        } else if ($sub == '') { // This is for Dashboard Page

            wp_enqueue_style('ambikly-admin-dashboard');
        }

        wp_localize_script('ambikly-admin-common-script', 'ambikly_admin', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);

    }
}