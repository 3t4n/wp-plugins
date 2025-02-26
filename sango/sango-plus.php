<?php
/*
Plugin Name: SANGO＋（プラス）
Plugin URI: https://dubdesign.net/download/plugin/sango-plus/
Description: SANGOにちょっとプラスするプラグイン
Version: 1.3.1
Author: kakakazu
Author URI: https://dubdesign.net/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SANGOPLUS_PLUGIN_VERSION', '1.3.1' );
define( 'SANGOPLUS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SANGOPLUS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

require_once 'classes/styles.php';
require_once 'classes/config.php';
require_once 'classes/modaltoc.php';
require_once 'classes/postpage.php';
require_once 'classes/fadeinanime.php';
require_once 'classes/cardtype.php';
require_once 'classes/fontstyle.php';
require_once 'classes/copyprotect.php';
