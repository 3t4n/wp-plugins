<?php
/**
 * Plugin Name: Akay Digits Add-on
 * Description: Akay Digits SMS Gateway Add-on Plugin
 * Version: 1.1
 * Author: Akay Digital Marketing Agency
 * Author URI: https://akay.agency/
 * Text Domain: akay-digits
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Tested up to: 6.7
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function akay_digits_version()
{
    return '1.1';
}




// Register the gateway with Digits
add_filter('digits_sms_gateways', 'akay_digits_register_gateway', 100);
function akay_digits_register_gateway($gateways) {

    //melipayamak
    $gateways['akay_melipayamak'] = array(
        'label' => __('melipayamak 2', 'akay-digits'),
        'value' => 9002,  // Unique value for melipayamak gateway
        'inputs' => array(
            __('Username', 'akay-digits') => array('text' => true, 'name' => 'uname'),
            __('Password', 'akay-digits') => array('text' => true, 'name' => 'password'),
            __('Sender ID', 'akay-digits') => array('text' => true, 'name' => 'sender'),
            __('Fast Send','akay-digits') => array('select' => true, 'name' => 'send_patterncode', 'options' => array(__('OK','akay-digits') => 'ok', __('NO','akay-digits') => 'no')),
            __('Predefined text code in the Melipayamak', 'akay-digits') => array('text' => true, 'name' => 'patterncode')  
        ),
    );

    //ippanel
    $gateways['akay_ippanel'] = array(
        'label' => __('ippanel', 'akay-digits'),
        'value' => 9001,  // Unique value for ippanel gateway
        'inputs' => array(
            __('Username', 'akay-digits') => array('text' => true, 'name' => 'uname'),
            __('Password', 'akay-digits') => array('text' => true, 'name' => 'password'),
            __('Sender ID', 'akay-digits') => array('text' => true, 'name' => 'sender'),
            __('Fast Send','akay-digits') => array('select' => true, 'name' => 'send_patterncode', 'options' => array(__('OK','akay-digits') => 'ok', __('NO','akay-digits') => 'no')),
            __('Pattern Code', 'akay-digits') => array('text' => true, 'name' => 'patterncode'),
            __('Var Pattern','akay-digits') => array('textarea' => true, 'name' => 'patternvars', 'rows' => 3, 'optional' => 1,"desc"=>__('Separate the variables used in the pattern with an enter.
<br>
Example:
<br>
code
<br>
verification-code
<br>
In the field (Sample text sent to the user mobile number), enter the equivalent of the code sent to the variable
<br>
Example:
{OTP}','akay-digits')),
            
        ),
    );



    return $gateways;
}


// Integrate with `unitedover_send_sms`
add_filter('unitedover_send_sms', 'akay_digits_handle_send', 10, 8);
function akay_digits_handle_send($handled, $option_slug, $gateway_id, $countrycode, $mobile, $messagetemplate, $testCall) {
      
    switch ($gateway_id) {
        case 9001:
            $gateway_fields = get_option($option_slug . '_akay_ippanel');
            if (!$gateway_fields) {
                return false;
            }
            require_once plugin_dir_path(__FILE__) . 'includes/class-akay-ippanel.php';
            return \AkaySMSGateway\Akay_Ippanel::sendSMS(
                $gateway_fields, $countrycode . $mobile, $messagetemplate, $testCall
            );
        case 9002:
                $gateway_fields = get_option($option_slug . '_akay_melipayamak');
                if (!$gateway_fields) {
                    return false;
                }
                require_once plugin_dir_path(__FILE__) . 'includes/class-akay-melipayamak.php';
                return \AkaySMSGateway\Akay_Melipayamak::sendSMS(
                    $gateway_fields, $countrycode . $mobile, $messagetemplate, $testCall
                );
        default:

            return $handled;
    }


}

//admin style
function akay_digits_admin_add_digist_style()
{
    if (is_rtl()) {
        wp_enqueue_style('admin-style-digits', plugin_dir_url(__FILE__) . 'admin-style.css', array('digits-gs-style'), akay_digits_version(), 'all');
    }
}
add_action('admin_print_styles', 'akay_digits_admin_add_digist_style');


//front style
add_action('login_enqueue_scripts', 'akay_digits_front_digits_add_style');
function akay_digits_front_digits_add_style()
{
    wp_enqueue_style('front-digits-login-style', plugin_dir_url(__FILE__) . 'front-style.css', array(), akay_digits_version(), 'all');
}


// بارگذاری فایل‌های ترجمه
function akay_digits_load_textdomain() {
    load_plugin_textdomain(
        'akay-digits', 
        false,         
        dirname(plugin_basename(__FILE__)) . '/languages/' 
    );
}
add_action('plugins_loaded', 'akay_digits_load_textdomain');