<?php

/*
  Plugin Name: Auto Currency Converter
  Plugin URI: https://wordpress.org/plugins/auto-currency-converter/
  Description: Adds a price in the second currency automatically
  Author: Akky AKIMOTO
  Text Domain: auto_currency_converter
  Domain Path: /languages
  Version: 1.2.2
  Author URI: http://akimoto.jp/blog/
  License: GPL2
 */

add_action('admin_notices', 'acc_check_environment');
function acc_check_environment() {
    if (version_compare( PHP_VERSION, '5.4', '<' )) {
      echo '<div class="error">';
      echo '<p>Automatic Currency Converter requires PHP verion ' . '5.4' . ' or newer';
      echo ', but yours is ' . PHP_VERSION . '.</p>';
      echo '<p>The plugin has been deactivated.</p>';
      echo '</div>';
      require_once ABSPATH . '/wp-admin/includes/plugin.php';
      deactivate_plugins( __FILE__ );
      exit();
    }
    global $wp_version;
    if (version_compare( $wp_version, '4.0', '<' )) {
      echo '<div class="error">';
      echo '<p>Automatic Currency Converter requires WordPress verion ' . '4.0' . ' or newer';
      echo ', but yours is ' . $wp_version . '.</p>';
      echo '<p>The plugin has been deactivated.</p>';
      echo '</div>';
      require_once ABSPATH . '/wp-admin/includes/plugin.php';
      deactivate_plugins( __FILE__ );
      exit();
    }
}

load_plugin_textdomain( 'auto_currency_converter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

require_once __DIR__. '/vendor/autoload.php';
$manager = new Oow\Plugin\PluginManager;
$manager->addPlugin(new Akky\AutoCurrencyConverter());
