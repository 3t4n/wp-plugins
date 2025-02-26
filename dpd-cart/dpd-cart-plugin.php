<?php
/*
Plugin Name: DPD Cart Plugin
Plugin URI: https://getdpd.com
Description: Integrate your DPD cart and checkout with your Wordpress blog.  Adds a store page, product pages, and a tool to insert DPD buttons in to pages and posts.
Version: 2.1
Author: DPDplugins
Author URI: https://blog.getdpd.com
Text Domain: dpd-cart-plugin
License: GPLv2
*/
require_once __DIR__ . DIRECTORY_SEPARATOR . 'setting-page.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'admin-notice.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'dpd-api.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'shortcodes' . DIRECTORY_SEPARATOR . 'shortcode-abstract.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'shortcodes' . DIRECTORY_SEPARATOR . 'dpdcart-store.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'shortcodes' . DIRECTORY_SEPARATOR . 'dpdcart-product-page.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'shortcodes' . DIRECTORY_SEPARATOR . 'dpdcart-button.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'integrations' . DIRECTORY_SEPARATOR . 'tinymce.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'integrations' . DIRECTORY_SEPARATOR . 'guttenberg.php';


class DPD_Cart_Plugin
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('dpd-cart', 'https://demo.dpdcart.com/dpd.js', array('jquery'));
        wp_enqueue_style('dpd-cart', plugins_url('/dpd-cart/css/styles.css'));
    }

}

new  DPD_Cart_Plugin();


// Add settings link on plugin page
function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=dpd_cart_plugin.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );