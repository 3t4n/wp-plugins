<?php

/******
 * Include file in admin panel
 */
if (is_admin()) {
    if (!function_exists('wcatcbll_add_admin_scripts') && (isset($_REQUEST['page']) && $_REQUEST['page'] == 'hwx-wccb')) {
        function wcatcbll_add_admin_scripts() {
            // Enqueue styles
            wp_enqueue_style(WCATCBLL_NAME . '-btdmin', WCATCBLL_CART_CSS . 'bootstrap.min.css', array(), wp_rand());
            wp_enqueue_style(WCATCBLL_NAME . '-owl-carousel-css', WCATCBLL_CART_CSS . 'owl.carousel.min.css', array(), wp_rand());
            wp_enqueue_style(WCATCBLL_NAME . '-owl-carousel-theme', WCATCBLL_CART_CSS . 'owl.theme.default.min.css', array(), wp_rand());
            wp_enqueue_style(WCATCBLL_NAME . '-hover', WCATCBLL_CART_CSS . 'hover.css', array(), wp_rand());
            wp_enqueue_style(WCATCBLL_NAME . '-hover-min', WCATCBLL_CART_CSS . 'hover-min.css', array(), wp_rand());
            wp_enqueue_style(WCATCBLL_NAME . '-readytouse', WCATCBLL_CART_CSS . 'ready-to-use.css', array(), wp_rand());
            wp_enqueue_style(WCATCBLL_NAME . '-admin', WCATCBLL_CART_CSS . 'admin.css', array(), wp_rand());

            // Use local Font Awesome CSS
            wp_enqueue_style('fontawesome', WCATCBLL_CART_CSS . 'font-awesome.min.css', array(), '4.7.0'); // Make sure to adjust this to your actual path and version

            wp_enqueue_style('wp-color-picker');

            // Enqueue scripts
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script(WCATCBLL_NAME . '-wp-color-picker-alpha', WCATCBLL_CART_JS . 'wp-color-picker-alpha.min.js', array('wp-color-picker'), wp_rand(), true);
            wp_enqueue_script(WCATCBLL_NAME . '-btsminjs', WCATCBLL_CART_JS . 'bootstrap.min.js', array('jquery'), wp_rand(), true);
            wp_enqueue_script(WCATCBLL_NAME . '-owl-carousel-js', WCATCBLL_CART_JS . 'owl.carousel.min.js', array(), wp_rand(), true);
            wp_enqueue_script(WCATCBLL_NAME . '-ranger', WCATCBLL_CART_JS . 'ranger.js', array('jquery'), wp_rand(), true);
            wp_enqueue_script(WCATCBLL_NAME . '-admin', WCATCBLL_CART_JS . 'admin.js', array('jquery'), wp_rand(), true);

            // Localize script
            $admin_url = strtok(admin_url('admin-ajax.php', (is_ssl() ? 'https' : 'http')), '?');
            wp_localize_script(WCATCBLL_NAME . '-admin', 'catcbll_vars', array(
                'ajaxurl' => $admin_url,
                'ajax_public_nonce' => wp_create_nonce('ajax_public_nonce'),
                'no_export_data' => __('There Are No Exporting Data In Your Selection Fields', 'catcbll'),
            ));
        }
        add_action('admin_enqueue_scripts', 'wcatcbll_add_admin_scripts');
    } else {
        function wcatcbll_add_admin_prd_scripts() {
            // Use local Font Awesome CSS
            wp_enqueue_style('fontawesome', WCATCBLL_CART_CSS . 'font-awesome.min.css', array(), wp_rand()); // Adjust the path accordingly
            wp_enqueue_style(WCATCBLL_NAME . '-admin_prd_css', WCATCBLL_CART_CSS . 'wccb_admin_prd.css', array(), wp_rand());

            // Enqueue scripts
            wp_enqueue_script(WCATCBLL_NAME . '-admin_prd_js', WCATCBLL_CART_JS . 'wccb_admin_prd.js', array('jquery'), wp_rand(), true);
            wp_localize_script(WCATCBLL_NAME . '-admin_prd_js', 'wcatcbll_vars', array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'product_btn_labal' => __('Label', 'catcbll'),
                'product_btn_url' => __('URL', 'catcbll'),
                'product_btn_lbl_plchldr' => __('Add To Basket Or Shop Now Or Shop On Amazon', 'catcbll'),
                'product_btn_lbl_desc' => __('This Text Will Be Shown On The Button Linking To The External Product', 'catcbll'),
                'product_btn_url_desc' => __('Enter The External URL To The Product', 'catcbll'),
                'product_btn_lbl_ont' => __('Open link In New Tab', 'catcbll'),
                'product_btn_ont_desc' => __('If Checkbox Is Check Then Button Link Open In New Tab', 'catcbll'),
            ));
        }
        add_action('admin_enqueue_scripts', 'wcatcbll_add_admin_prd_scripts');
    }
} else {
    function wcatcbll_add_admin_scripts() {
        wp_enqueue_style('fontawesome', WCATCBLL_CART_CSS . 'font-awesome.min.css', array(), wp_rand()); // Adjust the path accordingly
        wp_enqueue_style(WCATCBLL_NAME . '-users', WCATCBLL_CART_CSS . 'users.css', array(), wp_rand());
        wp_enqueue_style(WCATCBLL_NAME . '-hover', WCATCBLL_CART_CSS . 'hover.css', array(), wp_rand());
        wp_enqueue_style(WCATCBLL_NAME . '-hover-min', WCATCBLL_CART_CSS . 'hover-min.css', array(), wp_rand());
        wp_enqueue_style(WCATCBLL_NAME . '-readytouse', WCATCBLL_CART_CSS . 'ready-to-use.css', array(), wp_rand());
    }
    add_action('wp_enqueue_scripts', 'wcatcbll_add_admin_scripts');
}
