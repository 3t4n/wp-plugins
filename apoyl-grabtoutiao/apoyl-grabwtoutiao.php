<?php
/*
 * Plugin Name: [凹凸曼]一键采集今日头条文章
 * Plugin URI:  http://www.girltm.com/
 * Description: 在编辑器里输入今日头条文章链接，点击采集今日头条文章就自动抓取到编辑器里,非常方便用户获取今日头条文章内容
 * Version:     1.3.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-grabtoutiao
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('APOYL_GRABTOUTIAO_VERSION','1.3.0');
define('APOYL_GRABTOUTIAO_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_GRABTOUTIAO_URL',plugin_dir_url( __FILE__ ));
define('APOYL_GRABTOUTIAO_DIR',plugin_dir_path( __FILE__ ));

function apoyl_grabtoutiao_activate(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Grabtoutiao_Activator::activate();
}
register_activation_hook(__FILE__, 'apoyl_grabtoutiao_activate');

function apoyl_grabtoutiao_uninstall(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Grabtoutiao_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'apoyl_grabtoutiao_uninstall');

require plugin_dir_path(__FILE__).'includes/grabtoutiao.php';

function apoyl_grabtoutiao_run(){
    $plugin=new APOYL_GRABTOUTIAO();
    $plugin->run();
}
function apoyl_grabtoutiao_file($filename)
{
	
	$file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-grabtoutiao/components/' . $filename . '.php';
	
	if (file_exists($file))
		return $file;
		return '';
}
apoyl_grabtoutiao_run();
?>