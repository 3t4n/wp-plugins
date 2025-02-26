<?php
/*
Plugin Name: Ad Inserter Optimizer
Description: Speed your website by auto remove adinserter javascript functions taking over 80Kbs on your website unnecessary.Premium Support: jzin7@hotmail.com.
Version: 1.0.2
Author: Luiz Antonio Jr
Author URI: https://sitenotadez.com.br/tema-nota-10
Plugin URI: https://sitenotadez.com.br/tema-nota-10
Text Domain: ad-inserter-optimizer
Domain Path: /languages/
Requires at least: 5
Requires PHP: 7.2
License: MIT
License URI: http://opensource.org/licenses/MIT
*/
/*

Detailed description:
This system is about removing automatic javascript functions from the footer of the website.
As a specialist on optimizing websites i checked and it takes more than unsed 80kbs of data loaded with the websites.
So, i created this plugin to improve website speed.
My theme called "Tema Nota 10" has this function included on it. A super optimized theme that i sell licenses. 
If you need, just whatsapp me +5521988151212

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
add_action('wp_footer', 'adinserter_optimizer_luiz_antonio_jr', 0);
function adinserter_optimizer_luiz_antonio_jr() {
    if ( function_exists('add_footer_inline_scripts') || defined('AD_INSERTER_VERSION') ) {
       remove_action('wp_footer', 'ai_hook_function_footer', 5);
       remove_action('wp_footer', 'ai_wp_footer_hook_end_buffering', 5);
       remove_action('wp_footer', 'ai_wp_footer_hook', 9999999);
    }
}
function adinserter_optimizer_luiz_antonio_jr_lang() {
	load_plugin_textdomain('ad-inserter-optimizer', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'adinserter_optimizer_luiz_antonio_jr_lang');