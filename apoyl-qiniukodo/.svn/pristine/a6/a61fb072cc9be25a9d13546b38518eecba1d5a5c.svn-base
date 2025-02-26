<?php
/*
 * Plugin Name: apoyl-qiniukodo
 * Plugin URI:  http://www.girltm.com/
 * Description: 设计理念，这是绿色无任何污染，可以随时关闭插件，实现一键点击同步，让网站图片和附件自动同步到七牛云对象存储KODO,实现图片附件和网站代码分离，流量分流让网站变得更加稳定可靠.
 * Version:     2.0.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-qiniukodo
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}
define('APOYL_QINIUKODO_VERSION','2.0.0');
define('APOYL_QINIUKODO_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_QINIUKODO_URL',plugin_dir_url( __FILE__ ));
define('APOYL_QINIUKODO_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_qiniukodo(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Qiniukodo_Activator::activate();
    Apoyl_Qiniukodo_Activator::install_db();
}
register_activation_hook(__FILE__, 'activate_apoyl_qiniukodo');

function uninstall_apoyl_qiniukodo(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Qiniukodo_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_qiniukodo');

require plugin_dir_path(__FILE__).'includes/qiniukodo.php';

function run_apoyl_qiniukodo(){
    $plugin=new APOYL_QINIUKODO();
    $plugin->run();
}
function apoyl_qiniukodo_file($filename)
{
	$file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-qiniukodo/components/' . $filename . '.php';
	if (file_exists($file))
		return $file;
		return '';
}
run_apoyl_qiniukodo();
?>