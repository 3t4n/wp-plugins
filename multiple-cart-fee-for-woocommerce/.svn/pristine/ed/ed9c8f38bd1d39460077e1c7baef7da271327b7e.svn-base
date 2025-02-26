<?php
/**
 * Plugin Name: Multiple Cart Fee for WooCommerce
 * Plugin URI: https://woosofts.com/multiple-cart-fee-for-woocommerce
 * Description: Add smart, flexible multiple fees to your WooCommerce cart based on products, categories, and tags. Perfect for handling additional charges!
 * Version: 1.0.0
 * Tags: cart fee, multiple fee, woocommerce fee, multiple charges, conditional fees, product fees, category fees, multiple fees
 * Author: WooSofts
 * Author URI: https://woosofts.com
 * Author Email: support@woosofts.com
 * Tested up to: 6.7
 * Text Domain: multiple-cart-fee-for-woocommerce
 * Requires Plugins: woocommerce
 * WC requires at least: 4.0
 * WC tested up to: 9.6
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || exit;

define('MCFW_URL', plugin_dir_url(__FILE__));
define('MCFW_PATH', plugin_dir_path(__FILE__));
define('MCFW_FILE', __FILE__);
define('MCFW_VERSION', '1.0.0');

if ( ! class_exists( 'Multiple_Cart_Fee' ) ) {

    class Multiple_Cart_Fee {

        public function __construct() {

            if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')), true) ) {

                add_action(
                    'before_woocommerce_init', function () {
                        if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class) ) {
                            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
                            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
                        }
                    } 
                );
                $this->includes();

                add_filter('plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'mcfw_settings_link' ));
                add_filter( 'plugin_row_meta', array( $this, 'mcfw_plugin_description_links' ), 10, 2 );
            } else {
                add_action('admin_notices', array( $this, 'mcfw_inactive_plugin_notice' ));
            }
        }

        public function includes() {
            include_once MCFW_PATH . '/includes/admin/class-multiple-cart-fee-admin.php';
            include_once MCFW_PATH . '/includes/public/class-multple-cart-fee-public.php';
        }

        public function mcfw_settings_link( $links ) {

            $url = esc_url(add_query_arg('page', 'wc-settings&tab=multiple_cart_fee', 'admin.php'));
            $settings_link = sprintf('<a href="%s">%s</a>', $url, __('Settings', 'multiple-cart-fee-for-woocommerce'));
            array_unshift($links, $settings_link);
            return $links;
        }

        public function mcfw_plugin_description_links( $links, $file ) {

            if ( $file != plugin_basename( __FILE__ ) ) {
                return $links;
            }

            $links[] = '<a href="https://woosofts.com/documentation" target="_blank">Documentation</a>';
            $links[] = '<a href="https://woosofts.com/store" target="_blank">Store</a>';

            return $links;
        }

        public function mcfw_inactive_plugin_notice() {
            ?>
            <div class="notice notice-error">
                <p>
                    <?php
                    printf(
                        /* translators: %s: WooCommerce */
                        esc_html__('Store Restriction requires %s to be installed and active.', 'multiple-cart-fee-for-woocommerce'),
                        '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a>'
                    );
                    ?>
                </p>
            </div>
            <?php
        }
    }

    new Multiple_Cart_Fee();

}
