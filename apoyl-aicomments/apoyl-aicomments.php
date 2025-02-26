<?php
/*
 * Plugin Name: apoyl-aicomments
 * Plugin URI:  http://www.girltm.com/
 * Description: 基于DeepSeek大模型DeepSeek-V3、推理模型DeepSeek-R1、百度大模型，发完文章后，自动实现AI自动跟评论，多马甲随机回复，无需要人工干预自动回复，让平台运营更加活跃。
 * Version:     1.3.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-aicomments
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('APOYL_AICOMMENTS_VERSION','1.3.0');
define('APOYL_AICOMMENTS_PREFIX','apoyl_aicomments');
define('APOYL_AICOMMENTS_FILE',plugin_basename(__FILE__));
define('APOYL_AICOMMENTS_URL',plugin_dir_url( __FILE__ ));
define('APOYL_AICOMMENTS_DIR',plugin_dir_path( __FILE__ ));

function apoyl_aicomments_activate(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Aicomments_Activator::activate();
    Apoyl_Aicomments_Activator::install_db();
}
register_activation_hook(__FILE__, 'apoyl_aicomments_activate');


require plugin_dir_path(__FILE__).'includes/aicomments.php';

function apoyl_aicomments_run(){
    $plugin=new APOYL_AICOMMENTS();
    $plugin->run();
}
apoyl_aicomments_run();
?>