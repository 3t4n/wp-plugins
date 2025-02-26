<?php
/*
 * Plugin Name: apoyl-video
 * Plugin URI:  http://www.girltm.com/
 * Description: apoyl-video-desc
 * Version:     2.0.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-video
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_VIDEO_VERSION','2.0.0');
define('APOYL_VIDEO_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_VIDEO_URL',plugin_dir_url( __FILE__ ));
define('APOYL_VIDEO_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_video(){
    require APOYL_VIDEO_DIR.'includes/activator.php';
    Apoyl_Video_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_apoyl_video');

function uninstall_apoyl_video(){
    require APOYL_VIDEO_DIR.'includes/uninstall.php';
    Apoyl_Video_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_video');

require APOYL_VIDEO_DIR.'includes/video.php';

function run_apoyl_video(){
    $plugin=new Apoyl_Video();
    $plugin->run();
}
function apoyl_video_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-video/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
        return '';
}
run_apoyl_video();
?>