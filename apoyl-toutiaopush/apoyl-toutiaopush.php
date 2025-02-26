<?php
/*
 * Plugin Name: apoyl-toutiaopush
 * Plugin URI: http://www.girltm.com/
 * Description: 实现文章推送到今日头条搜索里，让今日头条搜索第一时间抓取你的内容
 * Version:     1.7.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-toutiaopush
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_TOUTIAOPUSH_VERSION','1.7.0');
define('APOYL_TOUTIAOPUSH_PLUGIN_FILE',plugin_basename(__FILE__));

function activate_apoyl_toutiaopush(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Toutiaopush_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_apoyl_toutiaopush');

function uninstall_apoyl_toutiaopush(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Toutiaopush_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_toutiaopush');

require plugin_dir_path(__FILE__).'includes/toutiaopush.php';

function run_apoyl_toutiaopush(){
    $plugin=new Apoyl_Toutiaopush();
    $plugin->run();
}
function apoyl_toutiaopush_file($filename)
{
	$file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-toutiaopush/components/' . $filename . '.php';
	if (file_exists($file))
		return $file;
		return '';
}
run_apoyl_toutiaopush();
?>