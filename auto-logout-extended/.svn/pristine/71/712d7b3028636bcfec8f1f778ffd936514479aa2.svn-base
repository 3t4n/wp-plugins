<?php
/*
Plugin Name: Auto Logout Extended
Plugin URI: https://develop.n-k-y.net/wordpress/wp_plugin/auto-logout-extended
Author: NBK45
Author URI: https://develop.n-k-y.net
Description: Auto Logout Extended は自動ログアウトとログイン状態保存を拡張するプラグインです。一定時間無操作のときに自動でログアウトする設定と（ログアウトせず）ブラウザ終了した場合のログイン状態の保存期間の設定が可能です。
Version: 1.1.5
License: GPLv2
*/

/*  Copyright 2021 NBK45 (email : nbk.develop@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once __DIR__ . '/al_ext_config.php';
require_once al_ext_config::AL_EXT_CLASS_DIR . 'class.al_ext_setting.php';
require_once al_ext_config::AL_EXT_CLASS_DIR . 'class.al_ext.php';

add_action( 'admin_enqueue_scripts', function () {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'al_ext_style', $plugin_url . 'css/al_ext.css' );
	wp_enqueue_script( 'al_ext_js', $plugin_url . 'js/al_ext.js', 'jquery' );
} );

new AL_EXT_SETTING;

if ( strpos( filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING ), al_ext_config::PLUGIN_NAME ) === false ) {
	new AL_EXT;
}