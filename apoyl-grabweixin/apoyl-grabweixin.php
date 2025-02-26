<?php
/*
 * Plugin Name: apoyl-grabweixin
 * Plugin URI: http://www.girltm.com
 * Description: 在编辑器里输入微信公众号文章链接，点击采集微信文章就会自动抓取到编辑器里,非常方便用户获取微信文章内容.
 * Version:     1.9.1
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-grabweixin
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_GRABWEIXIN_VERSION','1.9.1');
define('APOYL_GRABWEIXIN_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_GRABWEIXIN_URL',plugin_dir_url( __FILE__ ));
define('APOYL_GRABWEIXIN_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_grabweixin(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Grabweixin_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_apoyl_grabweixin');

function uninstall_apoyl_grabweixin(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Grabweixin_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_grabweixin');

require plugin_dir_path(__FILE__).'includes/grabweixin.php';

function run_apoyl_grabweixin(){
    $plugin=new APOYL_GRABWEIXIN();
    $plugin->run();
}
function apoyl_grabweixin_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-grabweixin/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
    return '';
}
run_apoyl_grabweixin();
?>