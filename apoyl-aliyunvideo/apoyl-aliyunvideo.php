<?php
/*
 * Plugin Name: apoyl-aliyunvideo
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现视频直传到阿里云，实现文章能播放视频，大量节约服务器带宽流量，视频点播是集视频采集、编辑、上传、媒体资源管理、自动化转码处理（窄带高清™）、视频审核分析、分发加速于一体的一站式音视频点播解决方案.
 * Version:     1.2.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-aliyunvideo
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('APOYL_ALIYUNVIDEO_VERSION','1.2.0');
define('APOYL_ALIYUNVIDEO_PREFIX','apoyl_aliyunvideo');
define('APOYL_ALIYUNVIDEO_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_ALIYUNVIDEO_URL',plugin_dir_url( __FILE__ ));
define('APOYL_ALIYUNVIDEO_DIR',plugin_dir_path( __FILE__ ));

function apoyl_aliyunvideo_activate(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Aliyunvideo_Activator::activate();
    Apoyl_Aliyunvideo_Activator::install_db();
}
register_activation_hook(__FILE__, 'apoyl_aliyunvideo_activate');

function apoyl_aliyunvideo_deactivate(){
    require plugin_dir_path(__FILE__).'includes/deactivator.php';
    Apoyl_Aliyunvideo_Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'apoyl_aliyunvideo_deactivate');

function apoyl_aliyunvideo_uninstall(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Aliyunvideo_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'apoyl_aliyunvideo_uninstall');

require plugin_dir_path(__FILE__).'includes/aliyunvideo.php';

function apoyl_aliyunvideo_run(){
    $plugin=new APOYL_ALIYUNVIDEO();
    $plugin->run();
}
function apoyl_aliyunvideo_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-aliyunvideo/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
    return '';
}
require plugin_dir_path(__FILE__).'cron/cron_media.php';
apoyl_aliyunvideo_run();
?>