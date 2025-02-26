<?php

/**
 * Plugin Name: EventTracking for StatPress
 * Plugin URI: http://joc03.xsrv.jp/plugins-provider/event-tracking-top
 * Description: イベントトラッキングをワードプレス用プラグインStatPressに記録する
 * Version: 0.6
 * Author: ueyk @ JOC-NETWORK
 * Author URI: http://joc03.xsrv.jp/plugins-provider/event-tracking-top
 * Contributors: ueyk
 *
 * @copyright 2014 joc-network.co.jp
 * @link http://www.joc-network.co.jp/
 *
 * @license 
 * Text Domain: eventtracking-for-statpress
 * Domain Path: /languages
 * @package Joc_DlChecker
 *
 */

require_once trailingslashit(dirname(__FILE__)).'function.php';


load_plugin_textdomain('eventtracking-for-statpress', false, basename( dirname( __FILE__ ) ) . '/languages' );


//初期化
JocDlChecker_init();

//プラグイン有効化
register_activation_hook(__FILE__, 'joc_dl_checker_activate');

//メイン処理
require_once trailingslashit(dirname(__FILE__)).'classes/JocDlChecker.php';
//通常ページ
$k = new JocDlChecker();
if (is_admin()) {
  require_once trailingslashit(dirname(__FILE__)).'classes/JocDlCheckerAdmin.php';
  //管理者ページ
  $admin = new JocDlCheckerAdmin();
}


?>