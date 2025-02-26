<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wp.and-bro.com
 * @since             1.0.1
 * @package           Cart-Session-Time
 *
 * @wordpress-plugin
 * Plugin Name:       Cart Session Time
 * Plugin URI:        
 * Description:       Cart Session Timeは、WooCommerceのカート情報の保有時間を変更することのできるプラグインです。
 * Version:           1.0.0
 * Author:            ANDShop
 * Author URI:        https://wp.and-bro.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cart-session-time
 * Domain Path:       /languages/
 */

define('CST_PLUGIN_VERSION', '1.0');
define('CST_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('CST_PLUGIN_URL', plugins_url('/', __FILE__));

// main
require plugin_dir_path(__FILE__) . 'cart-session-time.php';

// setting tab
add_filter('plugin_row_meta', 'cst_plugin_row_meta', 10, 2);
function cst_plugin_row_meta($links, $file)
{
  // プラグインのスラグを取得
  $plugin = plugin_basename($file);

  // プラグインのスラグが自分のプラグインの場合
  if ($plugin == 'cart-session-time/index.php') {
    // プラグインの説明欄に追加するリンクを作成
    $links[] = '<a href="https://wp.and-bro.com/shop/plugin/cart-session-time">' . esc_html__('Paid Version', 'cart-session-time') . '</a>';
  }
  return $links;
}

// options
add_filter('plugin_action_links', 'cst_plugin_page_links', 10, 4);
function cst_plugin_page_links($actions, $plugin_file, $plugin_data, $context)
{
  // プラグインのスラグを取得
  $plugin = plugin_basename($plugin_file);

  // プラグインのスラグが自分のプラグインの場合
  if ($plugin == 'cart-session-time/index.php') {
    // 無効化のリンクの左にリンクを挿入
    $actions['deactivate'] = '<a href="admin.php?page=cart-session-time%2Fcart-session-time.php">設定</a> | ' . $actions['deactivate'];
  }

  return $actions;
}

// languages
// 翻訳ファイルを読み込む設定
load_plugin_textdomain(
  'cart-session-time',
  false,
  plugin_basename(dirname(__FILE__)) . '/languages'
);
