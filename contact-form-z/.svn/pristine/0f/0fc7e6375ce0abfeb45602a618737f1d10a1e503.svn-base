<?php

/*
  Plugin Name: Contact Form Z — free contact form plugin for WordPress
  Plugin URI: https://zad.world
  Description:  Contact Form Z — free contact form plugin for WordPress sites. Powerful & simple. Absolutely free!
  Version: 1.6.6
  Author: Zad.World
  Author URI: https://zad.world
  License: GPL-2.0+
  License URI: http://www.gnu.org/licenses/gpl-2.0.txt
  Text Domain: contact-form-z
  Domain Path: /languages/
 */

if(!defined('WPINC')){
    die;
}

define('ZCFORM_PLUGIN_NAME_ABBR', 'CFZ');
define('ZCFORM_PLUGIN_NAME_VERSION', '1.6.6');
define('ZCFORM_PLUGIN_RELEASE_DATE', '2019-04-19');
define('ZCFORM_PLUGIN', __FILE__);
define('ZCFORM_PLUGIN_BASENAME', plugin_basename(ZCFORM_PLUGIN));
define('ZCFORM_PLUGIN_NAME', trim(dirname(ZCFORM_PLUGIN_BASENAME), '/'));
define('ZCFORM_PLUGIN_BASEDIR', plugins_url().'/'.ZCFORM_PLUGIN_NAME);
define('ZCFORM_PLUGIN_DIR', untrailingslashit(dirname(ZCFORM_PLUGIN)));

$l_locale = explode('_', get_user_locale());
define('ZCFORM_PLUGIN_LOCALE', (empty(get_user_locale()) ? 'en_US' : get_user_locale()));
define('ZCFORM_PLUGIN_BASE_URL', 'https://zad.world');
define('ZCFORM_PLUGIN_URL', 'https://zad.world/docs/?lang='.$l_locale[0]);
define('ZCFORM_DATE_FORMAT', get_option('date_format'));
define('ZCFORM_TIME_FORMAT', get_option('time_format'));
define('ZCFORM_START_WEEK', get_option('start_of_week'));

function zcform_activate(){
    require_once plugin_dir_path(__FILE__).'includes/class-'.ZCFORM_PLUGIN_NAME.'-activator.php';
    ZCForm_Activator::activate();
}

function zcform_deactivate(){
    require_once plugin_dir_path(__FILE__).'includes/class-'.ZCFORM_PLUGIN_NAME.'-deactivator.php';
    ZCForm_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'zcform_activate');
register_deactivation_hook(__FILE__, 'zcform_deactivate');

require plugin_dir_path(__FILE__).'includes/class-'.ZCFORM_PLUGIN_NAME.'.php';

function zcform_run(){

    $plugin = new ZCForm_Base();
    $plugin->run();
}

zcform_run();
