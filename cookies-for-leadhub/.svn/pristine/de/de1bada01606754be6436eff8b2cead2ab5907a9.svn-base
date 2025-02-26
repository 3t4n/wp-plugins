<?php
/**
 * Plugin Name: Cookies for LeadHub
 * Plugin URI: http://ancu.com/
 * Description: When users access the website, the system will automatically save the first url to the COOKIE (applicable to LEADHUD software).
 * Version: 1.3.1
 * Author: the VNB-DEV team
 * Author URI: https://vnbfamily.com/
 * License: GPLv2 or later
 */

// init plugin
define('CLH_PLUGIN', 'cookies-for-leadhub');
define('CLH_VERSION', '1.3');

// define url_path
define('CLH_URLPATH', plugins_url('', __FILE__));
define('CLH_ASSETS_URLPATH', CLH_URLPATH.'/assets');

/**
 * register the javascript file into the footer
 *
 * @author hien-tech (hiennd@ancu.com)
 * @since 2019-11-14
 */
function clh_front_end_scripts() {
    wp_enqueue_script(CLH_PLUGIN.'-jquery-cookie', CLH_ASSETS_URLPATH.'/js/jquery.cookie.min.js', false, CLH_VERSION, 'all');
    wp_enqueue_script(CLH_PLUGIN.'-front-end', CLH_ASSETS_URLPATH.'/js/front-end.js', false, CLH_VERSION, 'all');
    wp_enqueue_script(THEME_NAME.'gg-recaptcha', 'https://www.google.com/recaptcha/api.js?onload=ReCaptchaCallback&render=explicit', false, CLH_VERSION, true);

    // get ip
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
    else
    $ipaddress = 'UNKNOWN';
    wp_add_inline_script(CLH_PLUGIN.'-front-end', "var ReCaptchaCallback = function() { jQuery('.g-recaptcha').each(function() { var el = jQuery(this); var widgetId = grecaptcha.render(el.get(0), {'sitekey' : el.data('sitekey')}); jQuery(this).attr('data-widget-id', widgetId); });}; jQuery(document).ready(function ($) {jQuery('input[name=\"ip\"]').val('.$ipaddress.');}); jQuery('.form-leadhub').submit(function(event) { if (jQuery(this).find('.g-recaptcha').length) { if (grecaptcha.getResponse(jQuery(this).find('.g-recaptcha').attr('data-widget-id')) == '') { jQuery(this).find('.error-captcha').text('Vui lòng xác nhận CAPTCHA'); return false; }}});" );
}
add_action('wp_enqueue_scripts', 'clh_front_end_scripts');

/**
 * add menu item "Cookies for LeadHub" to admin bar
 * added by hien-tech (hiennd@ancu.com) at 2019-11-12
 */
add_action('admin_bar_menu', function(\WP_Admin_Bar $bar)
{
    $bar->add_menu( array(
        'id'     => 'wpse',
        'title'  => '✓ Cookies for LeadHub'
    ) );
}, 999999);
