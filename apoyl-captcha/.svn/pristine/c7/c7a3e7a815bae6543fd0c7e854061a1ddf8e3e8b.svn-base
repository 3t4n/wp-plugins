<?php
/*
 * Plugin Name: apoyl-captcha
 * Plugin URI:  http://www.girltm.com/
 * Description: 实现网站注册用户的时候，显示弹层中文点击验证码，防止恶意注册，恶意信息发表，恶意评论.
 * Version:     1.4.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-captcha
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}

define('APOYL_CAPTCHA_VERSION','1.4.0');
define('APOYL_CAPTCHA_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_CAPTCHA_URL',plugin_dir_url( __FILE__ ));
define('APOYL_CAPTCHA_DIR',plugin_dir_path( __FILE__ ));

function apoyl_captcha_activate(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Captcha_Activator::activate();
    Apoyl_Captcha_Activator::install_db();
}
register_activation_hook(__FILE__, 'apoyl_captcha_activate');

function apoyl_captcha_uninstall(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Captcha_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'apoyl_captcha_uninstall');

require plugin_dir_path(__FILE__).'includes/captcha.php';

function apoyl_captcha_run(){
    $plugin=new APOYL_CAPTCHA();
    $plugin->run();
}

function apoyl_captcha_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-captcha/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
    return '';
}

apoyl_captcha_run();
?>