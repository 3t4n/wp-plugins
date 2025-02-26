<?php

/*
Plugin Name: Add To Post Footer
Plugin URI: http://plugins.novoaprendizado.com.br
Description: If you want to add some text to the bottom of all your posts this plugin is for you! Go to configuration in WordPress menu and write your text and it's done. You can add images and HTML code too. Install and activate it, it's easy!
Version: 1.0
Author: Enrique René
Author URI: http://portfolio.novoaprendizado.com.br
License: GPLv2
Text Domain: add-to-post-footer
Domain Path: /languages
*/

/*      
 *      Copyright 2012 Enrique René <enriquerenebr@gmail.com>
 *      
 *      Add To Post Footer is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 3 of the License, or
 *      (at your option) any later version.
 *      
 *      Add To Post Footer is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with Add To Post Footer; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

if( !defined( 'ABSPATH' ) ) exit;

define( 'ATPF_PLUGIN_NAME', 'Add To Post Footer' );
define( 'ATPF_PLUGIN_VERSION', '1.0' );

define( 'ATPF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ATPF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

define( 'ATPF_LANGUAGES_PATH', plugin_basename( dirname( __FILE__ ) ).'/languages' );

define( 'ATPF_IMAGES_URL', plugin_dir_url( __FILE__ ).'images/' );
define( 'ATPF_IMAGES_DIR', plugin_dir_path( __FILE__ ).'images/' );

define( 'ATPF_CSS_URL', plugin_dir_url( __FILE__ ).'css/' );
define( 'ATPF_CSS_DIR', plugin_dir_path( __FILE__ ).'css/' );
define( 'ATPF_CSS_PATH' , str_replace( site_url().'/', '', plugin_dir_url( __FILE__ ) ).'css/' );

define( 'ATPF_INCLUDES_URL', plugin_dir_url( __FILE__ ).'includes/' );
define( 'ATPF_INCLUDES_DIR', plugin_dir_path( __FILE__ ).'includes/' );


require_once 'atpf-functions.php';

add_action( 'plugins_loaded', 'atpf_textdomain' );

register_activation_hook( __FILE__, 'atpf_activation');

add_filter( 'the_content', 'atpf_text' );

add_action( 'admin_enqueue_scripts', 'atpf_add_link_tag_to_head' );
add_action( 'admin_menu', 'atpf_options_in_menu' );


?>