<?php
/**
 * Plugin Name: Password Strength for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/password-strength-for-woocommerce/
 * Description: Disables password strength enforcement in WooCommerce.
 * Version: 1.0.3
 * Author: WP Zone
 * WC tested up to:  9.1.4
 * Author URI: https://wpzone.co/?utm_source=password-strength-for-woocommerce&utm_medium=link&utm_campaign=wp-plugin-author-uri
 * License: GNU General Public License version 3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

 */

// product-sales-report-for-woocommerce/hm-product-sales-report.php
function hm_wcps_on_before_woocommerce_init()
{
	class_exists('Automattic\WooCommerce\Utilities\FeaturesUtil') && Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__);
}
add_action('before_woocommerce_init', 'hm_wcps_on_before_woocommerce_init');

/*
add_filter('woocommerce_min_password_strength', 'hm_wcps_min_strength');
function hm_wcps_min_strength($strength) {
	return 0;
}
*/

add_action('wp_enqueue_scripts', 'hm_wcps_enqueue_scripts');
function hm_wcps_enqueue_scripts() {
	wp_enqueue_script('hm_wcps', plugins_url('js/password-strength-wc.js', __FILE__), array('wc-password-strength-meter'), false, true);
	
}