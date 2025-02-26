<?php
/*
 * Plugin Name: apoyl-keywordseo
 * Plugin URI:  http://www.girltm.com/
 * Description: 这个是实现自己网站关键词内部链接，搜索引擎在抓取的网站内容，就是通过内链接关键词，抓取你网站每个角落，因此建立合理内链接对自身网站非常重要.
 * Version:     1.7.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-keywordseo
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_KEYWORDSEO_VERSION','1.7.0');
define('APOYL_KEYWORDSEO_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_KEYWORDSEO_URL',plugin_dir_url( __FILE__ ));
define('APOYL_KEYWORDSEO_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_keywordseo(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Keywordseo_Activator::activate();
    Apoyl_Keywordseo_Activator::install_db();
}
register_activation_hook(__FILE__, 'activate_apoyl_keywordseo');

function uninstall_apoyl_keywordseo(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Keywordseo_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_keywordseo');

require plugin_dir_path(__FILE__).'includes/keywordseo.php';

function run_apoyl_keywordseo(){
    $plugin=new APOYL_KEYWORDSEO();
    $plugin->run();
}

function apoyl_keywordseo_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-keywordseo/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
        return '';
}
run_apoyl_keywordseo();
?>