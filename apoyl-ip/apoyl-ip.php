<?php
/*
 * Plugin Name: apoyl-ip
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现发布文章记录IP地址，用户发布文章显示IP归属地，更加方便了解用户来自哪里.
 * Version:     1.6.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-ip
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_IP_VERSION','1.6.0');
define('APOYL_IP_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_IP_URL',plugin_dir_url( __FILE__ ));
define('APOYL_IP_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_ip(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Ip_Activator::activate();
    Apoyl_Ip_Activator::install_db();
}
register_activation_hook(__FILE__, 'activate_apoyl_ip');

function uninstall_apoyl_ip(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Ip_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_ip');

require plugin_dir_path(__FILE__).'includes/ip.php';

function run_apoyl_ip(){
    $plugin=new APOYL_IP();
    $plugin->run();
}
function apoyl_ip_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-ip/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
    return '';
}

run_apoyl_ip();
?>