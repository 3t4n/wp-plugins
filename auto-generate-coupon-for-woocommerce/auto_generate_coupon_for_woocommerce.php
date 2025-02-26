<?php

/*
  Plugin Name:       Auto generate coupon for Woocommerce
  Description:       Auto generate coupon is a wonderfull plugin for creating coupon at the thankyou page to use for next Order.
  Plugin URI:        https://wordpressgeek.net/auto-generate-coupon-for-woocommerce
  Contributors:      @GhourbanianSaeed
  Author:            Saeed Ghourbanian
  Author URI:        https://www.linkedin.com/in/saeed-ghourbanian/
  Tags:              Auto coupon generator for woocommerce
  Version:           1.0
  Stable tag:        1.0
  Requires at least: 4.5
  Tested up to:      5.5.1
  Text Domain:       auto_generate_coupon
  Domain Path:       /languages
  License:           GPL v2 or later
  License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 */


// exit if file is called directly
if (!defined('ABSPATH')) {

    exit;
}

$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
if (!in_array('woocommerce/woocommerce.php', $active_plugins)) {
    
}

function auto_generate_coupon_load_text_domain() {
    $locale = get_locale();
    load_textdomain('auto_generate_coupon', plugin_dir_path(__FILE__) . 'languages/auto_generate_coupon-' . $locale . '.mo');
    load_plugin_textdomain('auto_generate_coupon');
}

add_action('plugins_loaded', 'auto_generate_coupon_load_text_domain');

if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';

    function add_auto_generate_coupon_stylesheet() {
        wp_enqueue_style('style', plugins_url('admin/css/style.css', __FILE__));
        wp_style_add_data('style', 'rtl', 'replace');
        
    }

    add_action('admin_print_styles', 'add_auto_generate_coupon_stylesheet');
}

require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';

function auto_generate_coupon_default_options() {
    return array(
        'coupon_message' => esc_html__('here your new coupon %s', 'auto_generate_coupon'),
        'expiry_date' => '13-10-2040',
        'free_shipping' => '0',
        'coupon_amount' => '0',
        'individual_use' => '0',
        'discount_type' => 'fixed_cart',
    );
}


