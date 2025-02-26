<?php
/**
 * Plugin Name: AutoShop
 * Plugin URI: https://autoshop.aucoz.com/
 * Description: A simple module to allow users to communicate with their Autoshop Server and mobile device.
 * Version: 1.0.4
 * Author: AutoShop
 * Author URI: https://autoshop.aucoz.com/
 * License: GPL2
 */

define( 'AUTOSHOP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AUTOSHOP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once AUTOSHOP_PLUGIN_DIR.'/aushop-sdk/AutoShop.php';
define('AUTOSHOP_VERSION', '1.0.4');

add_action('admin_menu', 'plugin_menu_autoshop');
function plugin_menu_autoshop() {
    add_menu_page('AutoShop Settings', 'AutoShop', 'administrator', 'autoshop-settings', 'func_autoshop_settings', AUTOSHOP_PLUGIN_URL.'/icon.png');
}

function func_autoshop_settings()
{
    include_once AUTOSHOP_PLUGIN_DIR.'/views/config.php';
}

add_action( 'admin_init', 'init_autoshop' );
function init_autoshop() {

    if (get_option('autoshop', false))
    {
        delete_option('autoshop');
        wp_redirect( admin_url( 'admin.php?page=autoshop-settings' ) );
        exit;
    }

    register_setting( 'autoshop-settings', 'secretkey' );
}
register_activation_hook( __FILE__, 'active_autoshop' );
function active_autoshop() {

    add_option("autoshop", true);
}
register_deactivation_hook( __FILE__, 'deactive_autoshop' );
function deactive_autoshop() {

    delete_option("secretkey");
}

add_action('current_screen', 'checkfooter_autoshop');
function checkfooter_autoshop()
{
    $current_screen = get_current_screen();
    if (isset($current_screen->id) && $current_screen->id == 'toplevel_page_autoshop-settings')
    {
        add_filter('admin_footer_text', 'admin_footer_autoshop');
        add_filter('update_footer', 'admin_footer_version_autoshop', 11);
    }
}
function admin_footer_autoshop()
{
    echo '<p><a target="_blank" href="http://autoshop.aucoz.com">Autoshop Plugin</a></p>';
}
function admin_footer_version_autoshop()
{
    echo AUTOSHOP_VERSION;
}

add_action('woocommerce_checkout_order_processed', 'custom_process_order_autoshop', 10, 1);
function custom_process_order_autoshop($order_id) {

    $order = new WC_Order( $order_id );

    $_order = new AutoShop_Order($order->get_order_number(), $order->get_formatted_billing_full_name(), $order->billing_address_1, $order->billing_phone, $order->billing_email);

    $items = $order->get_items();
    $size = apply_filters( 'post_thumbnail_size', 'shop_single' );
    foreach ($items as $item)
    {
        $product = $order->get_product_from_item($item);

        $post = get_post($product->id);
        $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
        if ($post_thumbnail_id)
        {
            $image_src = wp_get_attachment_image_src($post_thumbnail_id, $size)[0];
        }
        else
        {
            $image_src = wc_placeholder_img_src();
        }

        $_product = new AutoShop_Product($product->id, $product->get_title(), $product->get_sku(), $product->get_post_data()->post_excerpt, $product->get_price(), $image_src, $item['qty'], $product->get_permalink());
        $_order->addProduct($_product);
    }

    $autoshop = new AutoShop();
    $autoshop->setSecretKey(get_option('secretkey'));
    $autoshop->sendOrder($_order);
}