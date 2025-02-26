<?php
/*
 * Plugin Name: apoyl-views
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现文章页面显示点击数，每刷新一次页面就会加一，方便用户查看文章游览数，也可以自动随机增加文章点击，也可以手动修改文章点击数。
 * Version:     1.2.0
 * Author:      凹凸曼
 * Author URI:   http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-views
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('APOYL_VIEWS_VERSION','1.2.0');
define('APOYL_VIEWS_PREFIX','apoyl_views');
define('APOYL_VIEWS_FILE',plugin_basename(__FILE__));
define('APOYL_VIEWS_URL',plugin_dir_url( __FILE__ ));
define('APOYL_VIEWS_DIR',plugin_dir_path( __FILE__ ));

function apoyl_views_activate(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Views_Activator::activate();
}
register_activation_hook(__FILE__, 'apoyl_views_activate');


require plugin_dir_path(__FILE__).'includes/views.php';

function apoyl_views_run(){
    $plugin=new APOYL_VIEWS();
    $plugin->run();
}
function apoyl_views_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-views/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
    return '';
}
apoyl_views_run();
?>