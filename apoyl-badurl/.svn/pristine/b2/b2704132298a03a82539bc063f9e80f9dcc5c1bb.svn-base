<?php
/*
 * Plugin Name: apoyl-badurl
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现生成死链接，提交到百度、360、头条搜索、谷歌google、Bing、神马等搜索引擎，降低影响网站的站点评级。
 * Version:     1.6.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-badurl
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}

define('APOYL_BADURL_VERSION','1.6.0');
define('APOYL_BADURL_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_BADURL_URL',plugin_dir_url( __FILE__ ));
define('APOYL_BADURL_DIR',plugin_dir_path( __FILE__ ));


function activate_apoyl_badurl(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Badurl_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_apoyl_badurl');

function uninstall_apoyl_badurl(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Badurl_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_badurl');

require plugin_dir_path(__FILE__).'includes/badurl.php';

function run_apoyl_badurl(){
    $plugin=new Apoyl_Badurl();
    $plugin->run();
}

run_apoyl_badurl();
?>