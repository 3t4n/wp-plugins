<?php
/*
 * Plugin Name: apoyl-pingpush
 * Plugin URI: http://www.girltm.com/
 * Description: 这是一款解决把你文章内容推送到Bing必应搜索引擎里，也可以推送到IndexNow，让Bing第一时间抓取你的内容，加速Bing收录（必应收录）你的网站内容
 * Version:     1.9.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-bingpush
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_BINGPUSH_VERSION','1.9.0');
define('APOYL_BINGPUSH_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_BINGPUSH_URL',plugin_dir_url( __FILE__ ));
define('APOYL_BINGPUSH_DIR',plugin_dir_path( __FILE__ ));
function activate_apoyl_bingpush(){
    require plugin_dir_path(__FILE__).'includes/class-apoyl-bingpush-activator.php';
    Apoyl_Bingpush_Activator::activate();
    Apoyl_Bingpush_Activator::install_db();
}
register_activation_hook(__FILE__, 'activate_apoyl_bingpush');

function uninstall_apoyl_bingpush(){
    require plugin_dir_path(__FILE__).'includes/class-apoyl-bingpush-uninstall.php';
    Apoyl_Bingpush_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_bingpush');

require plugin_dir_path(__FILE__).'includes/class-apoyl-bingpush.php';

function run_apoyl_bingpush(){
    $plugin=new Apoyl_Bingpush();
    $plugin->run();
}
function apoyl_bingpush_file($filename)
{
	$file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-bingpush/components/' . $filename . '.php';
	if (file_exists($file))
		return $file;
		return '';
}
run_apoyl_bingpush();
?>