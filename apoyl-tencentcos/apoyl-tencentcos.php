<?php
/*
 * Plugin Name: apoyl-tencentcos
 * Plugin URI: http://www.girltm.com/
 * Description: 一键点击同步，让网站图片和附件自动同步到腾讯云对象存储COS,实现图片附件和网站代码分离，流量分流让网站变得更加稳定可靠.
 * Version:     2.2.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-tencentcos
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('APOYL_TENCENTCOS_VERSION','2.2.0');
define('APOYL_TENCENTCOS_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_TENCENTCOS_URL',plugin_dir_url( __FILE__ ));
define('APOYL_TENCENTCOS_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_tencentcos(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Tencentcos_Activator::activate();
    Apoyl_Tencentcos_Activator::install_db();
}
register_activation_hook(__FILE__, 'activate_apoyl_tencentcos');

function uninstall_apoyl_tencentcos(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Tencentcos_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_tencentcos');

require plugin_dir_path(__FILE__).'includes/tencentcos.php';

function run_apoyl_tencentcos(){
    $plugin=new APOYL_TENCENTCOS();
    $plugin->run();
}

function apoyl_tencentcos_file($filename)
{
	$file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-tencentcos/components/' . $filename . '.php';
	if (file_exists($file))
		return $file;
		return '';
}
run_apoyl_tencentcos();
?>