<?php
/**
 * Plugin Name:       simple reuseblock widget
 * Plugin URI:		  https://wordpress.org/plugins/simple-reuseblock-widget/
 * Description:       simple reuseblock widgetは、再利用可能ブロックのメニューを管理画面に表示し、便利に使えるようにするためのウィジェットを追加するプラグインです。追加されるウィジェットは再利用可能ブロックを最大限活用できるよう、表示したい条件やページを指定できるようになっています。
 * Version:           1.0
 * Requires at least: 5.5
 * Requires PHP:      7.0
 * Author:            yukimichi
 * Author URI:
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/*
  Copyright 2021 yukimichi

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
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'SRBW_PLUGIN_BASEDIR' ) ) {
	define( 'SRBW_PLUGIN_BASEDIR', plugin_dir_path( __FILE__ ) );
}

// ファイルの読み込み!
require_once SRBW_PLUGIN_BASEDIR . 'lib/shortcode/reuse_block.php';
require_once SRBW_PLUGIN_BASEDIR . 'lib/hook.php';
require_once SRBW_PLUGIN_BASEDIR . 'lib/reblock.php';
require_once SRBW_PLUGIN_BASEDIR . 'lib/template-tag.php';
