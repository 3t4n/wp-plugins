<?php
/*
 * Plugin Name: apoyl-grabdouyin
 * Plugin URI:  
 * Description: 通过抖音分享视频链接，一键采集抖音视频到自己网站上。
 * Version:     1.1.0
 * Author:      凹凸曼
 * Author URI:   http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-grabdouyin
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('APOYL_GRABDOUYIN_VERSION','1.1.0');
define('APOYL_GRABDOUYIN_PREFIX','apoyl_grabdouyin');
define('APOYL_GRABDOUYIN_FILE',plugin_basename(__FILE__));
define('APOYL_GRABDOUYIN_URL',plugin_dir_url( __FILE__ ));
define('APOYL_GRABDOUYIN_DIR',plugin_dir_path( __FILE__ ));

function apoyl_grabdouyin_activate(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Grabdouyin_Activator::activate();
    Apoyl_Grabdouyin_Activator::install_db();
}
register_activation_hook(__FILE__, 'apoyl_grabdouyin_activate');


require plugin_dir_path(__FILE__).'includes/grabdouyin.php';

function apoyl_grabdouyin_run(){
    $plugin=new APOYL_GRABDOUYIN();
    $plugin->run();
}
apoyl_grabdouyin_run();
?>