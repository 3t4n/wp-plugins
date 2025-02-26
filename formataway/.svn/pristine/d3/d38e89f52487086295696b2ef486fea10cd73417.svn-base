<?php
/**
 * @package Formataway
 */
/*
Plugin Name: Formataway
Plugin URI: http://bilalakil.me/formataway/
Description: Exclude selected post formats from your post index page's main query.
Version: 1.1.4
Author: Bilal Akil
Author URI: http://bilalakil.me/
License: GPLv2 or later
Text Domain: formataway
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

/*
Kudos to the great programmers of Akismet for producing an excellent example for us all!
*/

// Make sure we don't expose any info if called directly
if( !function_exists( 'add_action' ) ) {
    echo 'Hi there! I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'FORMATAWAY_VERSION', '1.1.4' );
define( 'FORMATAWAY__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( FORMATAWAY__PLUGIN_DIR . 'class.formataway.php' );
require_once( FORMATAWAY__PLUGIN_DIR . 'class.formataway-util.php' );

add_action( 'init', array( 'Formataway', 'init' ) );

if( is_admin() ) {
    require_once( FORMATAWAY__PLUGIN_DIR . 'class.formataway-admin.php' );
    add_action( 'init', array( 'Formataway_Admin', 'init' ) );
}
