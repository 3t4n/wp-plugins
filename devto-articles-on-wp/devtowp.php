<?php
/**
 * @package DevToWP
 */
/*
Plugin Name: DevTo articles on WP
Plugin URI: https://wordpress.org/plugins/devto-articles-on-wordpress/
Description: <strong>DevTo articles on WP</strong> is a simple plugin which creates a bridge between DevCommunity and WordPress. It will help you to show your <strong>dev.to</strong> articles on WordPress site. You'll be able to do that with simple ShortCode <code>[dev_post user_name=abmsourav]</code>. You can add more options in the ShortCode <code>[dev_post user_name=abmsourav post_count=3 layout=grid]</code>
Version: 0.0.7
Author: Keramot UL Islam
Author URI: https://abmsourav.com/
License: GPLv2 or later
Text Domain: devtowp
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

Copyright 2019 Keramot UL Islam <keramotul.islam@gmail.com>
*/

namespace DevToWP;

defined( 'ABSPATH' ) || die();

define( 'DEV_TO_WP_VERSION', '0.0.7' );
define( 'DEV_TO_WP_DIR_URL', plugin_dir_url( __FILE__ ) );

function devtowp_autoloader($class) {
    if ( false === strpos( $class, __NAMESPACE__ ) ) {
        return;
    }
    $class_name = preg_replace( '/^' . __NAMESPACE__ . '\\\\/', '', $class );

    require_once __DIR__ . '/classes/' . strtolower( $class_name ) . '.php';
}
spl_autoload_register(__NAMESPACE__.'\devtowp_autoloader');

Assets::initialization();

add_shortcode( 'dev_post', array( __NAMESPACE__.'\DevQuery', 'dev_query' ) );
