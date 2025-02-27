<?php /*
Plugin Name: GPT-3 Al Content Generator
Version: 1.0.0
Plugin URI: 
Description: Introducing the GPT-3 AI Content Generator plugin for WordPress! With this powerful tool, you can easily create high-quality, unique content for your website or blog with just a few clicks.
Author: Adrian Martinez
Author URI: /

WordPress - 
Requires at least: 5.0.0
Tested up to: 6.1.1
Stable tag: 1.0.0

Text Domain: wpopenai
Domain Path: /lang
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Plugin slug (for translation)
 **/

if(!defined('WPOAI_SLUG')) define( 'WPOAI_SLUG', 'wpopenai' );

/**
 * Plugin version
 **/
if(!defined('WPOAI_VERSION')) define( 'WPOAI_VERSION', '1.0.0' );

/**
 * Plugin path
 **/
if(!defined('WPOAI_PATH')) define( 'WPOAI_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin url
 **/
if(!defined('WPOAI_URL')) define( 'WPOAI_URL', plugin_dir_url( __FILE__ ) );


if ( !function_exists( 'wpopenai_init' ) && ! function_exists( 'wpopenai_fs' ) ) :

/**
 * Load plugin core class file
 */
require_once ( 'includes/wpoai-functions.php' );
require_once ( 'includes/init.php' );

/**
 * Init core class
 *
 */
function wpopenai_init() {

	global $wpopenai;

	// Instantiate Plugin
	$wpopenai = WPOPENAI::get_instance();

	// Localization
	load_plugin_textdomain( WPOAI_SLUG , false , dirname( plugin_basename( __FILE__ ) ) . '/lang' );

}

add_action( 'plugins_loaded' , 'wpopenai_init' );

/**
 * Get openai instance
 *
 * @return object
 */
function wpopenai() {
	global $wpopenai;
	if ( !empty( $wpopenai ) ) {
		return $wpopenai;
	} else {
		$wpopenai = WPOPENAI::get_instance();
		return $wpopenai;
	}
}

endif;