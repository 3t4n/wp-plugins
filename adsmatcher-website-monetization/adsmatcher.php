<?php
/*
Plugin Name: AdsMatcher Website Monetization
Plugin URI: https://www.adsmatcher.com/publishers/
Description: Get additional income from your website or blog by placing ads automatically from AdsMatcher and receive payments with PayPal.
Version: 1.0.0
Author: AdsMatcher
Author URI: https://www.adsmatcher.com
Developer: Hicham Lamsaouri
*/

use Adsmatcher\WebsiteMonetization\AdsmatcherMonetizationPlugin;

if ( ! defined( 'ABSPATH' ) )
	exit;

define('ADSMATCHERMONETIZATIONPLUGIN_DIR', plugin_dir_path(__FILE__));

require ADSMATCHERMONETIZATIONPLUGIN_DIR . 'vendor/autoload.php';

$matcherplugin = new AdsMatcherMonetizationPlugin(__FILE__);

$matcherplugin->adsmatcherinit();