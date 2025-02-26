<?php
/*
Plugin Name: AdsMatcher Anti Adblock
Plugin URI: https://www.adsmatcher.com/anti-adblock/
Description: AdsMatcher beats all ad blockers and optimize ad placements to generate more revenue for you.
Version: 1.1.2
Author: AdsMatcher
Author URI: https://www.adsmatcher.com
Developer: Hicham Lamsaouri
Developer URI: https://github.com/hichamlamsaouri
Text Domain: adsmatcher
Domain Path: /languages
*/

use Adsmatcher\Antiadblock\AdsmatcherPlugin;

if ( ! defined( 'ABSPATH' ) )
	exit;

define('ADSMATCHERPLUGIN_DIR', plugin_dir_path(__FILE__));

require ADSMATCHERPLUGIN_DIR . 'vendor/autoload.php';

$plugin = new AdsMatcherPlugin(__FILE__);

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'adsmatcher_add_plugin_settings_link');

add_action('plugins_loaded', 'adsmatcher_load_textdomain');

function adsmatcher_add_plugin_settings_link($links){
	$links[] = '<a href="' . admin_url( 'options-general.php?page=adsmatcher_plugin' ) . '">' . __('Settings') . '</a>';
	return $links;
}

function adsmatcher_load_textdomain() {
	load_plugin_textdomain( 'adsmatcher', false, basename( dirname( __FILE__ ) ) .'/languages' );
}

$plugin->init();