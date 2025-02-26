<?php
/*
 * Plugin Name: apoyl-so
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现百度和360搜索免费为站长们开放了站内搜索工具，将代码加入网页中，您的网站即可获得同360搜索一样强大的搜索功能，使用百度和360站内搜索，对于增加收录，提升体验，盘活流量具有明显帮助
 * Version:     1.6.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-so
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_SO_VERSION','1.6.0');
define('APOYL_SO_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_SO_URL',plugin_dir_url( __FILE__ ));

function activate_apoyl_so(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_So_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_apoyl_so');

function uninstall_apoyl_so(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_So_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_so');

require plugin_dir_path(__FILE__).'includes/so.php';

function run_apoyl_so(){
    $plugin=new Apoyl_So();
    $plugin->run();
}

run_apoyl_so();
?>