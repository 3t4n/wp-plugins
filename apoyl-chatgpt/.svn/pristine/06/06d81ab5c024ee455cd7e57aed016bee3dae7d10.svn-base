<?php
/*
 * Plugin Name: apoyl-chatgpt
 * Plugin URI:  http://www.girltm.com/
 * Description: 这是一款基于ChatGPT独立对话聊天机器人，支持百度大模型、GPT-3.5、GPT-4，通过AI解答用户的疑惑，帮助用户写总结，写小说，写代码等， 成为是人们生活中贴心小助手.
 * Version:     2.1.0
 * Author:      凹凸曼
 * Author URI:  http://www.girltm.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apoyl-chatgpt
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('APOYL_CHATGPT_VERSION','2.1.0');
define('APOYL_CHATGPT_PLUGIN_FILE',plugin_basename(__FILE__));
define('APOYL_CHATGPT_URL',plugin_dir_url( __FILE__ ));
define('APOYL_CHATGPT_DIR',plugin_dir_path( __FILE__ ));

function activate_apoyl_chatgpt(){
    require plugin_dir_path(__FILE__).'includes/activator.php';
    Apoyl_Chatgpt_Activator::activate();
    Apoyl_Chatgpt_Activator::install_db();
}
register_activation_hook(__FILE__, 'activate_apoyl_chatgpt');

function uninstall_apoyl_chatgpt(){
    require plugin_dir_path(__FILE__).'includes/uninstall.php';
    Apoyl_Chatgpt_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_apoyl_chatgpt');

require plugin_dir_path(__FILE__).'includes/chatgpt.php';

function run_apoyl_chatgpt(){
    $plugin=new APOYL_CHATGPT();
    $plugin->run();
}

function apoyl_chatgpt_file($filename)
{
    $file = WP_PLUGIN_DIR . '/apoyl-common/v1/apoyl-chatgpt/components/' . $filename . '.php';
    if (file_exists($file))
        return $file;
    return '';
}
run_apoyl_chatgpt();
?>