<?php
/*
 Plugin Name: Age Gator
 Plugin URI: https://www.age-gator.com
 Description: Age Gator is a WordPress plugin specifically designed to guard sensitive content (alcohol, gambling, x-rated, etc) from underage users. Featuring an abundance of customizable settings, the display and behavior of the overlay can be easily configured to suit a variety of use cases.
 Version: 1.06
 Author: Chris Geelhoed
 */
define('AGE_GATOR_TEMPLATES', [
    'beer',
    'smoking',
    'vaping',
    'marijuana',
    'adult'
]);

if (!defined('ABSPATH')) {
    exit;
}

require_once(plugin_dir_path(__FILE__) . 'JDN_Create_Media_File.php');
require_once(plugin_dir_path(__FILE__) . 'AgeGator.php');
AgeGator::init();
