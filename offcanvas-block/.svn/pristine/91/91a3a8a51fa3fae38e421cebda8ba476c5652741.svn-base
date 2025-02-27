<?php
/**
 * Plugin Name: OffCanvas Block
 * Description: Display content box from the left, right, or bottom edge of the viewport.
 * Version: 1.0.1
 * Author: bPlugins
 * Author URI: http://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: offcanvas
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

class OCBOffCanvas{
	function __construct(){
		add_action( 'init', [$this, 'onInit'] );
	}

	function onInit(){
		register_block_type( __DIR__ . '/build' );
	}
}
new OCBOffCanvas();