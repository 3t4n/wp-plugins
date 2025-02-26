<?php
/**
 * Affiliate Coupon Lite
 *
 * @package     AffiliateCoupon
 * @author      CouponPlugin.co
 * @license     GPL-2.0+
 * @link        https://couponplugin.co
 *
 * @wordpress-plugin
 * Plugin Name: Affiliate Coupon Lite
 * Plugin URI:  https://couponplugin.co
 * Description: A Affiliate Coupon Plugin to add coupon and deal functionality to your wordpress site.
 * Version:     1.0.0
 * Author:      CouponPlugin.co
 * Author URI:  https://couponplugin.co
 * Text Domain: affiliate-coupon-lite
 * License:     GPL-2.0+
 * Domain Path:  /languages
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires WP:  4.5
 * Requires PHP: 5.6
 */

/*
Affiliate Coupon Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Coupon Plugin Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Coupon Plugin Lite. If not, see License URI.
*/

namespace AffiliateCoupon;

if (!defined('ABSPATH')) {
    exit;
}
/**
 * Affiliate Coupon Initializer
 *
 * @since 1.0.0
 *
 * @return void
 */
function affiliate_coupon_init()
{
    define('AFFILIATE_COUPON', __FILE__);
    define('AFFILIATE_COUPON_LITE_PATH', plugin_dir_path(__FILE__));
    $plugin_url = plugin_dir_url(__FILE__);
    if (is_ssl()) {
        $plugin_url = str_replace('http://', 'https://', $plugin_url);
    }
    define('AFFILIATE_COUPON_LITE_TEXT_DOMAIN', 'affiliate-coupon-lite');
    define('AFFILIATE_COUPON_LITE_URL', $plugin_url);
    define('AFFILIATE_COUPON_LITE_BASENAME', plugin_basename(__FILE__));
    function load_text_domain()
    {
        load_plugin_textdomain(AFFILIATE_COUPON_LITE_TEXT_DOMAIN, false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    add_action('init', __NAMESPACE__ . '\load_text_domain');
    require_once AFFILIATE_COUPON_LITE_PATH . 'src/custom/custom.php';
}
affiliate_coupon_init();
