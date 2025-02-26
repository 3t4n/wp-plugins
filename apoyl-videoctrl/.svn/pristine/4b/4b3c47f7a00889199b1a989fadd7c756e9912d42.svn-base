<?php
/*
 * Plugin Name: apoyl-videoctrl
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现统一自定义控制本地视频video和bilibili宽度和高度，显示合适大小的视频，让页面变得更加美观
 * Version:     1.6.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-videoctrl
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_VIDEOCTRL_VERSION','1.6.0');
define('APOYL_VIDEOCTRL_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_VIDEOCTRL_URL',plugin_dir_url( __FILE__ ));
define('APOYL_VIDEOCTRL_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_videoctrl(){
    require APOYL_VIDEOCTRL_DIR.'includes/activator.php';
    Apoyl_Videoctrl_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_apoyl_videoctrl');

function uninstall_apoyl_videoctrl(){
    require APOYL_VIDEOCTRL_DIR.'includes/uninstall.php';
    Apoyl_Videoctrl_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_videoctrl');

require APOYL_VIDEOCTRL_DIR.'includes/videoctrl.php';

function run_apoyl_videoctrl(){
    $plugin=new Apoyl_Videoctrl();
    $plugin->run();
}
function apoyl_videoctrl_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-videoctrl/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
        return '';
}
run_apoyl_videoctrl();
?>