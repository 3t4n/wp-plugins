<?php
/**
 * @package Hints
 */
/*
Plugin Name: Hints
Plugin URI: http://sojourner.co/blog/code/wp-plugin-hints.html
Description: Hints enables you to provide a better UX with respect to links/topics. Some keywords/words, need more explanation or/and external resources to be explained further, if the user needs to know more. Normally, you would achieve this by creating a link/anchor to that resource. Hints, makes it possible for your users to get additional information, about a topic/resource, without leaving your post. Too many links in a post, do spoil the broth.
Version: 1.0a
Author: Sojourner
Author URI: http://sojourner.co
License: GPLv2 or later
Text Domain: hints
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'HINTS_VERSION', '1.0aa' );
define( 'HINTS__MINIMUM_WP_VERSION', '3.2' );
define( 'HINTS__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'HINTS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


register_activation_hook( __FILE__, array( 'Hints', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Hints', 'plugin_deactivation' ) );

require_once( HINTS__PLUGIN_DIR . 'hints.class.php' );


add_action( 'init', array( 'Hints', 'init' ) );

if ( is_admin() ) {
    //nothing to do if adimn
}


