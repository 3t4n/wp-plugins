<?php

/**
 * Plugin Name: Hide Google reCAPTCHA Logo
 * Plugin URI: https://wordpress.org/plugins/hide-google-recaptcha-logo/
 * Author: Adeleye Ayodeji
 * Author URI: https://adeleyeayodeji.com
 * Description: This plugin hides the Google reCAPTCHA logo from the front end of your website.
 * Version: 1.1.1
 * License: 1.1.1
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: hide-google-recaptcha-logo
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

//include the google-recaptcha-class.php file
require_once(plugin_dir_path(__FILE__) . 'inc/google-recaptcha-class.php');
//initialise the init method
$google_recaptcha_class = new GOOGLERECAPTCHACLASS();
$google_recaptcha_class->init();

//This is a cool development for wordpress community