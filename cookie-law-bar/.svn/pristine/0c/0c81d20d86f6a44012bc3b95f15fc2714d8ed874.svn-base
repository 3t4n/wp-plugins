<?php
/*
Plugin Name: Cookie Law Bar
Plugin URI: https://widgetpack.com
Description: Cookie Law Bar inform visitors that your website uses cookies according to EU cookie law. Adaptive design, flexible setting, smooth slide, changeable position, color, text, button.
Author: WidgetPack <contact@widgetpack.com>
Version: 1.2.1
Author URI: https://widgetpack.com
*/

define('CLB_VERSION', '1.2.1');

function clb_options() {
    return array(
        'clb_bar_msg',
        'clb_bar_pos',
        'clb_bar_color',
        'clb_bar_text_color',
        'clb_btn_msg',
        'clb_btn_color',
        'clb_btn_text_color',
        'clb_version'
    );
}

/*-------------------------------- Default Setting --------------------------------*/
function clb_default_setting() {
    $clb_bar_msg         =  get_option('clb_bar_msg');
    $clb_bar_pos         =  get_option('clb_bar_pos');
    $clb_bar_color       =  get_option('clb_bar_color');
    $clb_bar_text_color  =  get_option('clb_bar_text_color');
    $clb_btn_msg         =  get_option('clb_btn_msg');
    $clb_btn_color       =  get_option('clb_btn_color');
    $clb_btn_text_color  =  get_option('clb_btn_text_color');

    if (!$clb_bar_msg) {
        add_option('clb_bar_msg', clb_i('This website uses cookies. By continuing to browse the site, you are agreeing to our <a href="http://www.aboutcookies.org/" target="_blank">use of cookies</a>'));
    }
    if (!$clb_bar_pos) {
        add_option('clb_bar_pos', 'bottom');
    }
    if (!$clb_bar_color) {
        add_option('clb_bar_color', '#363d4d');
    }
    if (!$clb_bar_text_color) {
        add_option('clb_bar_text_color', '#fff');
    }
    if (!$clb_btn_msg) {
        add_option('clb_btn_msg', 'Agree');
    }
    if (!$clb_btn_color) {
        add_option('clb_btn_color', '#4caf50');
    }
    if (!$clb_btn_text_color) {
        add_option('clb_btn_text_color', '#fff');
    }
    add_option('clb_version', CLB_VERSION);
}
add_action('activate_cookie-law-bar/cookie-law-bar.php', 'clb_default_setting');

/*-------------------------------- Menu --------------------------------*/
function clb_setting_menu() {
     add_submenu_page(
         'options-general.php',
         'Cookie Law Bar Setting',
         'Cookie Law Bar',
         'moderate_comments',
         'clb',
         'clb_setting'
     );
}
add_action('admin_menu', 'clb_setting_menu');

function clb_setting() {
    include_once(dirname(__FILE__) . '/cookie-law-bar-setting.php');
}

/*-------------------------------- Links --------------------------------*/
function clb_plugin_action_links($links, $file) {
    $plugin_file = basename(__FILE__);
    if (basename($file) == $plugin_file) {
        $settings_link = '<a href="' . admin_url('options-general.php?page=clb') . '">'.clb_i('Settings').'</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links', 'clb_plugin_action_links', 10, 2);

function clb_deactivation() {
    clb_delete_all_options();
}
register_deactivation_hook( __FILE__, 'clb_deactivation');

/*-------------------------------- Footer --------------------------------*/
function clb_static() {
    wp_register_script('cookie-law-bar-js', plugins_url('static/js/cookie-law-bar.js', __FILE__), array('jquery'), '', false);
    wp_enqueue_script('cookie-law-bar-js');
    wp_register_style('cookie-law-bar-css', plugins_url('static/css/cookie-law-bar.css', __FILE__));
    wp_enqueue_style('cookie-law-bar-css');
}
add_action('wp_enqueue_scripts', 'clb_static' );

function clb_output_footer() {
    $bar_style = get_option('clb_bar_pos') . ':0;background:' . get_option('clb_bar_color') . ';color:' . get_option('clb_bar_text_color') . ';';
    $btn_style = 'background:' . get_option('clb_btn_color') . ';color:' . get_option('clb_btn_text_color') . ';';

?><!-- Cookie Bar -->
<div id="cookie-law-bar" style="<?php echo $bar_style; ?>"><?php echo stripslashes_deep(get_option('clb_bar_msg')); ?><button id="cookie-law-btn" style="<?php echo $btn_style; ?>" onclick="clb_accept();"><?php echo esc_attr(get_option('clb_btn_msg')); ?></button></div>
<!-- End Cookie Bar --><?php

}
add_action('wp_footer', 'clb_output_footer');

/*-------------------------------- Helpers --------------------------------*/
function clb_delete_all_options() {
    foreach (clb_options() as $opt) {
        delete_option($opt);
    }
}

function clb_i($text, $params=null) {
    if (!is_array($params)) {
        $params = func_get_args();
        $params = array_slice($params, 1);
    }
    return vsprintf(__($text, 'clb'), $params);
}

if (!function_exists('esc_html')) {
function esc_html( $text ) {
    $safe_text = wp_check_invalid_utf8( $text );
    $safe_text = _wp_specialchars( $safe_text, ENT_QUOTES );
    return apply_filters( 'esc_html', $safe_text, $text );
}
}

if (!function_exists('esc_attr')) {
function esc_attr( $text ) {
    $safe_text = wp_check_invalid_utf8( $text );
    $safe_text = _wp_specialchars( $safe_text, ENT_QUOTES );
    return apply_filters( 'attribute_escape', $safe_text, $text );
}
}

?>